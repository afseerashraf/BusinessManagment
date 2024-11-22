<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\customer\customerRegister;
use App\Http\Requests\customer\editRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Crypt;

class CustomerController extends Controller
{
    public function register(customerRegister $request){
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();
    }


    public function customers(){
        $customers = Customer::all();
        return view('customer.activeCustomers', compact('customers'));
    }


    public function edit($id){
        $customer = Customer::find(Crypt::decrypt($id));
        return view('customer.edit', compact('customer'));
    }


    public function updated(editRequest $request){
        $customer = Customer::find(Crypt::decrypt($request->id));
        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        $customer->save();
        return redirect()->route('customer.customers')->with('update', 'successfully updated '.$customer->name);
    }

    public function delete($id){
        $customer = Customer::find(Crypt::decrypt($id));
        $customer->delete();
        return redirect()->route('customer.customers')->with('delete', 'successfully deleted '.$customer->name);
    }

   
}
