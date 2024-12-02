@extends('layout.layout')

@section('title')
    Upcoming Due Date
@endsection

@section('content')

<h3>Over dueInvoice</h3>

<table class="table">
    <tr>
        <th class="customer_name">Customer Name</th>
        <th class="over_due_date">Over Due Date</th>
    </tr>
</table>

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
channel.bind('overDue_invoice', function(data) {
    // Update the table cells with received data
    $(".customer_name").html(data.overdue.customers.name);
    $('.over_due_date').html(data.overdue.due_date);

    console.log(JSON.stringify(data));

});
</script>

@endsection
