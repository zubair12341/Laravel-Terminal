<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Email</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .btn {
  background-color: #04AA6D; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Invoice Details</h2>
                {{-- <p><strong>UUID:</strong> {{ $invoice->uuid }}</p>
                <p><strong>User ID:</strong> {{ $invoice->user_id }}</p> --}}
                {{-- <p><strong>Customer ID:</strong> {{ $invoice->customer_id }}</p> --}}
                <p><strong>Amount:</strong> ${{ $invoice->amount }}</p>
                <p><strong>Description:</strong> {{ $invoice->description }}</p>
                <p><strong>Brand:</strong> {{ $invoice->brand }}</p>
                <p><strong>Customer Email:</strong> {{ $invoice->customer_email }}</p>
                <p><strong>Customer Name:</strong> {{ $invoice->customer_name }}</p>
                <p><strong>Services:</strong></p>
                <ul>
                    @foreach($invoice->service as $service)
                        <li>{{ $service->name }}</li>
                    @endforeach
                </ul>
@if($invoice->status!='paid')
                <!-- Payment Guidance -->
                <p>To proceed with the payment, please click the button below:</p>
                <a href="{{ $invoice->payment_link }}" style=" 
                    background-color: #04AA6D;
                    border: none;
                    color: white;
                    padding: 9px 15px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin:10px;
                  " class="btn btn-primary">Pay Now</a>
@endif
                <!-- Download PDF Button -->
             
                    <a target="blank" href="{{ route('downloadInvoice', $invoice->uuid) }}" class="btn btn-secondary" style=" 
                        background-color: #04AA6D;
                        border: none;
                        color: white;
                        padding: 9px 15px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                        margin:10px;
                      ">Download PDF</a>
              
            </div>
        </div>
    </div>
</body>
</html>
