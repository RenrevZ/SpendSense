<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\CashTypeController;

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

//== AUTH ROUTE
Route::post('/Signup/user',[SignupController::class,'store']);
Route::post('/Login/user',[LoginController::class,'login']);
Route::get('/Logout/user',[LoginController::class,'logout']);
Route::get('/getUser',[Controller::class,'getAuthenticatedUser']);

//=== CASH TYPE ROUTE
Route::prefix('Cashtype')->group(function () {
    Route::get('/index',[CashTypeController::class,'index']);
    Route::post('/store',[CashTypeController::class,'store']);
});

