@extends('admin.layouts.master')

@section('title', 'Edit Medicine Formulae')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Medicine formulae</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('medicines/formulae') }}">Medicine Formulae</a></li>
                        <li class="breadcrumb-item active">Edit Medicine Formulae</li>
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
                    <form action="{{ url('medicines/formulae/update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $formulae->id }}">
                        <div class="card card-primary card-outline">
                            <div class="card-header align-content-center d-flex">
                                <h3 class="card-title mr-auto p-2"><i class="fas fa-edit"></i> Edit</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="type">Formulae</label>
                                    <input type="text" class="form-control {{ $errors -> has('formulae') ? 'is-invalid' : '' }}" name="formulae" id="formulae" value="{{ $formulae->formulae }}" placeholder="E.g Paracetomal">
                                    @error('formulae')
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
