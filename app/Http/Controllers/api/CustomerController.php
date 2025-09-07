<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customers()
    {
        $customers = Customer::all();

        return $customers;
    }

    public function register(Request $request)
    {
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        $customer->save();
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully.'], 200);

    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,

        ]);
        $customer->save();

        return response()->json(['message' => 'Customer updated successfully.'], 200);

    }
}
