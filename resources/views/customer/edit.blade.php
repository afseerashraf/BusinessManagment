@extends('layout.dashboard')

@section('title')
    Customer Edit
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
    input[type="text"]#address{
        height: 100px;
    }
</style>

<div class="container">
    <div class="register-container">
        <h3>Customer Edit Form</h3>
        <form action="{{ route('customer.updated') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ encrypt($customer->id) }}">
            <div class="row">
                <div class="col">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $customer->name }}">
                @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>

            <div class="col">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $customer->email }}">
                @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ $customer->phone }}">
                @error('phone') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea type="text" id="address" name="address" class="form-control" rows="">{{ $customer->address }}</textarea>
                @error('address') <div class="alert alert-danger">{{ $message }}</div> @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-outline-primary">update</button>
            </div>
        </form>
    </div>
</div>

@endsection
