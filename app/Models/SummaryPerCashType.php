<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SummaryPerCashType extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'summary_per_cash_types';
    protected $fillable = [
        'CASH_TYPE_ID',
        'USER_ID',
        'AMOUNT'
    ];

    public function findOne($expense){
        return $this->where([
                'CASH_TYPE_ID' => $expense->CASH_TYPE_ID,
                'USER_ID' => $expense->USER_ID
            ])
            ->where(DB::raw('DATE(created_at)'), Carbon::now()->toDateString())
            ->first();
    }

    public function store($expense){
        return self::create([
            'CASH_TYPE_ID' => $expense->CASH_TYPE_ID,
            'USER_ID' => $expense->USER_ID,
            'AMOUNT' => $expense->AMOUNT
        ]);
    }

    public function updateItem($expense){
        $currentItem = $this->findOne($expense);

        return $this->where([
                    'CASH_TYPE_ID' => $expense->CASH_TYPE_ID,
                    'USER_ID' => $expense->USER_ID,
                ])
              ->where(DB::raw('DATE(created_at)'), Carbon::now()->toDateString())
              ->update(['AMOUNT' => $currentItem->AMOUNT + $expense->AMOUNT]);
    }

    public function user(){
        return $this->belongsTo(User::class,'USER_ID','USER_ID');
    }

    public function CashType(){
        return $this->belongsTo(CashType::class,'CASH_TYPE_ID','CASH_TYPE_ID');
    }

}
