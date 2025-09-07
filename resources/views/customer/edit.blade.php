@extends('layout.dashboard')

@section('title')
    Customer Edit
@endsection

@section('content')
<style>
    .register-container {
        background-color: #ffffff;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        border-radius: 12px;
        padding: 30px;
        max-width: 600px;
        margin: 60px auto;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
    }

    .register-container h3 {
        text-align: center;
        margin-bottom: 25px;
        font-weight: 600;
        color: #2c3e50;
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 6px;
        display: block;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ccc;
        padding: 10px 14px;
        font-size: 14px;
        width: 100%;
        margin-bottom: 15px;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #5e60ce;
        outline: none;
        box-shadow: 0 0 0 2px rgba(94, 96, 206, 0.2);
    }

    textarea.form-control {
        height: 100px;
        resize: vertical;
    }

    .btn-outline-primary {
        padding: 10px 20px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 8px;
        border: 2px solid #5e60ce;
        color: #5e60ce;
        background-color: transparent;
        transition: all 0.3s ease-in-out;
    }

    .btn-outline-primary:hover {
        background-color: #5e60ce;
        color: #fff;
    }

    .alert-danger {
        font-size: 13px;
        margin-top: -10px;
        margin-bottom: 10px;
    }
</style>

<div class="container">
    <div class="register-container">
        <h3>Customer Edit Form</h3>
        <form action="{{ route('customer.updated') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ encrypt($customer->id) }}">

            <label for="name" class="form-label">Name</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $customer->name) }}">
            @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror

            <label for="email" class="form-label">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $customer->email) }}">
            @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror

            <label for="phone" class="form-label">Phone</label>
            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone', $customer->phone) }}">
            @error('phone') <div class="alert alert-danger">{{ $message }}</div> @enderror

            <label for="address" class="form-label">Address</label>
            <textarea id="address" name="address" class="form-control">{{ old('address', $customer->address) }}</textarea>
            @error('address') <div class="alert alert-danger">{{ $message }}</div> @enderror

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-outline-primary">Update Customer</button>
            </div>
        </form>
    </div>
</div>

@endsection
