@extends('admin.layout.admin')

@section('admin')
<div class="px-3">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="page-title mb-0">Profile</h4>
                </div>
                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
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
                        <h4 class="header-title">Update Profile</h4>


                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                    <form class="form-horizontal" method="post" role="form"
                                        action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Name</label>
                                            <div class="col-md-10">
                                                <input type="text" id="simpleinput" name="name"
                                                    class="form-control" placeholder="Enter Name" value="{{$user->name}}">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="example-email">Email</label>
                                            <div class="col-md-10">
                                                <input type="email" id="example-email" name="email"
                                                    class="form-control" value="{{$user->email}}" placeholder="Enter Email">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="example-password">
                                               New Password (leave it blank if you dont want to change it)</label>
                                            <div class="col-md-10">
                                                <input type="password" class="form-control" name="password"
                                                    id="example-password" placeholder="Enter Password">
                                                @error('password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="example-password">
                                                Profile Image (leave it blank if you dont want to change it)</label>
                                            <div class="col-md-10">
                                                <input type="file" class="form-control" name="image"
                                                    id="example-password" placeholder="Enter Profile Title">
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>


                                  
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <button type="submit"
                                            class="btn btn-primary waves-effect waves-light mb-3 mt-4"><i
                                                class="mdi mdi-account-plus me-1"></i> Update</a>
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
