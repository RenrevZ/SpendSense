<?php

namespace App\Models;

use App\Models\CashRemittance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CashType extends Model
{
    use HasFactory;
    public $fillable = ['CASH_TYPE_ID','DESCRIPTION'];

    public function CashTypeId(){
        return $this->count() + 1;
    }

    public function store($request){
        return self::create([
            'CASH_TYPE_ID' => $request->cashTypeID,
            'DESCRIPTION' => $request->cashDescription
        ]);
    }

    public function storeRemittance($request){
        $dbCount = CashRemittance::count() + 1;

        return CashRemittance::create([
            'CASH_ID' => $dbCount,
            'USER_ID' => auth()->user()->id,
            'CASH_TYPE_ID' => $request->CASH_TYPE_ID,
            'AMOUNT' => $request->amount
        ]);
    }
}
