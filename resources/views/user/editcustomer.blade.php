@extends('user.layout.user')

@section('user')
<div class="px-3">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="page-title mb-0">Update Customer</h4>
                </div>
                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Update Customer</li>
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
                        <h4 class="header-title">Update Customer</h4>


                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                    <form class="form-horizontal" method="post" role="form"
                                        action="{{ route('user.customer.update') }}">
                                        @csrf
                                        <input type="hidden" value="{{$customer->id}}" name="customer_id">
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Name</label>
                                            <div class="col-md-10">
                                                <input type="text" id="simpleinput" name="name"
                                                    class="form-control" placeholder="Enter Name" value="{{$customer->name}}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="example-email">Email</label>
                                            <div class="col-md-10">
                                                <input type="email" id="example-email" name="email"
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
                                                <input type="number" class="form-control" name="phone"
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
                                                <input type="text" class="form-control" name="title"
                                                    id="example-password" value="{{$customer->title}}" placeholder="Enter Project Title">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        @if($customer->transfer_user_id==null)
                                        <div class="mb-2 row">

                                            <label for="my_user" class="col-md-2 col-form-label">Transfer Customer to User</label>
                                            <div class="col-md-10">
                                                <select name="user_id" id="my_user" class="form-control">
                                                    <option value="" selected disabled>Transfer customer to user</option>
                                                    @foreach ($users as $user)
                                                        <option  value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('user_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        @endif


                                      
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <button type="submit"
                                            class="btn btn-primary waves-effect waves-light mb-3 mt-4"><i
                                                class="mdi mdi-account-plus me-1"></i> Update Customer</a>
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

</div>
@endsection
