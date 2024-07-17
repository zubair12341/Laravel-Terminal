


@extends('user.layout.user')

@section('user')

    <div class="container">
        @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('error') }}!
         
        </div>
    @endif
        <h1 class="text-center mb-4">Invoice Created</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Invoice # {{ $invoice->order_number }}</h5>
                <p class="card-text">Amount: ${{ $invoice->amount }}</p>
                <p class="card-text">Description: {{ $invoice->description }}</p>
                <p class="card-text">Brand: {{ $invoice->brand }}</p>
                <p class="card-text">Invoice Type: @foreach($invoice->service as $s) 
                    {{$s->name.' '}} @endforeach</p>
                <p class="card-text">Customer Name: {{ $invoice->customer_name}}</p>
                <p class="card-text">Customer Email: {{ $invoice->customer_email }}</p>
               
                <hr>
                <!-- Other invoice details -->

                <div class="form-group">
                    <label for="payment_link">Payment Link:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="payment_link"
                            value="{{ $invoice->payment_link }}" readonly>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" onclick="copyPaymentLink()">Copy</button>
                        </div>
                    </div>
                </div>
                {{-- @php $cus_id= App\Models\StripeDetail::where('customer_id',$invoice->customer_id)->first(); @endphp
                @if($cus_id)
                <div class="form-group">
                    <form action="{{route('stripe.payment')}}" method="POST">
                        @csrf
                        <input type="hidden" name="customer_id" value="{{$invoice->customer_id}}">
                        <input type="hidden" name="invoice_id" value="{{$invoice->id}}">

                        <button class="btn btn-success" type="submit" >Pay Now</button>
                    </form>
                </div>
                @endif --}}
            </div>
        </div>
    </div>

    <script>
        function copyPaymentLink() {
            var paymentLink = document.getElementById("payment_link");
            paymentLink.select();
            document.execCommand("copy");
        }
    </script>
 @endsection <!-- Close admin section -->

