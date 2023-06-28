<?php

namespace App\Http\Controllers;

use App\Models\ExpensesType;
use Illuminate\Http\Request;
use App\Helper;
use Illuminate\Support\Facades\Log;

class ExpenseTypeController extends Controller
{
    public function index(){
        $data = array(
            'data' => (new ExpensesType)->getall(),
            'expenseID' => Helper\modelCounter('expenses_types')
        );

        return response()->json($data,200);
    }

    public function store(Request $request){
        $request->validate([
            'ExpenseID' => 'required',
            'description' => 'required|string|max:100'
        ]);

        try {
            (new ExpensesType)->store($request);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['message' => 'There was a problem saving into database please contact the developer immediately']);
        }

        return response()->json(['message' => 'New Expense Type has been added']);
    }

    public function edit($id){
        try{
            $db = (new ExpensesType)->edit($id);
        }catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['message' => 'There was a problem finding the item please contact the developer immediately'],422);
        }

        $data = array(
            'data' => $db
        );
        return response()->json($data,200);
    }

    public function update(Request $request){
        $request->validate([
            'ExpenseID' => 'required',
            'description' => 'required|string|max:100'
        ]);

        try {
            (new ExpensesType)->updateData($request);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['message' => 'There was a problem saving into database please contact the developer immediately']);
        }

        return response()->json(['message' => 'Expense Type has been updated']);
    }

    public function destroy($id){
        try {
            (new ExpensesType)->deleteItem($id);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['message' => 'There was a problem deleting item into database please contact the developer immediately']);
        }

        return response()->json(['message' => 'Expense Type has been deleted']);
    }

}
