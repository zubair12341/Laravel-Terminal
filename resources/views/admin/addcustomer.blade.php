@extends('admin.layout.admin')

@section('admin')
    <div class="px-3">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Add Customer</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb m-0 float-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add Customer</li>
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
                            <h4 class="header-title">Add Customer</h4>


                            <div class="row">
                                <div class="col-12">
                                    <div class="p-2">
                                        <form class="form-horizontal" method="post" role="form"
                                            action="{{ route('admin.customer.store') }}">
                                            @csrf
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Name</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="simpleinput" name="name"
                                                        class="form-control" placeholder="Enter Name" value="">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="example-email">Email</label>
                                                <div class="col-md-10">
                                                    <input type="email" id="example-email" name="email"
                                                        class="form-control" placeholder="Enter Email">
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
                                                        id="example-password" placeholder="Enter Phone Number">
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
                                                        id="example-password" placeholder="Enter Project Title">
                                                    @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="mb-2 row">

                                                <label for="my_user" class="col-md-2 col-form-label">Select User</label>
                                                <div class="col-md-10">
                                                    <select name="user_id" id="my_user" class="form-control">
                                                        <option value="" selected disabled>Select User</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('user_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light mb-3 mt-4"><i
                                                    class="mdi mdi-account-plus me-1"></i> Add Customer</a>
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

  


    {{-- <form action="{{route('admin.customer.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="" class="form-label">Name <sup>*</sup> </label>
                            <input type="text" required class="form-control" placeholder="Enter Name" name="name">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="" class="form-label">Email <sup>*</sup></label>
                            <input type="email" required class="form-control" placeholder="Enter Email" name="email">
                        </div>
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="" class="form-label">Phone Number</label>
                            <input type="number"  class="form-control" placeholder="Enter Phone Number" name="phone">
                        </div>
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="" class="form-label">Title</label>
                            <input type="text"  class="form-control" placeholder="Enter Title" name="title">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="" class="form-label">Select User</label>
                            <select name="user_id" id="" required class="form-control">
                                <option value="" selected disabled>Select User</option>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-outline-dark" type="submit">Create</button>
                    </div>
                </div>
            </form> --}}
@endsection
