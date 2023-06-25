<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\CashTypeController;
use App\Http\Controllers\CashRegistryController;

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
});

//== AUTH ROUTE
Route::post('/Login/user',[LoginController::class,'login']);
Route::post('/Signup/user',[SignupController::class,'store']);


