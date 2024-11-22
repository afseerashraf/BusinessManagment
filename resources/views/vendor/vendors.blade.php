@extends('layout.dashboard')

@section('title', 'vendors')

@section('content')

<style>
    /* General Styles */
    body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #e0e0e0;
        }

    .container {
        margin-top: 30px;
    }

    h3 {
        font-size: 24px;
        font-weight: bold;
        color: #b9c7bd;
        margin-bottom: 20px;
    }

    /* Table Styling */
    .table {
        width: 100%;
        margin-top: 20px;
        background-color: #b9c7bd;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .table th, .table td {
        padding: 15px;
        text-align: left;
        font-size: 16px;
    }

    .table th {
        background-color: #1f6feb;
        color: white;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .table td {
        border-bottom: 1px solid #e1e1e1;
    }

    .table tbody tr:hover {
        background-color: #f0f7ff;
        cursor: pointer;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .table th, .table td {
            padding: 10px;
            font-size: 14px;
        }
    }

    /* Utility Classes */
    .text-muted {
        color: #888;
    }
    .btn-action {
        background-color: #1f6feb;
        color: white;
        padding: 8px 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-action:hover {
        background-color: #155ab7;
    }
</style>

<div class="container">
    <h3>Vendors</h3>
   
    @if(session()->has('updated'))
        <p>{{ Session::get('updated') }}</p>
    @endif

    @if(Session::has('delete'))
        <p>{{ Session::get('delete') }}</p>
    @endif
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Contact Person</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendors as $vendor)
                <tr>
                   <td>{{ $vendor->name }}</td>
                   <td>{{ $vendor->contact_person }}</td>
                   <td>{{ $vendor->email }}</td>
                   <td>{{ $vendor->phone }}</td>
                   <td>{{ $vendor->address }}</td>
                   <td>
                    <a href="{{ route('vendor.edit', encrypt($vendor->id)) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                    <a href="{{ route('vendor.delete', encrypt($vendor->id)) }}" class="btn btn-outline-danger btn-sm">Delete</a>
                   </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection