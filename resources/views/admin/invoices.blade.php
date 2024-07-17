@extends('admin.layout.admin')

@section('admin')
    <div class="px-3">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Invoices</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb m-0 float-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashoard</a></li>
                                <li class="breadcrumb-item active">Invoices</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <style>
                .paid{
                    background-color: #1B9C82 !important;
                }
                .unpaid{
                    background-color: #FA5944 !important
                }
            </style> --}}
            <!-- end page title -->
            <style>
                .select2-container--default .select2-selection--single {
                    background-color: var(--bs-body-bg);

                    color: var(--bs-table-color-state, var(--bs-table-color-type, var(--bs-table-color)));
                    border: 1px solid var(--bs-border-color);
                    height: 37px;

                }

                span#select2-single-container {
                    margin-top: 4px;
                    color: var(--bs-table-color-state, var(--bs-table-color-type, var(--bs-table-color)));
                }
            </style>

            <div class="row">
                <div class="col-12">
                    <div class="col-lg-6">
                        <form action="{{ route('admin.invoice') }}" method="GET">
                            <div class="d-flex mb-3">
                                <label class="input-group-text" for="single">Filter by Month</label>
                                <select class="form-control" id="single" name="month">
                                    <option value="all">All</option>
                                    @foreach ($months as $month)
                                        <option @if (request('month') == $month) selected @endif
                                            value="{{ $month }}">{{ $month }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-primary" type="submit">Apply</button>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Invoices</h4>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sells Person</th>
                                        <th>Amount</th>
                                        <th>Brand</th>
                                        {{-- <th>Customer Email</th> --}}
                                        <th>Status</th>
                                        <th>Created At</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach ($invoices as $invoice)
                                        @php $i++; @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $invoice->user != null ? $invoice->user->name : 'user not found' }}</td>
                                            <td>${{ $invoice->amount }}</td>
                                            <td>{{ $invoice->brand }}</td>
                                            {{-- <td>{{ $invoice->customer_email }}</td> --}}
                                            <td><span
                                                    class="badge badge-pill {{ $invoice->status == 'paid' ? 'badge-soft-primary' : 'badge-soft-warning' }} ">{{ ucFirst($invoice->status) }}</span>
                                            </td>

                                            <td>{{ $invoice->created_at->format('d F Y') }}</td>
                                            @if ($invoice->status == 'unpaid')
                                                <td class="d-flex">
                                                    <!-- The text field -->
                                                    <input type="text" value="{{ $invoice->payment_link }}"
                                                        class="myInput d-none" id="myInput{{ $invoice->id }}">
                                                    <button type="button"
                                                        onclick="myFunction('myInput{{ $invoice->id }}')"
                                                        class="btn btn-success waves-effect waves-light ms-3 btn-copy">
                                                        <i class="mdi mdi-content-copy me-1"></i> Copy
                                                    </button>

                                                    <a target="blank" href="{{ route('downloadInvoice', $invoice->uuid) }}"
                                                        class="btn btn-primary waves-effect waves-light ms-3"><i
                                                            class="mdi mdi-download me-1"></i>
                                                        Download
                                                        Pdf</a>
                                                </td>
                                            @else
                                                <td class="d-flex">


                                                    <a target="blank" href="{{ route('downloadInvoice', $invoice->uuid) }}"
                                                        class="btn btn-primary waves-effect waves-light ms-3"><i
                                                            class="mdi mdi-download me-1"></i>
                                                        Download
                                                        Pdf</a>
                                                </td>
                                            @endif

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function myFunction(inputId) {
            var copyText = $('#' + inputId);

            if (!copyText.length) {
                console.error('Element with ID', inputId, 'not found.');
                return;
            }

            // Initialize Clipboard.js
            var clipboard = new ClipboardJS('.btn-copy', {
                text: function() {
                    return copyText.val();
                }
            });

            clipboard.on('success', function(e) {
                Swal.fire({
                    title: "Link Copied!",
                    icon: "success"
                });
            });

            clipboard.on('error', function(e) {
                console.error('Failed to copy:', e);
                Swal.fire({
                    title: "Copy Failed!",
                    text: "Please try again.",
                    icon: "error"
                });
            });
        }
    </script>
@endsection
