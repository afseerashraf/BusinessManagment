@extends('layout.dashboard')

@section('title')
    Customer Register
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
        <h3>Customer Register Form</h3>

        <form action="{{ route('customer.register') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>

            <div class="col">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                @error('phone') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea id="address" name="address" class="form-control" rows="4" placeholder="Enter customer address city state postal country"></textarea>
                @error('address') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-outline-primary">Register</button>
            </div>
        </form>
    </div>
</div>

@endsection
