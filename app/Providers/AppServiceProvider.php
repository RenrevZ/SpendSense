<?php

namespace App\Providers;

use App\Models\User;
use App\Models\UserExpenses;
use App\Observers\LoginObserver;
use App\Observers\UserExpenseObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(LoginObserver::class);
        UserExpenses::observe(UserExpenseObserver::class);
    }
}
