<?php

namespace App\Http\Controllers;

use App\Http\Requests\customer\customerRegister;
use App\Http\Requests\customer\editRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Crypt;

class CustomerController extends Controller
{
    public function register(customerRegister $request)
    {
        $customer = new Customer;
        $customer->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        toastr()->success('successfully Created New Customer');

        return redirect()->route('customer.customers');
    }

    public function customers()
    {
        $customers = Customer::all();

        return view('customer.activeCustomers', compact('customers'));
    }

    public function edit($id)
    {
        $customer = Customer::find(Crypt::decrypt($id));

        return view('customer.edit', compact('customer'));
    }

    public function updated(editRequest $request)
    {
        $customer = Customer::find(Crypt::decrypt($request->id));
        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        $customer->save();

        toastr()->success('Data has been updated successfully!');

        return redirect()->route('customer.customers');
    }

    public function delete($id)
    {
        $customer = Customer::find(Crypt::decrypt($id));
        $customer->delete();
        toastr()->success($customer->name.' successfully Deleted!');

        return redirect()->route('customer.customers');

    }

    public function create()
    {
        //
        $customer = Customer::findOrFail(1);
        $customer->update([
            'name' => 'snow freeze',
        ]);

    }
}
