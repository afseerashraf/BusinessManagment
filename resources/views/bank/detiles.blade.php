@extends('layout.dashboard')

@section('title', 'Bank Detiles')

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
    <h3>Bank Detiles</h3>
    <a href="{{ route('bank.lowBalanceAlert') }}" class="btn btn-outline-primary btn-sm">Find The Lower Budget</a>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Holder Name</th>
                <th>Account Number</th>
                <th>Bank Name</th>
                <th>IFSC Code</th>
                <th>Balance</th>
                <th>Actions</th>
            
            </tr>
        </thead>
        <tbody>
          @foreach($bankDetiles as $bankdetile)
            <tr>
                <td>{{ $bankdetile->holder_name }}</td>
                <td>{{ $bankdetile->account_number }}</td>
                <td>{{ $bankdetile->bank_name }}</td>
                <td>{{ $bankdetile->ifsc_code }}</td>
                <td>{{ $bankdetile->balance }}</td>
                <td>
                    <a href="{{ route('bank.edit', encrypt($bankdetile->id)) }}" class="btn btn-outline-primary btn-sm">Edit</a>
                    <a href="{{ route('bank.delete', encrypt($bankdetile->id)) }}" class="btn btn-outline-danger btn-sm">Remove</a>
                </td>
            </tr>
          @endforeach
        </tbody>
    </table>
</div>

@endsection
