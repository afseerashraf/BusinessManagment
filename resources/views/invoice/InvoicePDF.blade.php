<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <p><strong>Customer:</strong> {{ $invoiceCustomer->customers->name }}</p>
    <p><strong>Invoice Number:</strong> {{ $invoiceCustomer->invoice_number }}</p>
    <p><strong>Total Amount:</strong> {{ $invoiceCustomer->total_amount }}</p>
    <p><strong>Due Date:</strong> {{ $invoiceCustomer->due_date }}</p>
</div>

</body>
</html>