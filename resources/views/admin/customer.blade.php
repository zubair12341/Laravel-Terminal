@extends('admin.layout.admin')

@section('admin')
    <div class="px-3">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Customers</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb m-0 float-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashoard</a></li>
                                <li class="breadcrumb-item active">Customers</li>
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
                            <div class="row">
                                <div class=" col-10">
                                    <h4 class="header-title">Customers</h4>
                                </div>
                                <div class="col-2">


                                    <a href="{{ route('admin.add-customer') }}" style="float: right"
                                        class="btn btn-success waves-effect waves-light mb-3"><i
                                            class="mdi mdi-account-plus me-1"></i> Add Customer</a>
                                </div>
                            </div>
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sells Person</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        {{-- <th>Phone</th>
                                        <th>Project Title</th> --}}
                                        <th>Transfer To User</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php $i=0; @endphp

                                    @foreach ($users as $user)
                                        @php $i++; @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $user->user->name }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            {{-- <td>{{ $user->phone }}</td>
                                            <td>{{ $user->title }}</td> --}}
                                            <td>{{ $user->transfer_user_id != null ? $user->transfer->name : '' }}</td>
                                            <td>
                                                <div style="display: ruby">
                                                    <a href="{{ route('admin.edit-customer', $user->id) }}"
                                                        class="btn btn-success waves-effect waves-light"><i
                                                            class="mdi mdi-account-edit-outline me-1"></i> Edit</a>

                                                    <form action="{{ route('admin.customer.delete') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="user_id" value="{{ $user->id }}">


                                                        <button type="button"
                                                            class="btn btn-danger delete  waves-effect waves-light ms-3"><i
                                                                class="mdi mdi-close-circle-outline me-1"></i>
                                                            Delete</button>



                                                    </form>
                                                    @if ($user->transfer_user_id != null)
                                                        <a href="{{ route('user.customer.transfer', $user->id) }}"
                                                            class="btn btn-warning waves-effect waves-light ms-3"><i
                                                                class="mdi mdi-close-circle-outline me-1"></i> Transfer
                                                            Canceled</a>
                                                    @endif
                                                    <a href="{{ route('admin.customer.view', $user->id) }}"
                                                        class="btn btn-info waves-effect waves-light ms-3"><i
                                                            class="mdi mdi-eye me-1"></i> View</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->











        </div> <!-- container -->

    </div>
@endsection
