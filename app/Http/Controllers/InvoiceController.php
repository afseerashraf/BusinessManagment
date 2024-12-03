<?php

namespace App\Http\Controllers;

use App\Http\Requests\invoice\InvoiceEditRequest;
use App\Http\Requests\invoice\InvoiceRegister;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\InvoicePaid;
use App\Events\UpcomingInvoiceDuedate;
use App\Events\overDueEvent;

class InvoiceController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('invoice.register', compact('customers'));
    }

    public function register(InvoiceRegister $request)
    {
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


    public function outstandingInvoice()
    {
        $invoices = Invoice::all();
        return view('invoice.outstandingInvoice', compact('invoices'));
    }

    public function edit($id)
    {
        $invoice = Invoice::find(Crypt::decrypt($id));
        $customers = Customer::all();
        return view('invoice.edit', compact('invoice', 'customers'));
    }

    public function updated(InvoiceEditRequest $request)
    {
        $invoice = Invoice::findOrFail(Crypt::decrypt($request->id));

        $invoice->update([
            'customer_id' => $request->customer_id,
            'invoice_number' => $request->invoice_number,
            'date' => $request->date,
            'due_date' => $request->due_date,
            'total_amount' => $request->total_amount,
            'status' => $request->status,
            'notes' => $request->note,
        ]);
        $invoice->save();
        return redirect()->route('invoice.outstandingInvoice');
    }

    public function delete($id)
    {
        $invoiceID = Invoice::find(Crypt::decrypt($id));
        $invoiceID->delete();

        toastr()->success('Deleted sucess fully ' . $invoiceID->invoice_number);
        return redirect()->route('invoice.outstandingInvoice');
    }


    public function overDueInvolice()
    {
    
        $overDue = Carbon::yesterday();

        $invoices = Invoice::where('due_date', '=',  $overDue)->where('status', '!=', 'paid')->get();
        foreach ($invoices as $invoice) {
                if ($invoice && $invoice->customers) {

                    //Notification::send($invoice->customers, new InvoicePaid($invoice));
                    overDueEvent::dispatch($invoice);
                    toastr()->warning('The upcoming invoice ' . $invoice->customers->name);

                    return view('invoice.overDueInvoice');
                }
            }
        
    }

    public function upcomingDueDateCustomers()
    {
        $upcoming = Carbon::tomorrow();
        $upcomingInvoices = Invoice::where('due_date', '=', $upcoming)->where('status', '!=', 'paid')->get();

        foreach ($upcomingInvoices as $upcominginvoice) {
            if ($upcominginvoice->customers) {
                UpcomingInvoiceDuedate::dispatch($upcominginvoice);
                toastr()->warning('The upcoming invoice ' . $upcominginvoice->customers->name);

                return view('invoice.upcoming_duedate');
            }
        }
    }
}
