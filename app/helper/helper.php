<?php
namespace App\Helper;

use Illuminate\Support\Facades\DB;

function modelCounter($model){
    $count = DB::table($model)->count() + 1;

    return str_pad($count, 7, '0', STR_PAD_LEFT);
}
