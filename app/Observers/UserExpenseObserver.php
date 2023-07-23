<?php

namespace App\Observers;

use App\Models\CashRemittance;
use App\Models\SummaryPerCashType;
use App\Models\SummaryPerExpenseType;
use App\Models\UserExpenses;
use Carbon\Carbon;

class UserExpenseObserver
{
    /**
     * Handle the UserExpenses "created" event.
     *
     * @param  \App\Models\UserExpenses  $userExpenses
     * @return void
     */
    public function created(UserExpenses $userExpenses)
    {
        $checkIfCashTypeExist = (new SummaryPerCashType)->findOne($userExpenses);
        $checkIfExpenseTypeExist = (new SummaryPerExpenseType)->findOne($userExpenses);

        if($checkIfCashTypeExist){
            (new SummaryPerCashType)->updateItem($userExpenses);
        }else{
            (new SummaryPerCashType)->store($userExpenses);
        }

        if($checkIfExpenseTypeExist){
            (new SummaryPerExpenseType)->updateItem($userExpenses);
        }else{
            (new SummaryPerExpenseType)->store($userExpenses);
        }

        (new CashRemittance)->deductUserExpense($userExpenses);
    }

    /**
     * Handle the UserExpenses "updated" event.
     *
     * @param  \App\Models\UserExpenses  $userExpenses
     * @return void
     */
    public function updated(UserExpenses $userExpenses)
    {
        //
    }

    /**
     * Handle the UserExpenses "deleted" event.
     *
     * @param  \App\Models\UserExpenses  $userExpenses
     * @return void
     */
    public function deleted(UserExpenses $userExpenses)
    {
        //
    }

    /**
     * Handle the UserExpenses "restored" event.
     *
     * @param  \App\Models\UserExpenses  $userExpenses
     * @return void
     */
    public function restored(UserExpenses $userExpenses)
    {
        //
    }

    /**
     * Handle the UserExpenses "force deleted" event.
     *
     * @param  \App\Models\UserExpenses  $userExpenses
     * @return void
     */
    public function forceDeleted(UserExpenses $userExpenses)
    {
        //
    }
}
