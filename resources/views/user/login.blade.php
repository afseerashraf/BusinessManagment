@extends('layout.layout')

@section('title', 'user Login')

@section('content')

<style>
    .login-container {
        padding-top: 50px;
        background-color: #2e3033;
        box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
        color: #fafcff;
    }

    .login-container h3 {
        text-align: center;
        margin-bottom: 20px;
    }

    .login-container form {
        padding: 20px;
       
    }

    .login-container a {
        display: block;
        margin-bottom: 15px;
        text-align: center;
    }
</style>

<div class="container">
    <div class="login-container">
        <h3>Admin Login Form</h3>
        @if(Session::has('login'))
            <p>{{ Session::get('login') }}</p>
        @endif

        <a href="{{ route('user.index') }}">No account? Register here</a>

        <form action="{{ route('user.dologin') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
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