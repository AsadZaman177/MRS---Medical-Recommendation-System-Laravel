@extends('admin.layouts.master')

@section('title', 'New Coupon Code')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create New Coupon Code</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('coupon/') }}">Medicine Types</a></li>
                        <li class="breadcrumb-item active">New Coupon Code</li>
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
                    <form action="{{ url('coupon/store') }}" method="POST">
                        @csrf
                        <div class="card card-primary card-outline">
                            <div class="card-header align-content-center d-flex">
                                <h3 class="card-title mr-auto p-2"><i class="fas fa-edit"></i> Create New</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" class="form-control {{ $errors -> has('code') ? 'is-invalid' : '' }}" name="code" id="code" placeholder="E.g NewOrder200">
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">Price in Rs</label>
                                    <input type="number" min="0" class="form-control {{ $errors -> has('price') ? 'is-invalid' : '' }}" name="price" id="price" placeholder="200">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="expiry_date">Expiry Date</label>
                                    <input type="date" class="form-control {{ $errors -> has('expiry_date') ? 'is-invalid' : '' }}" name="expiry_date" id="expiry_date">
                                    @error('expiry_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('javscript')
    
@endsection
