<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Vendor;
class ExpensesController extends Controller
{
    public function index(){
        $vendors = Vendor::all();
        return view('expense.register', compact('vendors'));
    }
}
