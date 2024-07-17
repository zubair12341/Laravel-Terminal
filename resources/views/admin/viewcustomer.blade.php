@extends('admin.layout.admin')

@section('admin')
<div class="px-3">
    <style>
     

        .select2-container--default .select2-selection--single {
            background-color: var(--bs-body-bg);
            
            color: var(--bs-table-color-state,var(--bs-table-color-type,var(--bs-table-color)));
            border: 1px solid var(--bs-border-color);
            height: 37px;

        }

        span#select2-single-container {
            margin-top: 4px;
            color: var(--bs-table-color-state,var(--bs-table-color-type,var(--bs-table-color)));
        }
    </style>
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="page-title mb-0">View Customer</h4>
                </div>
                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">View Customer</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">View Customer</h4>


                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                    <form class="form-horizontal" method="post" role="form"
                                        action="{{ route('user.customer.update') }}">
                                        @csrf
                                       
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Name</label>
                                            <div class="col-md-10">
                                                <input readonly type="text" id="simpleinput" name="name"
                                                    class="form-control" placeholder="Enter Name" value="{{$customer->name}}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="example-email">Email</label>
                                            <div class="col-md-10">
                                                <input readonly type="email" id="example-email" name="email"
                                                    class="form-control" placeholder="Enter Email" value="{{$customer->email}}">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="example-password">Phone
                                                Number</label>
                                            <div class="col-md-10">
                                                <input readonly type="number" class="form-control" name="phone"
                                                    id="example-password" value="{{$customer->phone}}" placeholder="Enter Phone Number">
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="example-password">Project
                                                Title</label>
                                            <div class="col-md-10">
                                                <input readonly type="text" class="form-control" name="title"
                                                    id="example-password" value="{{$customer->title}}" placeholder="Enter Project Title">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                      
                                </div>

                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->
                </div>
            </div> <!-- end card -->
        </div><!-- end col -->

        <div class="row">
            <div class="col-12">
                <div class="col-lg-6">
                    <form action="{{ route('admin.customer.view',$customer->id) }}" method="GET">
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
                                    <th>Amount</th>
                                    <th>Brand</th>
                                    {{-- <th>Service Type</th> --}}
                                    <th>Status</th>
                                    

                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                @php $i=0; @endphp



                                @foreach ($invoices as $invoice)
                                    @php $i++; @endphp
                                    <tr>
                                        <td>{{ $i }}</td>

                                        <td>${{ $invoice->amount }}</td>
                                        <td>{{ $invoice->brand }}</td>
                                        {{-- <td>@foreach ($invoice->service as $s) <p>{{$s->name}}</p>  @endforeach</td> --}}
                                        <td>{{ ucFirst($invoice->status) }}</td>
                                    
                                        @if ($invoice->status == 'unpaid')
                                            <td class="d-flex">
                                                <!-- The text field -->
                                                <input type="text" value="{{ $invoice->payment_link }}" class="myInput d-none" id="myInput{{ $invoice->id }}">
                                                <button type="button" onclick="myFunction('myInput{{ $invoice->id }}')" class="btn btn-success waves-effect waves-light ms-3 btn-copy">
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
    <!-- end row -->

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
