@extends('admin.layouts.master')

@section('title', 'New Age')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create New Age</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('medicines/age') }}">Ages</a></li>
                        <li class="breadcrumb-item active">Create Age</li>
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
                    <form action="{{ url('medicines/age/store') }}" method="POST">
                        @csrf
                        <div class="card card-primary card-outline">
                            <div class="card-header align-content-center d-flex">
                                <h3 class="card-title mr-auto p-2"><i class="fas fa-edit"></i> Create New</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input type="text" class="form-control {{ $errors -> has('age') ? 'is-invalid' : '' }}" name="age" id="age" placeholder="E.g Adult">
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dosages">Dosage</label>
                                    <select class="select2 {{ $errors -> has('dosages') ? 'is-invalid' : '' }}" multiple="multiple" data-placeholder="Select Dosage" name="dosages[]" style="width: 100%;">
                                        @foreach ($dosages as $dosage)
                                            <option value="{{ $dosage->id }}">{{ $dosage->dosage }}</option>
                                        @endforeach  
                                    </select>
                                    @error('dosages')
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
