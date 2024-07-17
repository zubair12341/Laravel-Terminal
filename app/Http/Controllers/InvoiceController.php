<?php

namespace App\Http\Controllers;

use App\Mail\SendInvoice;
use App\Models\BillingDetail;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\InvoiceService;
use App\Models\StripeDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Str;
use Stripe;
use Stripe\PaymentMethod;
use TCPDF;
use Dompdf\Dompdf;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('create-invoice');
    }

    public function expire()
    {
        return view('expired');
    }

    public function showUser($invoiceId)
    {
        $invoice = Invoice::findOrFail($invoiceId);
        return view('user.show', compact('invoice'));
    }
    public function showAdmin($invoiceId)
    {
        $invoice = Invoice::findOrFail($invoiceId);
        return view('admin.show', compact('invoice'));
    }

    public function successPage($uuid)
    {
        $invoice = Invoice::where('uuid', $uuid)->first();
        // $invoice->status = 'paid';
        // $invoice->save();
        return view('success', ['invoice' => $invoice]);
    }

    public function cancelPage()
    {
        return view('cancel');
    }

    

    public function downloadInvoice($uuid)
    {
        // Retrieve the invoice details
        $invoice = Invoice::where('uuid', $uuid)->first();

        // Create Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content from Blade view
        $html = view('invoice.pdf', compact('invoice'))->render();

        // Load HTML into Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        $dompdf->set_option('isRemoteEnabled', true);

        // Render PDF (optional: save to file)
        $dompdf->render();

        // Get the PDF content
        $pdfContent = $dompdf->output();

        // Create a response with the PDF content
        $response = response($pdfContent);

        // Set headers to indicate inline display and file name
        $response->header('Content-Type', 'application/pdf');
        $response->header('Content-Disposition', 'inline; filename="'. $invoice->order_number . '.pdf"');

        // Return the response
        return $response;
    }
    
    
    
    
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric',
            'description' => 'required|string',
            'brand' => 'required|string',
            // 'customer_email' => 'required|email',
            // 'customer_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Set your Stripe API key
        // Stripe::setApiKey(config('services.stripe.secret'));

        // Generate the payment link
        // Create the invoice first

        $customer = Customer::find($request->customer_id);

        $invoice = new Invoice();
        $invoice->order_number = 'INV-' . strtoupper(uniqid());

        $invoice->uuid = Str::uuid();
        if($customer->transfer_user_id ==null)
        {

            $invoice->user_id = $customer->user_id;
        }
        else
        {
            $invoice->user_id = $customer->transfer_user_id;
            $invoice->owner_user_id = $customer->user_id;
        }
    
        $invoice->customer_id = $customer->id;
        $invoice->amount = $request->amount;
        $invoice->description = $request->description;
        $invoice->brand = $request->brand;

        $invoice->customer_email = $customer->email;
        $invoice->customer_name = $customer->name;
        $invoice->save();

        foreach ($request->invoice_type as $i) {
            $service = new InvoiceService();
            $service->invoice_id = $invoice->id;
            if ($i == 'Others') {
                $service->name = $request->invoice_type_other;
            } else {
                $service->name = $i;
            }

            $service->save();

        }

// Now that the invoice has been created, obtain its ID
        $invoiceId = $invoice->uuid;

// Create the payment session with the obtained invoice ID
//         $session = Session::create([
//             'payment_method_types' => ['card'],
//             'line_items' => [
//                 [
//                     'price_data' => [
//                         'currency' => 'usd',
//                         'unit_amount' => $request->amount * 100,
//                         'product_data' => [
//                             'name' => 'Invoice',
//                             'description' => 'Brand: ' . $request->brand . ' | Invoice Type: ' . $request->invoice_type,
//                         ],
//                     ],
//                     'quantity' => 1,
//                 ],
//             ],
//             'mode' => 'payment',
//             'success_url' => route('successPage', $invoiceId), // Include invoice ID in success URL
//             'cancel_url' => route('cancelPage'), // Update with the Stripe cancel URL
//         ]);

        $paymentLink = route('invoice.payment', $invoiceId);

