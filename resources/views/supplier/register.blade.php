@extends('layout.dashboard')
@section('title')Vendor Register @endsection
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
    <h3>Vendor Register</h3>
    <form action="{{ route('supplier.register') }}" method="post">
        @csrf

<div class="row">
    <div class="col">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="name">
        @error('status') <div class="alert">{{ $message }}</div> @enderror
        </div>

<div class="col">
        <label for="contact_person" class="form-label">Contact Person</label>
        <input type="text" id="contact_person" name="contact person" class="form-control" rows="4" placeholder="contact_person"></input>
        @error('contact_person') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
    </div>
    <div class="row">
        <div class="col">
        <label for="Email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" rows="4" placeholder="email"></input>
        @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
        <div class="col">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" id="phone" name="phone" class="form-control" rows="4" placeholder="phone"></input>
        @error('phone') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
    </div>
      
      
        <label for="address" class="form-label">Address</label>
        <textarea id="address" name="address" class="form-control" rows="4" placeholder="Enter your address here"></textarea>
        @error('address') <div class="alert alert-danger">{{ $message }}</div> @enderror
       

        <input type="submit" class="btn" value="Register">
    </form>
</div>
@endsection