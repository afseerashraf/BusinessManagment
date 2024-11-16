<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

Route::get('/', function () {
    return view('user.register');
});
Route::prefix('user')->name('user.')->group(function () {
    Route::controller(userController::class)->group(function () {
        Route::view('/', 'user.register')->name('index');
        Route::post('register', 'register')->name('register');
        Route::view('login', 'user.login')->name('login');
        Route::post('logined', 'login')->name('dologin');
        Route::view('profile', 'user.profile')->name('profile');
        Route::get('logout/{id}', 'logout')->name('logout');
    });
});

Route::middleware('auth')->group(function () {
    Route::prefix('customer')->name('customer.')->group(function () {
        Route::controller(CustomerController::class)->group(function () {
            Route::view('/', 'customer.register')->name('index');
            Route::post('register', 'register')->name('register');
            Route::get('customers', 'customers')->name('customers');
        });
    });



    Route::prefix('invoice')->name('invoice.')->group(function () {
        Route::controller(InvoiceController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('register', 'register')->name('register');
            Route::get('invoices', 'outstandingInvoice')->name('outstandingInvoice');
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

    Route::prefix('bank')->name('bank.')->group(function () {
        Route::controller(BankController::class)->group(function () {
            Route::view('/', 'bank.register')->name('index');
            Route::post('register', 'register')->name('register');
        });
    });
});
