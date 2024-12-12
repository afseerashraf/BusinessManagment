<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\UserController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::name('customer.')->prefix('customer')->group(function(){
    Route::controller(CustomerController::class)->group(function(){
        Route::get('customers', 'customers')->name('customer');
        Route::post('register', 'register')->name('register');

    });
});
Route::prefix('user')->name('user.')->group(function(){
    Route::controller(UserController::class)->group(function(){
        Route::post('login', 'login')->name('login');
    });
});
