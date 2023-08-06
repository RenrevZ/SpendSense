<?php

use App\Models\ExpensesType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\CashTypeController;
use App\Http\Controllers\CashRegistryController;
use App\Http\Controllers\ExpenseTypeController;
use \App\Http\Controllers\UserExperienceController;
use \App\Models\UserExpenses;
use \App\Models\SummaryPerExpenseType;
use \App\Models\SummaryPerCashType;
use \App\Http\Controllers\SummaryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']],function (){
    //=== LOGOUT/GET USER
    Route::get('/Logout/user',[LoginController::class,'logout']);
    Route::get('/getUser',[Controller::class,'getAuthenticatedUser']);

    //=== CASH TYPE ROUTE
    Route::prefix('Cashtype')->group(function () {
        Route::get('/index',[CashTypeController::class,'index']);
        Route::post('/store',[CashTypeController::class,'store']);
    });

    //=== CASH REGISTRY ROUTE
    Route::prefix('CashRegistry')->group(function () {
        Route::get('/index',[CashRegistryController::class,'index']);
        Route::get('/show/{id}',[CashRegistryController::class,'show']);
        Route::put('/update',[CashRegistryController::class,'update']);
    });

    //=== EXPENSE TYPE ROUTE
    Route::prefix('ExpenseType')->group(function () {
        Route::get('/index',[ExpenseTypeController::class,'index']);
        Route::post('/store',[ExpenseTypeController::class,'store']);
        Route::get('/edit/{id}',[ExpenseTypeController::class,'edit']);
        Route::put('/update',[ExpenseTypeController::class,'update']);
        Route::delete('/destroy/{id}',[ExpenseTypeController::class,'destroy']);
        Route::get('/getExpenseType',function (){  return (new ExpensesType)->getall(); });
    });

    //=== USER EXPENSE ROUTE
    Route::prefix('UserExpense')->group(function () {
        Route::get('/getCurrentUserExpenses',function () {
            return (new UserExpenses)->fetchCurrentUserExpenses(auth()->user());
        });

        Route::get('/getCurrentUserExpensesMonthly',function(){
            return (new UserExpenses)->fetchCurrentUserMonthlyExpenses(auth()->user()->USER_ID);
        });

        Route::post('/store',[UserExperienceController::class,'store']);
        Route::post('/SortCurrentUserExpense',[UserExperienceController::class,'sort']);
        Route::post('/getCurrentUserExpenseBaseOnDate',[UserExperienceController::class,'BaseDate']);
    });

    //=== GET SUMMARY OF ITEMS
    Route::prefix('Summary')->group(function () {
        Route::get('/ExpenseType',[SummaryController::class,'getExpenseSummary']);
        Route::get('/UserExpenses',[SummaryController::class,'getCurrentUserExpenses']);
        Route::get('/UserExpensesPerExpenses',[SummaryController::class,'getUserExpensesPerExpenses']);
        Route::post('/store',[UserExperienceController::class,'store']);
        Route::post('/UserExpensesSortedByDateAndExpense',[SummaryController::class,'getUserExpenseSortedByDate']);
        Route::post('/UserExpensesSorted',[SummaryController::class,'getUserExpensesBySorted']);
    });
});

//== AUTH ROUTE
Route::post('/Login/user',[LoginController::class,'login']);
Route::post('/Signup/user',[SignupController::class,'store']);


