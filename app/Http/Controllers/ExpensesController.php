<?php

namespace App\Http\Controllers;

use App\Http\Requests\expense\expenseEdit;
use App\Http\Requests\Expense\ExpenseRequest;
use App\Models\Expense;
use App\Models\Vendor;
use Illuminate\Support\Facades\Crypt;

class ExpensesController extends Controller
{
    public function index()
    {
        $vendors = Vendor::all();

        return view('expense.register', compact('vendors'));
    }

    public function register(ExpenseRequest $request)
    {
        $expense = new Expense;
        $expense->vendor_id = $request->vendor_id;
        $expense->description = $request->description;
        $expense->amount = $request->amount;
        $expense->date = $request->date;
        $expense->category = $request->category;
        $expense->notes = $request->note;
        $expense->save();

        return redirect()->route('expense.expenses');

    }

    public function expenses()
    {
        $expenses = Expense::orderBy('date', 'desc')->get();

        return view('expense.expenses', compact('expenses'));
    }

    public function edit($id)
    {
        $expense = Expense::find(Crypt::decrypt($id));
        $vendors = Vendor::all();

        return view('expense.edit', compact('expense', 'vendors'));
    }

    public function updated(expenseEdit $request)
    {
        $expense = Expense::find(Crypt::decrypt($request->id));

        $expense->update([
            'vendor_id' => $request->vendor_id,
            'description' => $request->description,
            'amount' => $request->amount,
            'date' => $request->date,
            'category' => $request->category,
            'notes' => $request->note,
        ]);
        $expense->save();

        return redirect()->route('expense.expenses')->with('update', $expense->id.' updated');
    }

    public function delete($id)
    {
        $expenseID = Expense::find(Crypt::decrypt($id));
        $expenseID->delete();

        toastr()->success('successfully Deleted!');

        return redirect()->route('expense.expenses');
    }
}
