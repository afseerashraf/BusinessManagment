<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\userController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.register');
});

Route::view('login', 'user.login')->name('user.login'); // when the unauthenticate user redirect this route;
Route::prefix('user')->name('user.')->group(function () {
   
    Route::controller(userController::class)->group(function () {
       
        Route::view('/', 'user.register')->name('index');
       
        Route::post('register', 'register')->name('register');
       
        //Route::view('login', 'user.login')->name('login');
       
        Route::post('logined', 'login')->name('dologin');
       
        Route::view('profile', 'user.profile')->name('profile');
       
        Route::get('logout/{id}', 'logout')->name('logout');
       
        Route::get('forgot', 'requestResetPasswordMail')->name('requestResetPasswordMail');
       
        Route::post('forgotmail', 'resetPasswordMail')->name('resetPasswordMail');
       
        Route::get('viewResetForm/{token}', 'viewResetForm')->name('viewResetPassword');
       
        Route::post('resetedPassword', 'resetedPassword')->name('resetedPassword');
    });
});

Route::middleware('auth')->group(function () {
   
    Route::prefix('customer')->name('customer.')->group(function () {
      
        Route::controller(CustomerController::class)->group(function () {
           
            Route::view('/', 'customer.register')->name('index');
           
            Route::post('register', 'register')->name('register');
           
            Route::get('customers', 'customers')->name('customers');
           
            Route::get('edit/{id}', 'edit')->name('edit');
           
            Route::post('updated', 'updated')->name('updated');
           
            Route::get('delete/{id}', 'delete')->name('delete');
           
            Route::get('overdue', 'overDueCustomer')->name('overdue');
           
            Route::get('create', 'create')->name('create');

        });
    });

Route::prefix('invoice')->name('invoice.')->group(function () {
    
    Route::controller(InvoiceController::class)->group(function () {
    
        Route::get('/', 'index')->name('index');
    
        Route::post('register', 'register')->name('register');
    
        Route::get('invoices', 'outstandingInvoice')->name('outstandingInvoice');
    
        Route::get('edit/{id}', 'edit')->name('edit');
    
        Route::post('updated', 'updated')->name('updated');
    
        Route::get('upcomingduedate', 'upcomingDueDateCustomers')->name('upcoming_duedate');
    
        Route::get('overdue', 'overDueInvolice')->name('overDue');
    
        Route::get('delete/{id}', 'delete')->name('delete');
    
        Route::get('download/{id}', 'download')->name('download');
    
    });
});


Route::prefix('supplier')->name('supplier.')->group(function () {

    Route::controller(VendorController::class)->group(function () {

        Route::view('/', 'supplier.register')->name('index');

        Route::post('register', 'register')->name('register');

        Route::get('vendors', 'vendors')->name('vendors');

        Route::get('edit/{id}', 'edit')->name('edit');

        Route::post('updated', 'updated')->name('updated');

        Route::get('delete/{id}', 'delete')->name('delete');

    });
});


Route::prefix('expense')->name('expense.')->group(function () {

    Route::controller(ExpensesController::class)->group(function () {

        Route::get('/', 'index')->name('index');

        Route::post('register', 'register')->name('register');

        Route::get('expenses', 'expenses')->name('expenses');

        Route::get('edit/{id}', 'edit')->name('edit');

        Route::post('updated', 'updated')->name('updated');

        Route::get('delete/{id}', 'delete')->name('delete');

    });
});

Route::prefix('bank')->name('bank.')->group(function () {
 
    Route::controller(BankController::class)->group(function () {
 
        Route::view('/', 'bank.register')->name('index');
 
        Route::post('register', 'register')->name('register');
 
        Route::get('detiles', 'bankDetiles')->name('detiles');
 
        Route::get('edit/{id}', 'edit')->name('edit');
 
        Route::post('updated', 'updated')->name('updated');
 
        Route::get('delete/{id}', 'deleted')->name('delete');
 
        Route::get('lowbalance', 'lowBalanceAlert')->name('lowBalanceAlert');
 
    });
});
});
