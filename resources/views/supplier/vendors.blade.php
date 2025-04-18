@extends('layout.dashboard')

@section('title', 'Vendors')

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
        color: #000;
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

    /* Alert Styling */
    .alert {
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }

    /* Action Button Styling */
    .btn-sm {
        padding: 6px 10px;
        font-size: 14px;
    }
</style>

<div class="container">
    <h3>Vendors</h3>

    {{-- Display session messages --}}
    @if(session('updated'))
        <div class="alert alert-success">{{ session('updated') }}</div>
    @endif

    @if(session('delete'))
        <div class="alert alert-danger">{{ session('delete') }}</div>
    @endif

    {{-- Vendor Table --}}
    <table class="table table-striped">
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
            @forelse($vendors as $vendor)
                <tr>
                    <td>{{ $vendor->name }}</td>
                    <td>{{ $vendor->contact_person }}</td>
                    <td>{{ $vendor->email }}</td>
                    <td>{{ $vendor->phone }}</td>
                    <td>{{ $vendor->address }}</td>
                    <td>
                        <a href="{{ route('supplier.edit', encrypt($vendor->id)) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                        <a href="{{ route('supplier.delete', encrypt($vendor->id)) }}" class="btn btn-outline-danger btn-sm"
                           onclick="return confirm('Are you sure you want to delete this vendor?');">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">No vendors available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
