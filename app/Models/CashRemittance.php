<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashRemittance extends Model
{
    use HasFactory;
    public $fillable = ['CASH_ID','USER_ID','CASH_TYPE_ID','AMOUNT'];

    public function updateModel($request)
    {
          self::where([
                    'CASH_TYPE_ID' => $request->cashTypeID,
                    'USER_ID' => auth()->user()->USER_ID
                ])
                ->update(['AMOUNT' => $request->amount]);
    }

    public function findOne($request){
        return $this->where([
            'USER_ID' => $request->USER_ID,
            'CASH_TYPE_ID' => $request->CASH_TYPE_ID,
        ])->first();
    }

    public function findUserRemittance($data){
        return $this->where([
            'USER_ID' => $data['USER_ID'],
            'CASH_TYPE_ID' => $data['CASH_TYPE_ID'],
        ])->first();
    }


    public function deductUserExpense($request){
        $cashAmount = $this->findOne($request);

        return $this->where([
            'USER_ID' => $request->USER_ID,
            'CASH_TYPE_ID' => $request->CASH_TYPE_ID,
        ])->update([
            'AMOUNT' => floatval($cashAmount->AMOUNT) - $request->AMOUNT
        ]);
    }
}
