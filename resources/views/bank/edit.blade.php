@extends('layout.dashboard')

@section('title')
Edit Bank Detiles
@endsection

@section('content')
<style>
    .register-container {
        padding-top: 50px;
        background-color: #f2e7e5;
        box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
        color: black;
    }

    .register-container h3 {
        text-align: center;
        margin-bottom: 20px;
    }

    .register-container form {
        padding: 20px;
    }

    .register-container a {
        display: block;
        margin-bottom: 15px;
        text-align: center;
    }
</style>

<div class="container">
    <div class="register-container">
        <h3>Edit Bank Detiles</h3>

        <form action="{{ route('bank.updated') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ encrypt($bankAc->id) }}" name="id">
            <div class="row">
                <div class="col">
                    <label for="name" class="form-label">Account Name</label>
                    <input type="text" class="form-control" name="account_name" placeholder="Account Name" value="{{ $bankAc->account_name }}">
                    @error('account_name') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>
                <div class="col">

                    <label for="Account Number" class="form-label">Account Number</label>
                    <input type="text" class="form-control" name="account_number" placeholder="Account Number" value="{{ $bankAc->account_number }}">
                    @error('account_number') <div class="alert alert-danger">{{ $message }}</div> @enderror

                </div>

            </div>

            <div class="row">
                <div class="col">

                    <label for="bank name" class="form-label">Bank Name</label>
                    <input type="text" id="bankName" name="bankName" class="form-control" value="{{ $bankAc->bank_name }}" placeholder="Bank Name"></input>
                    @error('bankName') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col">
                    <label for="ifsc code" class="form-label">IFSC Code</label>
                    <input type="text" id="ifscCode" name="ifsc_code" class="form-control" placeholder="IFSC Code" value="{{ $bankAc->ifsc_code }}"></input>
                    @error('ifsc_code') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="balance" class="form-label">Balance</label>
                <input type="text" class="form-control" name="balance" placeholder="Balance" value="{{ $bankAc->balance }}">
                @error('balance') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-outline-primary">update</button>
            </div>
    </div>

    </form>
</div>
</div>


@endsection