@extends('user.layout.user')

@section('user')
<div class="px-3">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="page-title mb-0">Users</h4>
                </div>
                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Dashoard</a></li>
                            <li class="breadcrumb-item active">Users</li>
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
                                <h4 class="header-title">Users</h4>
                            </div>
                            <div class="col-2">
                               

                                <a href="{{ route('user.add-users') }}" style="float: right"
                                    class="btn btn-success waves-effect waves-light mb-3"><i
                                        class="mdi mdi-account-plus me-1"></i> Add User</a>
                            </div>
                        </div>
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Access</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>


                                @php $i=0; @endphp

                                @foreach ($users as $user)
                                    @php $i++; @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->hasRole('user'))
                                            User and Payment create
                                       @elseif($user->hasRole('all_access'))
                                           User, Payment and Re-payment
                                           @elseif($user->hasRole('payment'))
                                            Only Payment create 
                                       @else
                                           Only see her invoices
                                       @endif
                                        </td>
                                        <td>
                                            <div style="display: ruby" >
                                                <a href="{{ route('user.edit-user', $user->id) }}"
                                                    class="btn btn-success waves-effect waves-light"><i
                                                        class="mdi mdi-account-edit-outline me-1"></i> Edit</a>

                                                <form action="{{ route('user.user.delete') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ $user->id }}">


                                                    <button type="button"
                                                        class="btn btn-danger delete  waves-effect waves-light ms-3"><i
                                                            class="mdi mdi-close-circle-outline me-1"></i>
                                                        Delete</button>

                                                </form>
                                            </div>
                                        </td>
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
@endsection
