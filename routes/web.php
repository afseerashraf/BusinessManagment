<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return route('customer.register');
});
Route::prefix('customer')->name('customer.')->group(function () {
    Route::controller(CustomerController::class)->group(function () {
        Route::view('/', 'customer.register')->name('index');
        Route::post('register', 'register')->name('register');
    });
});



Route::prefix('invoice')->name('invoice.')->group(function () {
    Route::controller(InvoiceController::class)->group(function () {
        Route::get('/', 'index')->name('index');          
        Route::post('register', 'register')->name('register');  
    });
});

Route::prefix('vendor')->name('vendor.')->group(function () {
    Route::controller(VendorController::class)->group(function () {    
        Route::view('/', 'vendor.register')->name('index');      
        Route::post('register', 'register')->name('register');  
    });
});

Route::prefix('expense')->name('expense.')->group(function () {
    Route::controller(ExpensesController::class)->group(function () {    
        Route::get('/', 'index')->name('index');      
        Route::post('register', 'register')->name('register');  
    });
});