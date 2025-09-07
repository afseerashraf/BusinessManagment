@extends('layout.dashboard')
@section('title') Edit Expense @endsection
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

    #note {
        height: 100px;
    }
</style>

@section('content')

<div class="container">
    <h3>Expense Detiles</h3>
    <form action="{{ route('expense.updated') }}" method="post">
        @csrf
    <input type="hidden" name="id" value="{{ encrypt($expense->id) }}">
        <div class="row">
            <div class="col">
                <label for="vendor">Select vendor</label>
                <select name="vendor_id">
                    <option value="" selected>--Select vendor--</option>
                    @foreach($vendors as $vendor)
                    <option value="{{ $expense->vendor_id }}" {{ $expense->vendor_id == $vendor->id ? 'selected' : '' }}>{{ $vendor->name }} ({{ $vendor->contact_person }})</option>
                    @endforeach
                </select>
                @error('vendor_id') <div class="alert">{{ $message }}</div> @enderror
            </div>
            <div class="col">
                <label for="description">Description</label>
                <input type="text" name="description" placeholder="description" value="{{ $expense->description }}">
                @error('description') <div class=" alert">{{ $message }}</div> @enderror
            
        </div>
</div>

<div class="row">
    <div class="col">
        <label for="amount">Amount</label>
        <input type="text" name="amount" placeholder="amount" value="{{ $expense->amount }}">
        @error('amount') <div class="alert">{{ $message }}</div> @enderror
    </div>
    <div class="col">
        <label for="date">Date</label>
        <input type="date" name="date" value="{{ $expense->date }}">
        @error('date') <div class="alert">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row">
    <div class="col">
        <label for="category">Category</label>
        <select name="category" id="category">
            <option value="{{ $expense->category }}">{{ $expense->category }}</option>
            <option value="utilities">Utilities</option>
            <option value="rent">Rent</option>
            <option value="officeSupplies">Office Supplies</option>
        </select>
    </div>
    <div class="col">
        <label for="note">note</label>
        <input type="text" name="note" placeholder="note" value="{{ $expense->notes }}">
        @error('note') <div class="alert">{{ $message }}</div> @enderror
    </div>
</div>


<input type="submit" class="btn" value="update">
</form>
</div>
@endsection