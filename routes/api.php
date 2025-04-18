<?php

use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\InvoiceController;
use App\Http\Controllers\api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::name('customer.')->prefix('customer')->group(function () {
    
    Route::controller(CustomerController::class)->group(function () {
    
        Route::get('customers', 'customers')->name('customer');
    
        Route::post('register', 'register')->name('register');
    
        Route::delete('delete/{id}', 'delete')->name('delete');
    
        Route::patch('update/{id}', 'update')->name('update');
    });
});
Route::prefix('user')->name('user.')->group(function () {
    
    Route::controller(UserController::class)->group(function () {
    
        Route::post('login', 'login')->name('login');
    });
});

Route::prefix('invoice')->name('invoice.')->group(function () {
    
    Route::controller(InvoiceController::class)->group(function () {
    
        Route::post('create', 'create')->name('create');
    
        Route::get('invoice', 'invoces')->name('invoices');

    });
});
