<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function create(Request $request)
    {
        $invoice = new Invoice;
        $invoice->customer_id = $request->customer_id;
        $invoice->invoice_number = $request->invoice_number;
        $invoice->date = $request->date;
        $invoice->due_date = $request->due_date;
        $invoice->total_amount = $request->total_amount;
        $invoice->status = $request->status;
        $invoice->notes = $request->notes;
        $invoice->save();
    }

    public function invoces()
    {
        $invoices = Invoice::all();

        return $invoices;
    }
}
