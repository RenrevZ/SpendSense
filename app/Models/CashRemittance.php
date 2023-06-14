<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashRemittance extends Model
{
    use HasFactory;
    public $fillable = ['CASH_ID','USER_ID','CASH_TYPE_ID','AMOUNT'];
}
