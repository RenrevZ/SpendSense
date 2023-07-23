<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExpenses extends Model
{
    use HasFactory;
    protected $primaryKey = 'EXPENSE_TYPE';
    protected $keyType = 'string';
    protected $table = 'user_expenses';
    protected $fillable = ['EXPENSE_TYPE',
                           'CASH_TYPE_ID',
                           'EXPENSE_ID',
                            'USER_ID',
                            'AMOUNT'];

    public function countModel(){
        return $this->count() + 1;
    }

    public function fetchCurrentUserExpenses($user){
        return $this->where('USER_ID',$user->USER_ID)
                    ->with('ExpensesType','CashType')
                    ->get();
    }

    public function store($request,$user){

        return self::create([
            'EXPENSE_TYPE' => str_pad($this->countModel(), 7, '0', STR_PAD_LEFT),
            'CASH_TYPE_ID' => $request->ExpendedType,
            'EXPENSE_ID' => $request->expenseType,
            'USER_ID' => $user->USER_ID,
            'AMOUNT' => $request->Amount
        ]);
    }

    public function ExpensesType(){
        return $this->belongsTo(ExpensesType::class,'EXPENSE_ID','EXPENSE_ID');
    }

    public function CashType(){
        return $this->belongsTo(CashType::class,'CASH_TYPE_ID','CASH_TYPE_ID');
    }
}
