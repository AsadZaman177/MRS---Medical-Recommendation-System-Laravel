@extends('admin.layouts.master')

@section('title', 'All Users')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">All Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header align-content-center d-flex">
                            <h3 class="card-title mr-auto p-2"><i class="fas fa-edit"></i> All Users</h3>
                            <a href="{{ url('users/create') }}" type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="users" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Zip Code</th>
                                            <th>Role</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->userDetail->phone ?? '' }}</td>
                                                <td>{{ $user->userDetail->address ?? '' }}</td>
                                                <td>{{ $user->userDetail->country ?? '' }}</td>
                                                <td>{{ $user->userDetail->state ?? '' }}</td>
                                                <td>{{ $user->userDetail->city ?? '' }}</td>
                                                <td>{{ $user->userDetail->zip_code ?? '' }}</td>
                                                <td>
                                                    @if ($user->is_admin)
                                                        <span class="badge badge-success badge-pill">Admin</span>
                                                    @else
                                                        <span class="badge badge-success badge-pill">Customer</span>
                                                    @endif
                                                </td>
                                                <td>{{ $user->updated_at }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info btn-sm">Action</button>
                                                        <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item" href="{{ url('users/edit/'. $user->id )}}">Edit</a>
                                                        @if (Auth::user()->id != $user->id)
                                                            <a class="dropdown-item" href="{{ url('users/delete/'. $user->id )}}">Delete</a>
                                                        @endif
                                                        </div>
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
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('javscript')
    <script>
        $(document).ready(function(){
            $('#users').DataTable({
                "autoWidth": true,
                "responsive": true,
                "scrollX": true,
                "columnDefs": [
                    { className: "dt-nowrap", "targets": [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13 ] }
                ],
            });
        });
    </script>
@endsection
