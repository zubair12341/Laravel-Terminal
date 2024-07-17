<!DOCTYPE html>
<html>
<head>
    <title>Invoice Created</title>
</head>
<body>
    <h2>Invoice Created</h2>
    <p>Thank you for creating the invoice. Here are the invoice details:</p>
    
    <table>
        <tr>
            <th>Invoice #</th>
            <td>{{ $invoice->id }}</td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>{{ $invoice->amount }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $invoice->description }}</td>
        </tr>
        <tr>
            <th>Brand</th>
            <td>{{ $invoice->brand }}</td>
        </tr>
    </table>

    <p>Please proceed with the payment by clicking on the payment link provided:</p>
    <a href="{{ $invoice->payment_link }}">{{ $invoice->payment_link }}</a>

    <p>Thank you for your business!</p>
</body>
</html>
