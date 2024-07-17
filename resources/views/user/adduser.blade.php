@extends('user.layout.user')

@section('user')
<div class="px-3">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="page-title mb-0">Add User</h4>
                </div>
                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="{{route('user.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add User</li>
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
                        <h4 class="header-title">Add User</h4>


                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                    <form class="form-horizontal" method="post" role="form" action="{{route('user.user.store')}}">
                                        @csrf
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Name</label>
                                            <div class="col-md-10">
                                                <input type="text" id="simpleinput" name="name"
                                                    class="form-control" placeholder="Enter Name" value="">
                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="example-email">Email</label>
                                            <div class="col-md-10">
                                                <input type="email" id="example-email" name="email"
                                                    class="form-control" placeholder="Enter Email">
                                                    @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label"
                                                for="example-password">Password</label>
                                            <div class="col-md-10">
                                                <input type="password" class="form-control" name="password"
                                                    id="example-password" placeholder="Enter Password">
                                                    @error('password')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="example-password">Confirm
                                                Password</label>
                                            <div class="col-md-10">
                                                <input type="password" class="form-control" name="confirm_password"
                                                    id="example-password" placeholder="Enter Confirm Password">
                                                    @error('confirm_password')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                            </div>
                                        </div>
                                        <div class="mb-2 row">

                                            <label for="">Permissions:</label>

                                            <div class="form-check form-switch mx-3 mt-2">
                                                <input class="form-check-input" name="access" type="checkbox"
                                                    id="flexSwitchCheckCheckedDisabled2">
                                                <label class="form-check-label" for="flexSwitchCheckCheckedDisabled2">
                                                    Give access to create payment link.</label>
                                            </div>

                                            <div class="form-check form-switch mx-3 mt-2">
                                                <input class="form-check-input" name="access2" type="checkbox"
                                                    id="flexSwitchCheckCheckedDisabled">
                                                <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">
                                                    Give access to create users and payment link.</label>
                                            </div>

                                            <div class="form-check form-switch mx-3 mt-2">
                                                <input class="form-check-input" name="access3" type="checkbox"
                                                    id="flexSwitchCheckCheckedDisabled3">
                                                <label class="form-check-label" for="flexSwitchCheckCheckedDisabled3">
                                                    Give access to create
                                                    payment, users and re-payment charge.</label>
                                            </div>



                                        </div>

                                        <div class="row">
                                            <div class="col-2">
                                            <button  type="submit"
                                            class="btn btn-primary waves-effect waves-light mb-3 mt-4"><i
                                                class="mdi mdi-account-plus me-1"></i> Add User</a>
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
        </div>
        <!-- end row -->






        {{-- <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
                            <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked switch checkbox input</label>
                        </div> --}}
    </div>

    <!-- end row -->


</div> 
@endsection
