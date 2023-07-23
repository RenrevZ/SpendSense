<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpensesType extends Model
{
    use HasFactory;
    protected $primaryKey = 'EXPENSE_ID';
    protected $keyType = 'string';
    protected $table = 'expenses_types';
    protected $fillable = [
        'EXPENSE_ID',
        'DESCRIPTION'
    ];

    public function getall(){
        return $this->get();
    }

    public function store($request){
        return self::create([
            'EXPENSE_ID' => $request->ExpenseID,
            'DESCRIPTION' => $request->description
        ]);
    }

    public function edit($id){
        return self::findOrFail($id);
    }

    public function updateData($request){
        return self::where('EXPENSE_ID',$request->ExpenseID)
                    ->update(['DESCRIPTION' => $request->description]);
    }

    public function deleteItem($id){
        return self::where('EXPENSE_ID',$id)->delete();
    }


    public function UserExpenses(){
        return $this->hasMany(UserExpenses::class,'EXPENSE_ID','EXPENSE_ID');
    }

    public function SummaryPerExpenseType(){
        return $this->hasMany(SummaryPerExpenseType::class,'EXPENSE_ID','EXPENSE_ID');
    }
}
