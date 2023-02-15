@extends('admin.layouts.master')

@section('title', 'New Medicine')

@section('css')
    <style type="text/css">
        .ck-editor__editable_inline{
            height: 300px;
        }
    </style>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create New Medicine</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('medicine/') }}">Medicine Types</a></li>
                        <li class="breadcrumb-item active">Create New Medicine</li>
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
                    <form action="{{ url('medicines/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-primary card-outline">
                            <div class="card-header align-content-center d-flex">
                                <h3 class="card-title mr-auto p-2"><i class="fas fa-edit"></i> Create New</h3>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control {{ $errors -> has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}" id="name" placeholder="E.g Panadole 100mg">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sku">Sku</label>
                                            <input type="text" class="form-control {{ $errors -> has('sku') ? 'is-invalid' : '' }}" name="sku" value="{{ old('sku') }}" id="sku" placeholder="SKU or Leave empty to auto generate">
                                            @error('sku')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="gender">Gender</label>
                                        <div class="form-group clearfix">
                                            <div class="icheck-success d-inline">
                                              <input type="radio" name="gender" value="male" checked="" id="male">
                                              <label for="male">Male</label>
                                            </div>
                                            <div class="icheck-success d-inline">
                                              <input type="radio" name="gender" value="female" id="female">
                                              <label for="female">Female</label>
                                            </div>
                                            <div class="icheck-success d-inline">
                                              <input type="radio" name="gender" value="both" id="both">
                                              <label for="both">Both</label>
                                            </div>
                                        </div>
                                        @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="medicine_type">Medicine Type</label>
                                            <select class="select2 {{ $errors -> has('medicine_type') ? 'is-invalid' : '' }}" name="medicine_type" style="width: 100%;">
                                                <option value="">Select Medicine Type</option>
                                                @foreach ($medicine_types as $medicine_type)
                                                    <option {{ old('medicine_type') == $medicine_type->id ? 'selected' : '' }} value="{{ $medicine_type->id }}">{{ $medicine_type->type }}</option>
                                                @endforeach  
                                            </select>
                                            @error('medicine_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="age">Age</label>
                                            <select class="select2 {{ $errors -> has('age') ? 'is-invalid' : '' }}" name="age" id="age" style="width: 100%;">
                                                <option value="">Select Age</option>
                                                @foreach ($ages as $age)
                                                    <option value="{{ $age->id }}">{{ $age->age }}</option>
                                                @endforeach  
                                            </select>
                                            @error('age')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dosage">Dosage</label>
                                            <select class="select2 {{ $errors -> has('dosage') ? 'is-invalid' : '' }}" multiple="multiple" id="dosage" data-placeholder="Select Dosage" name="dosage[]" style="width: 100%;">
                                                
                                            </select>
                                            @error('dosage')
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
                                            <label for="body_part">Body Part</label>
                                            <select class="select2 {{ $errors -> has('body_part') ? 'is-invalid' : '' }}" name="body_part" id="body_part" style="width: 100%;">
                                                <option value="">Select Body Part</option>
                                                @foreach ($body_parts as $body_part)
                                                    <option value="{{ $body_part->id }}">{{ $body_part->body_part }}</option>
                                                @endforeach  
                                            </select>
                                            @error('body_part')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="symptoms">Symptoms</label>
                                            <select class="select2 {{ $errors -> has('symptoms') ? 'is-invalid' : '' }}" multiple="multiple" id="symptoms" data-placeholder="Select Symptoms" name="symptoms[]" style="width: 100%;">
                                                
                                            </select>
                                            @error('symptoms')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="medicine_formulae">Medicine Formulae</label>
                                            <select class="select2 {{ $errors -> has('medicine_formulae') ? 'is-invalid' : '' }}" name="medicine_formulae" id="medicine_formulae" style="width: 100%;">
                                                <option value="">Select Medicine Formulae</option>
                                                @foreach ($medicine_formulaes as $medicine_formulae)
                                                    <option value="{{ $medicine_formulae->id }}">{{ $medicine_formulae->formulae }}</option>
                                                @endforeach  
                                            </select>
                                            @error('medicine_formulae')
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
                                            <label for="medicine_category">Medicine Category</label>
                                            <select class="select2 {{ $errors -> has('medicine_category') ? 'is-invalid' : '' }}" name="medicine_category" id="medicine_category" style="width: 100%;">
                                                <option value="">Select Medicine Category</option>
                                                @foreach ($medicine_categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                @endforeach  
                                            </select>
                                            @error('medicine_category')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="medicine_company">Medicine Company</label>
                                            <select class="select2 {{ $errors -> has('medicine_company') ? 'is-invalid' : '' }}" name="medicine_company" id="medicine_company" style="width: 100%;">
                                                <option value="">Select Medicine Company</option>
                                                @foreach ($medicine_companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->company }}</option>
                                                @endforeach  
                                            </select>
                                            @error('medicine_company')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="medicine_brand">Medicine brand</label>
                                            <select class="select2 {{ $errors -> has('medicine_brand') ? 'is-invalid' : '' }}" name="medicine_brand" id="medicine_brand" style="width: 100%;">
                                                <option value="">Select Medicine Brand</option>
                                                @foreach ($medicine_brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                                                @endforeach  
                                            </select>
                                            @error('medicine_brand')
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
                                            <label for="image1">Image1</label>
                                            <input type="file" name="image1" class="form-control {{ $errors -> has('image1') ? 'is-invalid' : '' }}">
                                            @error('image1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="image2">Image2</label>
                                            <input type="file" name="image2" class="form-control {{ $errors -> has('image2') ? 'is-invalid' : '' }}">
                                            @error('image2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="image3">Image3</label>
                                            <input type="file" name="image3" class="form-control {{ $errors -> has('image3') ? 'is-invalid' : '' }}">
                                            @error('image3')
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
                                            <label for="description">Description</label>
                                            <textarea id="description" name="description">
                                                Place <em>some</em> <u>description</u> <strong>here</strong>
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label></label>
                                        <div class="form-group clearfix">
                                            <div class="icheck-success">
                                              <input type="checkbox" name="is_featured" id="is_featured">
                                              <label for="is_featured">Is Featured?</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label></label>
                                        <div class="form-group clearfix">
                                            <div class="icheck-success">
                                              <input type="checkbox" name="is_onsale" id="is_onsale" onclick="myFunction()">
                                              <label for="is_onsale">Is Onsale?</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" min="0" class="form-control {{ $errors -> has('price') ? 'is-invalid' : '' }}" name="price" id="price" placeholder="Price">
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3" id="saleprice" style="display: none;">
                                        <div class="form-group">
                                            <label for="sale_price">Sale Price</label>
                                            <input type="number" min="0" class="form-control {{ $errors -> has('sale_price') ? 'is-invalid' : '' }}" name="sale_price" id="sale_price" placeholder="Sale Price">
                                            @error('sale_price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="stock">Stock</label>
                                            <input type="number" min="0" class="form-control {{ $errors -> has('stock') ? 'is-invalid' : '' }}" name="stock" id="stock" placeholder="Stock">
                                            @error('stock')
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
        $(document).ready(function() {

            // Get Age related dosages
            $('#age').on('change', function() {
               var age_id = $(this).val();
               if(age_id) {
                   $.ajax({
                       url: baseUrl + '/medicines/getDosage/' + age_id,
                       type: "GET",
                       success:function(data)
                       {
                         if(data){
                            $('#dosage').empty();
                            let dosage = data.dosages;
                            $.each(dosage, function(key, value){
                                $('select[name="dosage[]"]').append('<option value="'+ value.id +'">' + value.dosage+ '</option>');
                            });
                        }else{
                            $('#dosage').empty();
                        }
                     }
                   });
               }else{
                 $('#dosage').empty();
               }
            });

            // Get Body Part related symptoms
            $('#body_part').on('change', function() {
               var body_part_id = $(this).val();
               if(body_part_id) {
                   $.ajax({
                       url: baseUrl + '/medicines/getSymptoms/' + body_part_id,
                       type: "GET",
                       success:function(data)
                       {
                         if(data){
                            $('#symptoms').empty();
                            let symptoms = data.symptoms;
                            $.each(symptoms, function(key, value){
                                $('select[name="symptoms[]"]').append('<option value="'+ value.id +'">' + value.symptom+ '</option>');
                            });
                        }else{
                            $('#symptoms').empty();
                        }
                     }
                   });
               }else{
                 $('#symptoms').empty();
               }
            });
        });

        function myFunction() {
            var checkBox = document.getElementById("is_onsale");
            var salepricebox = document.getElementById("saleprice");
            var sale_price = document.getElementById("sale_price");

            if (checkBox.checked == true){
                salepricebox.style.display = "block";
                sale_price.removeAttribute("hidden");
                sale_price.setAttribute("required", "required"); 
            } else {
                salepricebox.style.display = "none";
                sale_price.setAttribute("hidden", "hidden");
                sale_price.removeAttribute("required");
                sale_price.value ='';
            }
        }

        // Editor
        ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
@endsection
