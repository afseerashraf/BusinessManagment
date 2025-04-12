@extends('layout.dashboard')

@section('title')
    Customer Register
@endsection

@section('content')
<style>
   
    .register-container {
        margin-top: 50px;
        margin-bottom: 50px;
    }

    .register-card {
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        padding: 40px 30px;
        max-width: 600px;
        margin: 0 auto;
    }

    .register-card h3 {
        text-align: center;
        margin-bottom: 30px;
        color: #3b3b3b;
        font-weight: bold;
    }

    .form-label {
        font-weight: 600;
        color: #555;
    }

    .form-control {
        border-radius: 6px;
        border: 1px solid #ccc;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #3b82f6;
    }

    .btn-register {
        background-color: #3b82f6;
        color: #fff;
        border-radius: 6px;
        padding: 10px;
        font-weight: 600;
    }

    .btn-register:hover {
        background-color: #2563eb;
    }

    .alert-danger {
        font-size: 14px;
        margin-top: 5px;
    }
</style>

<div class="container register-container">
    <div class="register-card">
        <h3>Customer Registration</h3>
        <form action="{{ route('customer.register') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" placeholder="John Doe" value="{{ old('name') }}">
                    @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email" placeholder="example@mail.com" value="{{ old('email') }}">
                    @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone" placeholder="123-456-7890" value="{{ old('phone') }}">
                @error('phone') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-4">
                <label for="address" class="form-label">Full Address</label>
                <textarea id="address" name="address" class="form-control" rows="3" placeholder="Street, City, State, ZIP, Country">{{ old('address') }}</textarea>
                @error('address') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-register">Register Customer</button>
            </div>
        </form>
    </div>
</div>
@endsection
