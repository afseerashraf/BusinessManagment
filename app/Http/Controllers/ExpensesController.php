<?php

namespace App\Http\Controllers;

use App\Http\Requests\Expense\ExpenseRequest;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Vendor;
class ExpensesController extends Controller
{
    public function index(){
        $vendors = Vendor::all();
        return view('expense.register', compact('vendors'));
    }

    public function register(ExpenseRequest $request){
        $expense = new Expense();
        $expense->vendor_id = $request->vendor_id;
        $expense->description = $request->description;
        $expense->amount = $request->amount;
        $expense->date = $request->date;
        $expense->category = $request->category;
        $expense->notes = $request->note;
        $expense->save();

    }
}
