<?php

namespace App\Http\Controllers;

use App\Http\Requests\vendor\vendorRequest;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class VendorController extends Controller
{
    public function register(vendorRequest $request)
    {
        $vendor = new Vendor;
        $vendor->name = $request->name;
        $vendor->contact_person = $request->contact_person;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->save();

        return redirect()->route('supplier.vendors');
    }

    public function vendors()
    {
        $vendors = Vendor::all();

        return view('supplier.vendors', compact('vendors'));
    }

    public function edit($id)
    {
        $vendor = Vendor::find(Crypt::decrypt($id));

        return view('supplier.edit', compact('vendor'));
    }

    public function updated(Request $request)
    {
        $vendor = Vendor::find(Crypt::decrypt($request->id));

        $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'contact_person' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric', 'digits_between:10,12'],
            'address' => ['required', 'regex:/^[a-zA-Z0-9\s,.\n-]+$/'],

        ]);
        $vendor->update([
            'name' => $request->name,
            'contact_person' => $request->contact_person,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,

        ]);
        $vendor->save();

        return redirect()->route('supplier.vendors')->with('updated', 'successfully updated '.$vendor->name);
    }

    public function delete($id)
    {
        $vendor = Vendor::find(Crypt::decrypt($id));
        $vendor->delete();

        return redirect()->route('supplier.vendors')->with('delete', $vendor->name.' deleted');
    }
}
