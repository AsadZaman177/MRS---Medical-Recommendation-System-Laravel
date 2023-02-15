@extends('admin.layouts.master')

@section('title', 'Medicine Brands')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Medicine Brands</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Medicine Brands</li>
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
                            <h3 class="card-title mr-auto p-2"><i class="fas fa-edit"></i> All Medicines Brands</h3>
                            <a href="{{ url('medicines/brand/create') }}" type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
                        </div>
                        <div class="card-body">
                            <table id="medicines_brand" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Medicine Brand</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $brand)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $brand->brand }}</td>
                                            <td>{{ $brand->created_at }}</td>
                                            <td>{{ $brand->updated_at }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-info btn-sm">Action</button>
                                                    <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item" href="{{ url('medicines/brand/edit/'. $brand->id )}}">Edit</a>
                                                    <a class="dropdown-item" href="{{ url('medicines/brand/delete/'. $brand->id )}}">Delete</a>
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
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('javscript')
    <script>
        $(document).ready(function(){
            $('#medicines_brand').DataTable();
        });
    </script>
@endsection
