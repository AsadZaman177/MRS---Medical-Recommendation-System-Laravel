@extends('admin.layouts.master')

@section('title', 'Genral Settings')

@section('css')
    
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Genral Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Genral Setings</li>
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
                    <form action="{{ url('cms/store-genral') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $cms->id }}">

                        <div class="card card-primary card-outline">
                            <div class="card-header align-content-center d-flex">
                                <h3 class="card-title mr-auto p-2"><i class="fas fa-edit"></i> Genral Settings </h3>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Business Name</label>
                                            <input type="text" class="form-control {{ $errors -> has('name') ? 'is-invalid' : '' }}" name="name" value="{{ $cms->name }}" id="name" placeholder="Business Name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <input type="file" name="logo" class="form-control {{ $errors -> has('logo') ? 'is-invalid' : '' }}">
                                            @error('logo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control {{ $errors -> has('email') ? 'is-invalid' : '' }}" name="email" value="{{ $cms->email }}" id="email" placeholder="Business Email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control {{ $errors -> has('address') ? 'is-invalid' : '' }}" name="address" value="{{ $cms->address }}" id="address" placeholder="Business Address">
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="facebook">Facebook Link</label>
                                            <input type="text" class="form-control {{ $errors -> has('facebook') ? 'is-invalid' : '' }}" name="facebook" value="{{ $cms->facebook }}" id="facebook" placeholder="Facebook Link">
                                            @error('facebook')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="instagram">Instagram Link</label>
                                            <input type="text" class="form-control {{ $errors -> has('instagram') ? 'is-invalid' : '' }}" name="instagram" value="{{ $cms->instagram }}" id="instagram" placeholder="Instagram Link">
                                            @error('instagram')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="twitter">Twitter Link</label>
                                            <input type="text" class="form-control {{ $errors -> has('twitter') ? 'is-invalid' : '' }}" name="twitter" value="{{ $cms->twitter }}" id="twitter" placeholder="Twitter Link">
                                            @error('twitter')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="youtube">Youtube Link</label>
                                            <input type="text" class="form-control {{ $errors -> has('youtube') ? 'is-invalid' : '' }}" name="youtube" value="{{ $cms->youtube }}" id="youtube" placeholder="Youtube Link">
                                            @error('youtube')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="footer_certificate">Footer Certificate</label>
                                            <input type="file" name="footer_certificate" class="form-control {{ $errors -> has('footer_certificate') ? 'is-invalid' : '' }}">
                                            @error('footer_certificate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="footer_payment">Footer Payment Image</label>
                                            <input type="file" name="footer_payment" class="form-control {{ $errors -> has('footer_payment') ? 'is-invalid' : '' }}">
                                            @error('footer_payment')
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
                                            <label for="footer_about">Footer Short Description</label>
                                            <textarea id="footer_about" name="footer_about" class="form-control">
                                                {{ $cms->footer_about }}
                                            </textarea>
                                        </div>
                                        @error('footer_about')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="copyright">Footer Copy Right</label>
                                            <input type="text" name="copyright" class="form-control {{ $errors -> has('copyright') ? 'is-invalid' : '' }}" value="{{ $cms->copyright }}">
                                            @error('copyright')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cta_text">CTA Text</label>
                                            <input type="text" name="cta_text" class="form-control {{ $errors -> has('cta_text') ? 'is-invalid' : '' }}" value="{{ $cms->cta_text }}">
                                            @error('cta_text')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="cta_btn_text">CTA Button Text</label>
                                            <input type="text" name="cta_btn_text" class="form-control {{ $errors -> has('cta_btn_text') ? 'is-invalid' : '' }}" value="{{ $cms->cta_btn_text }}">
                                            @error('cta_btn_text')
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
    
@endsection
