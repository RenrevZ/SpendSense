<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use App\Models\CashRemittance;
use App\Models\CashType;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Helper;

class UserLoggedInListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserLoggedIn  $event
     * @return void
     */
    public function handle(UserLoggedIn $event)
    {
        $remit = CashRemittance::where('USER_ID',$event->user->USER_ID)->first();
        $cashtype = CashType::count();

        if($cashtype <> 1){

            CashType::create([
                'CASH_TYPE_ID' => Helper\modelCounter('cash_types'),
                'DESCRIPTION' => 'Cash'
            ]);
        }

        if(empty($remit)){
            $dbCount = CashRemittance::count() + 1;
            CashRemittance::create([
                'CASH_ID' => $dbCount,
                'USER_ID' => $event->user->USER_ID,
                'CASH_TYPE_ID' => "0000001",
                'AMOUNT' => "0"
            ]);
        }
    }
}
