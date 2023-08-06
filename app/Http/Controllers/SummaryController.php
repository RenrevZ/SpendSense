<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\SummaryPerExpenseType;
use \App\Models\SummaryPerCashType;

class SummaryController extends Controller
{
    public function getExpenseSummary(){
        return (new SummaryPerExpenseType)->getSummaryOfMonth(auth()->user()->USER_ID);
    }

    public function getCurrentUserExpenses(){
        return (new SummaryPerCashType)->getCurrentUserExpenses(auth()->user()->USER_ID);
    }

    public function getUserExpensesPerExpenses(){
        return (new SummaryPerExpenseType)->getCurrentUserExpenseType(auth()->user()->USER_ID);
    }

    public function getUserExpenseSortedByDate(Request $request){
        $data = array(
            'DATE' => $request->date,
            'EXPENSE_ID' => $request->ExpenseType
        );

        return (new SummaryPerCashType)->getCurrentUserExpenseSortedByDate($data);
    }

    public function getUserExpensesBySorted(Request $request){
        $data = array(
            'DATE' => $request->date,
            'EXPENSE_ID' => $request->ExpenseType
        );

        return (new SummaryPerCashType)->getCurrentUserExpenseSortedByDate($data);
    }
}