// // Update the invoice record with the payment link
        $invoice->payment_link = $paymentLink;
        $invoice->save();

        if ($request->stripe_custumer_id !== null && $request->stripe_custumer_id != '') {


            $customer = StripeDetail::where('customer_id', $request->stripe_custumer_id)->orderBy('created_at', 'desc')->first();

            try {
                $customer_id = $customer->customer_stripe_id;
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
                $payment_methods = PaymentMethod::all([
                    'customer' => $customer_id,
                    'type' => 'card',
                ]);
    
                $payment_method_id = $payment_methods->data[0]->id;
             
    
                $payment_intent = \Stripe\PaymentIntent::create([
                    'amount' => $invoice->amount * 100,
                    'currency' => 'usd',
                    'customer' => $customer_id,
                    'payment_method' => $payment_method_id,
                    'confirm' => true,
                    'return_url' => route('successPage', $invoice->uuid),
                    'description' => 'Payment for your service.',
                ]);
    
                // Handle the payment intent status
                if ($payment_intent->status === 'succeeded') {
                    // Payment succeeded
                    $invoice->status = 'paid';
                    $invoice->save();
                    Mail::to($invoice->customer_email)->send(new SendInvoice($invoice));
                    if (auth()->user()->hasRole('admin')) {
                        return redirect()->route('admin.invoice')->with(['success' => 'Payment successful']);
                    } else {
                        return redirect()->route('user.invoice')->with(['success' => 'Payment successful']);
                    }
                } else {
    
                    if (auth()->user()->hasRole('admin')) {
                        return redirect()->route('admin.invoice.show', $invoice->id)->with(['error' => 'Insufficient balance or payment failed']);
                    } else {
                        return redirect()->route('user.invoice.show', $invoice->id)->with(['error' => 'Insufficient balance or payment failed']);
                    }
                }
            } catch (\Stripe\Exception\CardException $e) {
                $error = $e->getError()->message;
                if (auth()->user()->hasRole('admin')) {
                return redirect()->route('admin.invoice.show', $invoice->id)->with(['error' => $error]);
                }
                else
                {
                    return redirect()->route('user.invoice.show', $invoice->id)->with(['error' => $error]);
                }
            } catch (\Exception $e) {
                if (auth()->user()->hasRole('admin')) {
                return redirect()->route('admin.invoice.show', $invoice->id)->with(['error' => $e->getMessage()]);
                }
                else
                {
                    return redirect()->route('user.invoice.show', $invoice->id)->with(['error' => $e->getMessage()]);
                }
            }





        } else {
            if ($request->send == 'yes') {
                Mail::to($customer->email)->send(new SendInvoice($invoice));
            }

            if (auth()->user()->hasRole('admin')) {

                return redirect()->route('admin.invoice.show', $invoice->id);
            } else {
                return redirect()->route('user.invoice.show', $invoice->id);
            }
        }
    }

    public function show($invoiceId)
    {
        $invoice = Invoice::findOrFail($invoiceId);
        return view('invoice.show', compact('invoice'));
    }

    public function success()
    {
        // Handle successful payment
        // You can implement your own logic here
        return redirect()
            ->route('invoice.index')
            ->with('success', 'Payment successful!');
    }

    public function cancel()
    {
        // Handle cancelled payment
        // You can implement your own logic here
        return redirect()
            ->route('invoice.index')
            ->with('error', 'Payment cancelled.');
    }

    public function payment($uuid)
    {
        $invoice = Invoice::where('uuid', $uuid)->first();
        if ($invoice->status != 'paid') {
            return view('payment', ['invoice' => $invoice]);
        } else {
            return redirect()->route('page.expired');
        }

    }

    public function stripePost(Request $request)
    {
        //dd($request->all());

        $invoice = Invoice::where('uuid', $request->invoice_id)->first();

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Create a customer in Stripe
            $customer = \Stripe\Customer::create([
                'source' => $request->stripeToken,
                'email' => $invoice->customer_email,

            ]);

            $charge = \Stripe\Charge::create([
                'amount' => $invoice->amount * 100,
                'currency' => 'usd',
                'customer' => $customer->id,
                'description' => 'Test payment for terminal.',
            ]);

          

            $my_cus = Customer::where('email', $invoice->customer_email)->first();

            $customer_stripe = new StripeDetail();
            $customer_stripe->customer_stripe_id = $customer->id;
            $customer_stripe->customer_id = $my_cus->id;
            $customer_stripe->save();

            $detail = new BillingDetail();
            $detail->email = $request->email;
            $detail->city = $request->city;
            $detail->zip = $request->zip;
            $detail->country = $request->country;
            $detail->invoice_id = $invoice->id;
            $detail->customer_id = $invoice->customer_id;
            $detail->save();
            $invoice->status = 'paid';
            $invoice->save();
            Mail::to($customer->email)->send(new SendInvoice($invoice));
            Session::flash('success', 'Payment successful!');
            return redirect()->route('successPage', $invoice->uuid);
        } catch (\Stripe\Exception\CardException $e) {
            $error = $e->getError()->message;
            return redirect()->back()->with(['error' => $error]);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function chargeCustomerAgain(Request $request)
    {
        $customer = StripeDetail::where('customer_id', $request->customer_id)->orderBy('created_at', 'desc')->first();

        try {
            $customer_id = $customer->customer_stripe_id;
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $payment_methods = PaymentMethod::all([
                'customer' => $customer_id,
                'type' => 'card',
            ]);

            $payment_method_id = $payment_methods->data[0]->id;
            $invoice = Invoice::find($request->invoice_id);

            $payment_intent = \Stripe\PaymentIntent::create([
                'amount' => $invoice->amount * 100,
                'currency' => 'usd',
                'customer' => $customer_id,
                'payment_method' => $payment_method_id,
                'confirm' => true,
                'return_url' => route('successPage', $invoice->uuid),
                'description' => 'Payment for your service.',
            ]);

            // Handle the payment intent status
            if ($payment_intent->status === 'succeeded') {
                // Payment succeeded
                $invoice->status = 'paid';
                $invoice->save();
                Mail::to($invoice->customer_email)->send(new SendInvoice($invoice));
                if (auth()->user()->hasRole('admin')) {
                    return redirect()->route('admin.invoice')->with(['success' => 'Payment successful']);
                } else {
                    return redirect()->route('user.invoice')->with(['success' => 'Payment successful']);
                }
            } else {

                if (auth()->user()->hasRole('admin')) {
                    return redirect()->back()->with(['error' => 'Insufficient balance or payment failed']);
                } else {
                    return redirect()->back()->with(['error' => 'Insufficient balance or payment failed']);
                }
            }
        } catch (\Stripe\Exception\CardException $e) {
            $error = $e->getError()->message;
            return redirect()->back()->with(['error' => $error]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function getCustomerData(Request $request)
    {
        $customer_id = $request->input('customer_id');
        $cus_id = StripeDetail::where('customer_id', $customer_id)->first();

        if ($cus_id) {
            // $invoice_id = $request->input('invoice_id');
            // $customers=Customer::all();
            return response()->json([
                'id' => $cus_id->customer_id,
                'status' => 200,
            ]);
        } else {
            return response()->json([
                'status' => 404]);
        }
    }

}
