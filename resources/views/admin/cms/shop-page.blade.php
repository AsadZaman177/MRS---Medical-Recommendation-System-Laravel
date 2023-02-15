@extends('admin.layouts.master')

@section('title', 'Shop Page')

@section('css')
    <style type="text/css">
        .ck-editor__editable_inline{
            height: 500px;
        }
    </style>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Shop Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Shop Page</li>
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
                    <form action="{{ url('cms/store-shoppage') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $cms->id }}">

                        <div class="card card-primary card-outline">
                            <div class="card-header align-content-center d-flex">
                                <h3 class="card-title mr-auto p-2"><i class="fas fa-edit"></i> Update Shop Page Data</h3>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="page_title">Page Title</label>
                                            <input type="text" class="form-control {{ $errors -> has('page_title') ? 'is-invalid' : '' }}" name="page_title" value="{{ $cms->page_title }}" id="page_title" placeholder="Main Title">
                                            @error('page_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="page_bg_img">Search Widget Image</label>
                                            <input type="file" name="page_bg_img" class="form-control {{ $errors -> has('page_bg_img') ? 'is-invalid' : '' }}">
                                            @error('page_bg_img')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="page_desc">Content</label>
                                            <textarea name="page_desc" id="page_desc" class="form-control {{ $errors -> has('page_desc') ? 'is-invalid' : '' }}" required="true">{{ $cms->page_desc }}</textarea>
                                            @error('page_desc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
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
    <script>
         ClassicEditor
        .create( document.querySelector( '#page_desc' ) )
        .catch( error => {
            console.error( error );
        } );
        
    </script>
@endsection
