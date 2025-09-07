@extends('layout.dashboard')

@section('title', 'Invoice Dtiles')

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

    .table th,
    .table td {
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

        .table th,
        .table td {
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
    <h3>Invoice Detiles</h3>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>customer Name</th>
                <th>invoice_number </th>
                <th>date</th>
                <th>due_date</th>
                <th>total_amount</th>
                <th>status</th>
                <th>notes</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
            <tr>
                <td>{{ $invoice->customers->name }}</td>
                <td>{{ $invoice->invoice_number }}</td>
                <td>{{ \Carbon\Carbon::parse($invoice->date)->format('Y-F-d') }}</td>
                <td>{{ \Carbon\Carbon::parse($invoice->due_date)->format('Y-F-d') }}</td>
                <td>{{ $invoice->total_amount }}</td>
                <td>
                    @if($invoice->status != 'paid')
                        <p style="color:red;">{{ $invoice->status }}</p>

                    @else
                        {{ $invoice->status }}💵✔️
                    @endif
                </td>
                <td>{{ $invoice->notes }}</td>
                <td style="white-space: nowrap;">
                    <a href="{{ route('invoice.edit', encrypt($invoice->id)) }}" class="btn btn-outline-primary btn-sm" style="margin-right: 5px;">Edit</a>
                    <a href="{{ route('invoice.delete', encrypt($invoice->id)) }}" class="btn btn-outline-danger btn-sm" style="margin-right: 5px;" onclick="return confirm('Are you sure wanna remove the invoice');">Delete</a>
                    <a href="{{ route('invoice.download', encrypt($invoice->id)) }}" class="btn btn-outline-success btn-sm">Download</a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection