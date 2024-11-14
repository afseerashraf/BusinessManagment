<?php

namespace App\Http\Controllers;

use App\Http\Requests\invoice\InvoiceRegister;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index() {
        $customers = Customer::all();
        return view('invoice.register', compact('customers'));
    }

    public function register(InvoiceRegister $request){
        $invoice = new Invoice();
        $invoice->customer_id = $request->customer_id;
        $invoice->invoice_number = $request->invoice_number;
        $invoice->date = $request->date;
        $invoice->due_date = $request->duedate;
        $invoice->total_amount = $request->total_amount;
        $invoice->status = $request->status;
        $invoice->note = $request->note;
        $invoice->save();
        

    }
}
