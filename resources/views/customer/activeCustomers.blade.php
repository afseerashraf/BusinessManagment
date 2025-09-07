@extends('layout.dashboard')

@section('title', 'Active Customers')

@section('content')

<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #121212;
        color: #e0e0e0;
    }

    .container {
        margin-top: 40px;
    }

    h3 {
        font-size: 28px;
        font-weight: 600;
        color: #e0f7fa;
        margin-bottom: 30px;
        text-align: center;
    }

    .alert {
        padding: 12px 20px;
        background-color: #1f6feb;
        color: #fff;
        border-radius: 6px;
        margin-bottom: 20px;
        text-align: center;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    }

    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    .table thead th {
        background-color: #1f6feb;
        color: white;
        padding: 14px;
        text-align: left;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .table tbody tr {
        background-color: #1e1e1e;
        transition: background 0.3s ease;
        border-radius: 10px;
    }

    .table tbody tr:hover {
        background-color: #2c2c2c;
    }

    .table td {
        padding: 14px;
        border-top: 1px solid #2a2a2a;
        border-bottom: 1px solid #2a2a2a;
        color: #ddd;
    }

    .btn-action {
        padding: 6px 12px;
        border-radius: 5px;
        font-size: 14px;
        text-decoration: none;
        transition: background 0.3s;
    }

    .btn-outline-primary {
        background-color: transparent;
        color: #1f6feb;
        border: 1px solid #1f6feb;
    }

    .btn-outline-primary:hover {
        background-color: #1f6feb;
        color: #fff;
    }

    .btn-outline-danger {
        background-color: transparent;
        color: #f44336;
        border: 1px solid #f44336;
        padding-top: 10px;
    }

    .btn-outline-danger:hover {
        background-color: #f44336;
        color: #fff;
    }

    @media (max-width: 768px) {
        .table th, .table td {
            font-size: 14px;
            padding: 10px;
        }

        h3 {
            font-size: 22px;
        }
        
    }
</style>

<div class="container">

    {{-- Session Alerts --}}
    @if(session()->has('update'))
        <div class="alert">{{ Session::get('update') }}</div>
    @endif

    @if(session()->has('delete'))
        <div class="alert">{{ Session::get('delete') }}</div>
    @endif

    @if(session()->has('created'))
        <div class="alert">{{ Session::get('created') }}</div>
    @endif

    <h3>Active Customers</h3>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>
                        
                        <a href="{{ route('customer.edit', encrypt($customer->id)) }}" class="btn-action btn-outline-primary">Edit</a><br>
                        <a href="{{ route('customer.delete', encrypt($customer->id)) }}" class="btn-action btn-outline-danger" onclick="return confirm('Are you sure wanna remove the customer');">Remove</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
