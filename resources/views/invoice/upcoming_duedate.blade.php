@extends('layout.layout')

@section('title')
    Upcoming Due Date
@endsection

@section('content')

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Invoice Number</th>
            <th>Customer Name</th>
            <th>Due Date</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="overDueinvoice_invoiceNumber"></td>
            <td class="OverdueCustomer"></td>
            <td class="dueDate"></td>
        </tr>
    </tbody>
</table>

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" 
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" 
    crossorigin="anonymous"></script>

<script>
// Enable Pusher logging - disable in production
Pusher.logToConsole = true;

// Initialize Pusher
var pusher = new Pusher('8262035bab63e2ea47fb', {
    cluster: 'ap2'
});

// Subscribe to the channel and bind an event
var channel = pusher.subscribe('my-channel');
channel.bind('upcoming_invoice', function(data) {
    // Update the table cells with received data
    $(".overDueinvoice_invoiceNumber").html(data.upcominginvoice.invoice_number);
    $(".OverdueCustomer").html(data.upcominginvoice.customers.name);
    $(".dueDate").html(data.upcominginvoice.due_date);
    console.log(JSON.stringify(data));

});
</script>

@endsection
