<?php

namespace App\Http\Controllers;

use App\Models\CashRemittance;
use App\Models\ExpensesType;
use App\Models\UserExpenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UserExperienceController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'Amount' => 'required',
            'description' => 'required',
            'ExpendedType' => 'required',
            'expenseType' => 'required'
        ]);


        $cashRemittanceData = array(
            'USER_ID' => auth()->user()->USER_ID,
            'CASH_TYPE_ID' => $request->ExpendedType
        );

        $ExpenseAmount = (new CashRemittance)->findUserRemittance($cashRemittanceData);

        if($ExpenseAmount->AMOUNT <= 0){
            return response()->json(['message' => 'Error the expense type you choose doesn\'t have enough value'],422);
        }

        try{
            DB::beginTransaction();
                (new UserExpenses)->store($request,auth()->user());
            DB::commit();
        }catch (\Exception $e){
            DB::rollback();
            Log::info('From UserExpenses:'.$e->getMessage());
        }

        return response()->json(['message' => 'New Expenses has been added']);
    }

    public function sort(Request $request){
        $data = array(
            'DATE' => $request->date,
            'EXPENSE_ID' => $request->ExpenseType
        );

        return (new UserExpenses)->getUserExpenseBasedOnSortedDate($data);
    }

    public function BaseDate(Request $request){
        $data = array(
            'DATE' => $request->date,
            'EXPENSE_ID' => $request->ExpenseType
        );

        return (new UserExpenses)->getUserExpenseOnDate($data);
    }
}
