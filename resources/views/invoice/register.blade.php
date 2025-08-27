@extends('layout.dashboard')

@section('title') Invoice Register @endsection

<style>
    .form-container {
        max-width: 700px;
        margin: 40px auto;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        color: #333;
    }

    .form-container h3 {
        text-align: center;
        margin-bottom: 25px;
        font-weight: 600;
        color: #222;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 6px;
        display: block;
    }

    .form-control, select {
        width: 100%;
        padding: 10px 14px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
        background-color: #f9f9f9;
    }

    select {
        background-color: #fff;
    }

    .btn-submit {
        background-color: #0d6efd;
        color: white;
        padding: 12px;
        border: none;
        width: 100%;
        border-radius: 6px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    .btn-submit:hover {
        background-color: #084298;
    }

    .alert {
        color: red;
        font-size: 14px;
        margin-top: -10px;
        margin-bottom: 10px;
    }

    .row {
        display: flex;
        gap: 20px;
    }

    .col {
        flex: 1;
    }

    #note {
        height: 100px;
        resize: vertical;
    }

    @media (max-width: 768px) {
        .row {
            flex-direction: column;
        }
    }
</style>

@section('content')

<div class="form-container">
    <h3>Invoice Details</h3>
    <form action="{{ route('invoice.register') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col">
                <label for="customer_id" class="form-label">Select Customer</label>
                <select name="customer_id" class="form-control">
                    <option value="">-- Select Customer --</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" >
                            {{ $customer->name }} ({{ $customer->address }})
                        </option>
                    @endforeach
                </select>
                @error('customer_id') <div class="alert">{{ $message }}</div> @enderror
            </div>

            <div class="col">
                <label for="invoice_number" class="form-label">Invoice Number</label>
                <input type="text" name="invoice_number" class="form-control" placeholder="Invoice number" value="{{ old('invoice_number') }}">
                @error('invoice_number') <div class="alert">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                @error('date') <div class="alert">{{ $message }}</div> @enderror
            </div>

            <div class="col">
                <label for="duedate" class="form-label">Due Date</label>
                <input type="date" name="duedate" class="form-control" value="{{ old('duedate') }}">
                @error('duedate') <div class="alert">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="total_amount" class="form-label">Total Amount</label>
                <input type="text" name="total_amount" class="form-control" placeholder="Enter amount" value="{{ old('total_amount') }}">
                @error('total_amount') <div class="alert">{{ $message }}</div> @enderror
            </div>

            <div class="col">
                <label for="status" class="form-label">Status</label>
               <select name="status" id="status" class="form-control">
                <option value="">--Select Status--</option>
                <option value="pending">Pending</option>
                <option value="paid">Paid</option>
               </select>
                @error('status') <div class="alert">{{ $message }}</div> @enderror
            </div>
        </div>

        <label for="note" class="form-label">Note</label>
        <textarea name="note" id="note" class="form-control" placeholder="Additional notes">{{ old('note') }}</textarea>
        @error('note') <div class="alert">{{ $message }}</div> @enderror

        <button type="submit" class="btn-submit">Register</button>
    </form>
</div>

@endsection
