<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SummaryPerExpenseType extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'summary_per_expense_types';
    protected $fillable = [
        'EXPENSE_ID',
        'USER_ID',
        'AMOUNT'
    ];

    public function findOne($request){
            return $this->where([
                'EXPENSE_ID' => $request->EXPENSE_ID,
                'USER_ID' => $request->USER_ID,
            ])
            ->where(DB::raw('DATE(created_at)'), Carbon::now()->toDateString())
            ->first();
    }

    public function store($request){
        return self::create([
            'EXPENSE_ID' => $request->EXPENSE_ID,
            'USER_ID' => $request->USER_ID,
            'AMOUNT' => $request->AMOUNT
        ]);
    }

    public function updateItem($expense){
        $currentItem = $this->findOne($expense);

        return $this->where([
                'EXPENSE_ID' => $expense->EXPENSE_ID,
                'USER_ID' => $expense->USER_ID,
            ])
            ->where(DB::raw('DATE(created_at)'), Carbon::now()->toDateString())
            ->update(['AMOUNT' => $currentItem->AMOUNT + $expense->AMOUNT]);
    }

    public function getSummaryOfMonth($user)
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        return $this->where('USER_ID',$user)
                    ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                    ->with('ExpensesType')
                    ->get();
    }

    public function getCurrentUserExpenseType($user){
        return $this->where('USER_ID',$user)
                    ->with('ExpensesType')
                    ->get();
    }


    public function ExpensesType(){
        return $this->belongsTo(ExpensesType::class,'EXPENSE_ID','EXPENSE_ID');
    }
}
