<!DOCTYPE html>
<html>

<head>
    <title>
        @if ($invoice)
            {{ $invoice->order_number }}
        @endif
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    @if ($invoice)
        <style type="text/css">
            .invoice-header {
                background: #f7f7f7;
                padding: 10px 20px 10px 20px;
                border-bottom: 1px solid gray;
            }

            .site-logo {
                margin-top: 20px;
            }

            .invoice-right-top h3 {
                padding-right: 20px;
                margin-top: 20px;
                color: #0C4A6E;
                font-size: 30px !important;
                font-family: serif;
            }

            .invoice-left-top {
                border-left: 4px solid #0C4A6E;
                padding-left: 20px;
                padding-top: 20px;
            }

            .invoice-left-top p {
                margin: 0;
                line-height: 20px;
                font-size: 16px;
                margin-bottom: 3px;
            }

            thead {
                background: #0C4A6E;
                color: #FFF;
            }

            .authority h5 {
                margin-top: -10px;
                color: #0C4A6E;
            }

            .thanks h4 {
                color: #0C4A6E;
                font-size: 25px;
                font-weight: normal;
                font-family: serif;
                margin-top: 20px;
            }

            .site-address p {
                line-height: 6px;
                font-weight: 300;
            }

            .table tfoot .empty {
                border: none;
            }

            .table-bordered {
                min-width: 100%;
                border: none;
            }

            .table-header {
                padding: .75rem 1.25rem;
                margin-bottom: 0;
                background-color: rgba(0, 0, 0, .03);
                border-bottom: 1px solid rgba(0, 0, 0, .125);
            }

            .table td,
            .table th {
                padding: .30rem;
            }
        </style>
        <div class="invoice-header">
            <div class="mx-auto site-logo">

                @if ($invoice->brand == 'Creative Web Master')
                    <img src="{{ asset('/dashtrap/TCWM.png') }}" alt="{{ $invoice->brand }}" style="width: 150px">
                @elseif($invoice->brand == 'Logo Wall Street')
                    <img src="{{ asset('/dashtrap/LWS.png') }}" alt="{{ $invoice->brand }}" style="width: 150px">
                @else
                    <img src="{{ asset('/dashtrap/american.png') }}" alt="{{ $invoice->brand }}" style="width: 150px">
                @endif

            </div>
            {{-- <div class="float-right site-address">
      <h4>{{env('APP_NAME')}}</h4>
      <p>{{env('APP_ADDRESS')}}</p>
      <p>Phone: <a href="tel:{{env('APP_PHONE')}}">{{env('APP_PHONE')}}</a></p>
      <p>Email: <a href="mailto:{{env('APP_EMAIL')}}">{{env('APP_EMAIL')}}</a></p>
    </div> --}}
            <div class="clearfix"></div>
        </div>
        <div class="invoice-description">
            <div class="invoice-left-top float-left">
                <div class="row">
                 

                        <p><strong>Order Number:</strong> {{ $invoice->order_number }}</p>
                        <p><strong>Custumer Name:</strong> {{ $invoice->customer_name }} </p>
                        <div class="address">
                            <p><strong>Custumer Email:</strong> {{ $invoice->customer_email }}</p>
                        </div>
                        <p><strong>Date:</strong> {{ $invoice->created_at->format('D d m Y') }}</p>
                  
                        @if ($invoice->status == 'paid')
                        <img style="height: 100px" src="{{ asset('/asset/paid.png') }}" alt="Paid">
                        @else
                            <img style="height: 100px" src="{{ asset('/asset/unpaid.jpg') }}" alt="Unpaid Stamp">
                        @endif
                   

                </div>

               
            </div>
            <div class="invoice-right-top " class="text-right">


                {{-- <img class="img-responsive" src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(150)->generate(route('admin.product.order.show', $invoice->id )))}}"> --}}
            </div>
            <div class="clearfix"></div>
        </div>
        <section class="order_details pt-3">
            <div class="table-header">
                <h5>Order Details</h5>
            </div>
            <table class="table table-bordered table-stripe">
                <thead>
                    <tr>
                        <th scope="col" class="col" style="min-width: 100px;">Brand</th>
                        <th scope="col" class="col" style="min-width: 250px;">Service</th>
                        <th scope="col" class="col" style="min-width: 80px;">Price</th>
                    </tr>
                </thead>


                <tbody>

                    <tr>
                        <td style="min-width: 100px;"><span>{{ $invoice->brand }}</span></td>
                        <td style="min-width: 250px;"><span>
                                @foreach ($invoice->service as $pro)
                                    {{ $pro->name }}
                                @endforeach
                            </span></td>
                        <td style="min-width: 80px;"><span>${{ number_format($invoice->amount, 2) }}</span></td>

                    </tr>

                </tbody>
                <tfoot>

                    {{-- <tr>
                        <th scope="col" class="empty"></th>
                        <th scope="col" class="empty"></th>
                        <th scope="col" class="text-right">Subtotal:</th>
                        <th scope="col"> <span>${{ number_format($invoice->amount, 2) }}</span></th>
                    </tr> --}}

                    <tr>
                    
                        <th scope="col" class="empty"></th>
                        <th scope="col" class="text-right">Total:</th>
                        <th>
                            <span>
                                ${{ number_format($invoice->amount, 2) }}
                            </span>
                        </th>
                    </tr>
                    @if($invoice->status != 'paid')
                    <tr>
                    
                        <th scope="col" class="empty"></th>
                        <th scope="col" class="empty"></th>
                        <th>
                            <span>
                               <a href="{{$invoice->payment_link}}" target="blank" class="btn btn-primary mt-2">Paynow</a>
                            </span>
                        </th>
                    </tr>
                    @endif
                </tfoot>
            </table>
        </section>
        <div class="thanks mt-3">
            <h4>Thank you for your business !!</h4>
        </div>
        <div class="authority float-right mt-5">
            <p>-----------------------------------</p>
            <h5>Authority Signature:</h5>
        </div>
        <div class="clearfix"></div>
    @else
        <h5 class="text-danger">Invalid</h5>
    @endif
</body>

</html>
