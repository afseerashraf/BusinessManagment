<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\customer\customerRegister;
use App\Models\Customer;
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
}
