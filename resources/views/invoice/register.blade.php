@extends('layout.dashboard')
@section('title')Invoice Register @endsection
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .container {
        background-color: #f2f2f2;
        width: 100%;
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: white;
        color: black;
    }

    .container h3 {
        text-align: center;
        margin-bottom: 20px;
    }

    .container form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 5px;
    }

    input,
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .btn {
        background-color: #007bff;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .banner {
        width: 100%;
        height: 200px;
        background-image: url('');
        /* Example image URL */
        background-size: cover;
        background-position: center;
        border-radius: 8px 8px 0 0;
    }

    .alert {
        color: red;
        margin-bottom: 10px;
    }
    #note{
        height: 100px;
    }
</style>

@section('content')

<div class="container">
 <h3>Invoice Detiles</h3>
 <form action="{{ route('invoice.register') }}" method="post">
    @csrf 

<div class="row">
    <div class="col">
    <label for="customer">Select customer</label>
    <select name="customer_id">
    <option value="" selected>--Select Customer--</option>
        @foreach($customers as $customer)
        <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->address }})</option>
        @endforeach
    </select>
    @error('customer_id') <div class="alert">{{ $message }}</div> @enderror
    </div>
<div class="col">
    <label for="invoice_number">Invoice Number</label>
    <input type="text" name="invoice_number" placeholder="invoice number"">
    @error('invoice_number') <div class="alert">{{ $message }}</div> @enderror
</div>
</div>

<div class="row">
    <div class="col">
    <label for="date">Date</label>
    <input type="date" name="date">
    @error('date') <div class="alert">{{ $message }}</div> @enderror
    </div>
<div class="col">
    <label for="duedate">Due Date</label>
    <input type="date" name="duedate">
    @error('duedate') <div class="alert">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col">
    <label for="totalamount">Total Amount</label>
    <input type="text" class="form-controller" name="total_amount" placeholder="Enter amount">
    @error('total_amount') <p class="error-message">{{ $message }}</p> @enderror
    </div>
<div class="col">
    <label for="name">Status</label>
    <input type="text" name="status" placeholder="status">
    @error('status') <div class="alert">{{ $message }}</div> @enderror
    </div>
</div>
  
    <label for="note" class="form-label">Note</label>
    <input type="text" id="note" name="note" class="form-control" rows="4" placeholder="Note"></input>
    @error('note') <div class="alert alert-danger">{{ $message }}</div> @enderror
    

    <input type="submit" class="btn" value="Register">
    </form>
</div>
@endsection