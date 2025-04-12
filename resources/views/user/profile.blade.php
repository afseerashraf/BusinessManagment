@extends('layout.dashboard')
@section('title') Admin Profile @endsection

<style>
    .profile-container {
        max-width: 500px;
        margin: 80px auto;
        padding: 30px;
        background-color: #ffffff;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        border-radius: 12px;
        text-align: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .profile-container h3 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }

    .profile-avatar {
        width: 100px;
        height: 100px;
        margin: 0 auto 20px auto;
        border-radius: 50%;
        background-color: #dee2e6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        color: #6c757d;
    }

    .profile-details {
        text-align: left;
        margin-top: 20px;
    }

    .profile-details li {
        list-style: none;
        font-size: 17px;
        margin-bottom: 12px;
        padding-left: 10px;
        color: #444;
    }

    .btn-logout {
        margin-top: 25px;
        display: inline-block;
        padding: 10px 20px;
        border: none;
        background-color: #dc3545;
        color: #fff;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.3s ease;
    }

    .btn-logout:hover {
        background-color: #c82333;
    }
</style>

@section('content')

<div class="profile-container">
    <div class="profile-avatar">
        {{ strtoupper(substr(session('user')->name, 0, 1)) }}
    </div>

    <h3>Admin Profile</h3>

    <ul class="profile-details">
        <li><strong>Name:</strong> {{ ucfirst(session('user')->name) }}</li>
        <li><strong>Email:</strong> {{ session('user')->email }}</li>
    </ul>

    <a href="{{ route('user.logout', encrypt(session('user')->id)) }}" class="btn-logout">Logout</a>
</div>

@endsection
