<?php

namespace App\Http\Controllers;

use App\Http\Requests\vendor\vendorRequest;
use Illuminate\Http\Request;
use App\Models\Vendor;
class VendorController extends Controller
{
    public function register(vendorRequest $request){
        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->contact_person = $request->contact_person;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->save();
    }
}
