<?php

namespace App\Http\Controllers;

use App\Models\UserExpenses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class UserExperienceController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'Amount' => 'required',
            'ExpendedType' => 'required',
            'expenseType' => 'required'
        ]);

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
}
