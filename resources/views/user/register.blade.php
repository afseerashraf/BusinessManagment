@extends('layout.layout')

@section('title', 'Admin Register')

@section('content')

<style>
    .register-container {
        padding: 40px 30px;
        background-color: #ffffff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        width: 100%;
        max-width: 500px;
        margin: 80px auto;
        transition: all 0.3s ease-in-out;
    }

    .register-container h3 {
        text-align: center;
        margin-bottom: 30px;
        font-weight: 600;
        color: #333;
    }

    .register-container form {
        padding: 0;
    }

    .register-container a {
        display: block;
        margin-bottom: 20px;
        text-align: center;
        font-size: 14px;
        color: #555;
        text-decoration: none;
    }

    .register-container a:hover {
        text-decoration: underline;
    }

    .form-control {
        border-radius: 8px;
        padding: 10px 14px;
        border: 1px solid #ccc;
        transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        outline: none;
    }

    .btn-outline-primary {
        border-radius: 8px;
        padding: 10px;
        font-weight: 500;
        transition: all 0.3s ease-in-out;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
    }

    .alert-danger {
        margin-top: 8px;
        font-size: 14px;
        padding: 8px;
        border-radius: 5px;
    }
</style>

<div class="container">
    <div class="register-container">
        <h3>User Register Form</h3>
        <a href="{{ route('user.login') }}">Already have an account?</a>

        <form action="{{ route('user.register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your full name" value="{{ old('name') }}">
                @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Create a password">
                @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-outline-primary">Register</button>
            </div>
        </form>
    </div>
</div>

@endsection
