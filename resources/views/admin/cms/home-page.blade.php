@extends('admin.layouts.master')

@section('title', 'Home Page')

@section('css')
    
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Home Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Home Page</li>
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
                    <form action="{{ url('cms/store-homepage') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $cms->id }}">

                        <div class="card card-primary card-outline">
                            <div class="card-header align-content-center d-flex">
                                <h3 class="card-title mr-auto p-2"><i class="fas fa-edit"></i> Update Home Page Data</h3>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="page_title">Main Title</label>
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
                                            <label for="page_desc">Description</label>
                                            <textarea name="page_desc" class="form-control {{ $errors -> has('page_desc') ? 'is-invalid' : '' }}">{{ $cms->page_desc }}</textarea>
                                            @error('page_desc')
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
                                            <label for="search_widget_img">Search Widget Image</label>
                                            <input type="file" name="search_widget_img" class="form-control {{ $errors -> has('search_widget_img') ? 'is-invalid' : '' }}">
                                            @error('search_widget_img')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="search_widget_title">Search Widget Title</label>
                                            <input type="text" class="form-control {{ $errors -> has('search_widget_title') ? 'is-invalid' : '' }}" name="search_widget_title" value="{{ $cms->search_widget_title }}">
                                            @error('search_widget_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="search_widget_desc">Search Widget Desc</label>
                                            <textarea class="form-control {{ $errors -> has('search_widget_desc') ? 'is-invalid' : '' }}" name="search_widget_desc">{{ $cms->search_widget_desc }}</textarea>
                                            @error('search_widget_desc')
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
                                            <label for="buy_widget_img">Buy Widget Image</label>
                                            <input type="file" name="buy_widget_img" class="form-control {{ $errors -> has('buy_widget_img') ? 'is-invalid' : '' }}">
                                            @error('buy_widget_img')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="buy_widget_title">Buy Widget Title</label>
                                            <input type="text" class="form-control {{ $errors -> has('buy_widget_title') ? 'is-invalid' : '' }}" name="buy_widget_title" value="{{ $cms->buy_widget_title }}">
                                            @error('buy_widget_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="buy_widget_desc">Buy Widget Desc</label>
                                            <textarea class="form-control {{ $errors -> has('buy_widget_desc') ? 'is-invalid' : '' }}" name="buy_widget_desc">{{ $cms->buy_widget_desc }}</textarea>
                                            @error('buy_widget_desc')
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
                                            <label for="diagnose_img">Diagnose Widget Image</label>
                                            <input type="file" name="diagnose_img" class="form-control {{ $errors -> has('diagnose_img') ? 'is-invalid' : '' }}">
                                            @error('diagnose_img')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="diagnose_title">Diagnose Widget Title</label>
                                            <input type="text" class="form-control {{ $errors -> has('diagnose_title') ? 'is-invalid' : '' }}" name="diagnose_title" value="{{ $cms->diagnose_title }}">
                                            @error('diagnose_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="diagnose_desc">Diagnose Widget Desc</label>
                                            <textarea class="form-control {{ $errors -> has('diagnose_desc') ? 'is-invalid' : '' }}" name="diagnose_desc">{{ $cms->diagnose_desc }}</textarea>
                                            @error('diagnose_desc')
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
                                            <label for="free_ship_icon">Free Shipping Image</label>
                                            <input type="file" name="free_ship_icon" class="form-control {{ $errors -> has('free_ship_icon') ? 'is-invalid' : '' }}">
                                            @error('free_ship_icon')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="free_ship_title">Free Shipping Title</label>
                                            <input type="text" class="form-control {{ $errors -> has('free_ship_title') ? 'is-invalid' : '' }}" name="free_ship_title" value="{{ $cms->free_ship_title }}">
                                            @error('free_ship_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="free_ship_desc">Free Shipping Desc</label>
                                            <textarea class="form-control {{ $errors -> has('free_ship_desc') ? 'is-invalid' : '' }}" name="free_ship_desc">{{ $cms->free_ship_desc }}</textarea>
                                            @error('free_ship_desc')
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
                                            <label for="return_icon">Return Image</label>
                                            <input type="file" name="return_icon" class="form-control {{ $errors -> has('return_icon') ? 'is-invalid' : '' }}">
                                            @error('return_icon')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="return_title">Return Title</label>
                                            <input type="text" class="form-control {{ $errors -> has('return_title') ? 'is-invalid' : '' }}" name="return_title" value="{{ $cms->return_title }}">
                                            @error('return_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="return_desc">Return Desc</label>
                                            <textarea class="form-control {{ $errors -> has('return_desc') ? 'is-invalid' : '' }}" name="return_desc">{{ $cms->return_desc }}</textarea>
                                            @error('return_desc')
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
                                            <label for="secure_icon">Secure Image</label>
                                            <input type="file" name="secure_icon" class="form-control {{ $errors -> has('secure_icon') ? 'is-invalid' : '' }}">
                                            @error('secure_icon')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="secure_title">Secure Title</label>
                                            <input type="text" class="form-control {{ $errors -> has('secure_title') ? 'is-invalid' : '' }}" name="secure_title" value="{{ $cms->secure_title }}">
                                            @error('secure_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="secure_desc">Secure Desc</label>
                                            <textarea class="form-control {{ $errors -> has('secure_desc') ? 'is-invalid' : '' }}" name="secure_desc">{{ $cms->secure_desc }}</textarea>
                                            @error('secure_desc')
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
                                            <label for="gifts_icon">Gift Image</label>
                                            <input type="file" name="gifts_icon" class="form-control {{ $errors -> has('gifts_icon') ? 'is-invalid' : '' }}">
                                            @error('gifts_icon')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gifts_title">Gift Title</label>
                                            <input type="text" class="form-control {{ $errors -> has('gifts_title') ? 'is-invalid' : '' }}" name="gifts_title" value="{{ $cms->gifts_title }}">
                                            @error('gifts_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gifts_desc">Gift Desc</label>
                                            <textarea class="form-control {{ $errors -> has('gifts_desc') ? 'is-invalid' : '' }}" name="gifts_desc">{{ $cms->gifts_desc }}</textarea>
                                            @error('gifts_desc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="our_products_title">Our Products Title</label>
                                            <input type="text" class="form-control {{ $errors -> has('our_products_title') ? 'is-invalid' : '' }}" name="our_products_title" value="{{ $cms->our_products_title }}">
                                            @error('our_products_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="our_products_desc">Our Products Desc</label>
                                            <textarea class="form-control {{ $errors -> has('our_products_desc') ? 'is-invalid' : '' }}" name="our_products_desc">{{ $cms->our_products_desc }}</textarea>
                                            @error('our_products_desc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="featured_products_title">Featured Products Title</label>
                                            <input type="text" class="form-control {{ $errors -> has('featured_products_title') ? 'is-invalid' : '' }}" name="featured_products_title" value="{{ $cms->featured_products_title }}">
                                            @error('featured_products_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="featured_products_desc">Featured Products Desc</label>
                                            <textarea class="form-control {{ $errors -> has('featured_products_desc') ? 'is-invalid' : '' }}" name="featured_products_desc">{{ $cms->featured_products_desc }}</textarea>
                                            @error('featured_products_desc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sale_products_title">Sale Products Title</label>
                                            <input type="text" class="form-control {{ $errors -> has('sale_products_title') ? 'is-invalid' : '' }}" name="sale_products_title" value="{{ $cms->sale_products_title }}">
                                            @error('sale_products_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sale_products_desc">Sale Products Desc</label>
                                            <textarea class="form-control {{ $errors -> has('sale_products_desc') ? 'is-invalid' : '' }}" name="sale_products_desc">{{ $cms->sale_products_desc }}</textarea>
                                            @error('sale_products_desc')
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
                                            <label for="countdown_img">Countdown Image</label>
                                            <input type="file" name="countdown_img" class="form-control {{ $errors -> has('countdown_img') ? 'is-invalid' : '' }}">
                                            @error('countdown_img')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="countdown_subheading">Countdown Subheading</label>
                                            <input type="text" class="form-control {{ $errors -> has('countdown_subheading') ? 'is-invalid' : '' }}" name="countdown_subheading" value="{{ $cms->countdown_subheading }}">
                                            @error('countdown_subheading')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="countdown_heading">Countdown Heading</label>
                                            <input type="text" class="form-control {{ $errors -> has('countdown_heading') ? 'is-invalid' : '' }}" name="countdown_heading" value="{{ $cms->countdown_heading }}">
                                            @error('countdown_heading')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="countdown_desc">Countdown Desc</label>
                                            <textarea class="form-control {{ $errors -> has('countdown_desc') ? 'is-invalid' : '' }}" name="countdown_desc">{{ $cms->countdown_desc }}</textarea>
                                            @error('countdown_desc')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="countdown_date">Countdown Date</label>
                                            <input type="date" class="form-control {{ $errors -> has('countdown_date') ? 'is-invalid' : '' }}" name="countdown_date" value="{{ $cms->countdown_date }}">
                                            @error('countdown_date')
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
