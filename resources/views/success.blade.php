<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">

<head>
    <meta charset="utf-8" />
    <title>Invoice | Dashtrap - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Myra Studio" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="/dashtrap/images/favicon.ico">

    <!-- App css -->
    <link href="/dashtrap/css/style.min.css" rel="stylesheet" type="text/css">
    <link href="/dashtrap/css/icons.min.css" rel="stylesheet" type="text/css">
    <script src="/dashtrap/js/config.js"></script>
</head>

<body>

    <!-- Begin page -->
    <div class="layout-wrapper">
        <!-- Start Page Content here -->
        <div class="page-content">

            <div class="px-3">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="py-3 py-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4 class="page-title mb-0">Invoice</h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-none d-lg-block">
                                    <ol class="breadcrumb m-0 float-end">
                                        <li class="nav-link mx-4" id="theme-mode">
                                            <i class="bx bx-moon font-size-24"></i>
                                        </li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Invoice</a></li>
                                        <li class="breadcrumb-item active">Payment</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header bg-success text-white">Payment Successful</div>
                                <div class="card-body">
                                    <h5 class="card-title">Thank you for your payment!</h5>
                                    <p class="card-text">Your payment has been successfully processed.</p>

                                    <!-- Display invoice details -->
                                    <p><strong>Invoice ID:</strong> {{ $invoice->order_number }}</p>
                                    <p><strong>Amount:</strong> {{ $invoice->amount }}</p>
                                    <p><strong>Description:</strong> {{ $invoice->description }}</p>
                                    <p><strong>Brand:</strong> {{ $invoice->brand }}</p>
                                    <p><strong>Service Type:</strong>
                                        @foreach ($invoice->service as $service)
                                            {{ $service->name . ' ' }}
                                        @endforeach
                                    </p>
                                    <p><strong>Customer Name:</strong> {{ $invoice->customer_name }}</p>

                                    <p><strong>Customer Email:</strong> {{ $invoice->customer_email }}</p>

                                    {{-- Add more fields as needed --}}
                                    <!-- Include a link to download the PDF -->
                                    <a target="blank" href="{{ route('downloadInvoice', $invoice->uuid) }}"
                                        class="btn btn-primary">Download Invoice PDF</a>

                                    {{-- <a href="{{ route('login') }}" class="btn btn-primary">Back to Home</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>


                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Dashtrap
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end">
                                <p class="mb-0">Design & Develop by <a href="https://myrathemes.com/"
                                        target="_blank">MyraStudio</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
        <!-- End Page content -->


    </div>
    <!-- END wrapper -->
    <style>
        .hide {
            display: none
        }
    </style>
    <!-- App js -->
    <script src="/dashtrap/js/vendor.min.js"></script>
    <script src="/dashtrap/js/app.js"></script>


</body>

</html>
