<?php

namespace App\Http\Controllers;

use App\Http\Requests\bank\bankRequest;
use App\Http\Requests\bank\EditRequest;
use App\Models\Bank;
use Illuminate\Support\Facades\Crypt;

class BankController extends Controller
{
    public function register(bankRequest $request)
    {
        $bank = new Bank;
        $bank->holder_name = $request->holder_name;
        $bank->account_number = $request->account_number;
        $bank->bank_name = $request->bankName;
        $bank->ifsc_code = $request->ifsc_code;
        $bank->balance = $request->balance;
        $bank->save();

        toastr()->success('successfully recorded bank detiles');

        return redirect()->route('bank.detiles');
    }

    public function bankDetiles()
    {
        $bankDetiles = Bank::all();

        return view('bank.detiles', compact('bankDetiles'));
    }

    public function edit($id)
    {
        $bankAc = Bank::find(Crypt::decrypt($id));

        return view('bank.edit', compact('bankAc'));
    }

    public function updated(EditRequest $request)
    {
        $bankId = Bank::find(Crypt::decrypt($request->id));

        $bankId->update([
            'holder_name' => $request->holder_name,
            'account_number' => $request->account_number,
            'bank_name' => $request->bankName,
            'ifsc_code' => $request->ifsc_code,
            'balance' => $request->balance,
        ]);
        $bankId->save();

        toastr()->success('successfully Updated Bank Detiles');

        return redirect()->route('bank.detiles');

    }

    public function deleted($id)
    {
        $bankId = Bank::find(Crypt::decrypt($id));
        $bankId->delete();
        toastr()->success('successfully Deleted '.$bankId->account_name);

        return redirect()->route('bank.detiles');

    }

    public function lowBalanceAlert()
    {
        $bankAlerts = Bank::where('balance', '<', 1000)->get();

        foreach ($bankAlerts as $bankAlert) {
            toastr()->success($bankAlert->account_name.' Balance is low!');

            return redirect()->route('bank.detiles');
        }

    }
}
