<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\bank\bankRequest;
use App\Models\Bank;
class BankController extends Controller
{
    public function register(bankRequest $request){
        $bank = new Bank();
        $bank->account_name = $request->account_name;
        $bank->account_number = $request->account_number;
        $bank->bank_name = $request->bankName;
        $bank->ifsc_code = $request->ifsc_code;
        $bank->balance = $request->balance;
        $bank->save();
    }
}
