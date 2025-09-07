@extends('layout.layout')

@section('title', 'User Login')

<style>
    .login-container {
        padding: 40px 30px;
        background-color: #ffffff;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        width: 100%;
        max-width: 500px;
        margin: 80px auto;
        color: #333;
    }

    .login-container h3 {
        text-align: center;
        margin-bottom: 30px;
        font-weight: 600;
        color: #212529;
    }

    .login-container form {
        padding: 0;
    }

    .login-container a {
        display: block;
        margin: 12px 0;
        text-align: center;
        font-size: 14px;
        color: #0d6efd;
        text-decoration: none;
    }

    .login-container a:hover {
        text-decoration: underline;
    }

    .form-control {
        border-radius: 8px;
        padding: 10px 14px;
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        color: #495057;
        transition: all 0.3s ease;
    }

    .form-control::placeholder {
        color: #adb5bd;
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.2);
        outline: none;
        background-color: #ffffff;
    }

    .btn-outline-primary {
        border-radius: 8px;
        padding: 10px;
        font-weight: 500;
        transition: all 0.3s ease-in-out;
        color: #0d6efd;
        border-color: #0d6efd;
    }

    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: #fff;
    }

    .alert-danger {
        margin-top: 8px;
        font-size: 14px;
        padding: 8px;
        border-radius: 5px;
        background-color: #f44336;
        color: white;
    }

    .session-message {
        text-align: center;
        margin-bottom: 15px;
        padding: 10px;
        background-color: #e2e3e5;
        border-left: 4px solid #0d6efd;
        color: #333;
        border-radius: 6px;
    }
</style>

@section('content')

<div class="container">
    <div class="login-container">
        <h3>Admin Login Form</h3>

        @if(Session::has('login'))
            <div class="session-message">{{ Session::get('login') }}</div>
        @endif

        <a href="{{ route('user.index') }}">No account? Register here</a>

        <form action="{{ route('user.dologin') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter your password">
                @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <a href="{{ route('user.requestResetPasswordMail') }}">Forgot Password?</a>

            <div class="d-grid">
                <button type="submit" class="btn btn-outline-primary">Login</button>
            </div>
        </form>
    </div>
</div>

@endsection
