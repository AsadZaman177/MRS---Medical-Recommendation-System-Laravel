@extends('layouts.app')

@section('title')
    {{ $cms->page_title }}
@endsection

@section('css')
    <style>
        .ltn__breadcrumb-area {
            margin-bottom: 40px!important;
        }
        

        /* select2 styling */
        .select2-container {
        width: 100% !important;
        min-height: 40px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        }

        .select2-dropdown {
        border: 1px solid #ccc;
        }

        .select2-selection {
        height: 40px !important;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: none;
        }

        .nice-select {
            width: 100%!important;
        }
        

    </style>
@endsection

@section('content')
<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image "  data-bs-bg="{{ asset('images/'.'/'.$cms->page_bg_img) }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">{{ $cms->page_title }}</h1>
                </div>
            </div>
            <div class="col-lg-12">
                {!! $cms->page_desc !!}
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->



<!-- SEARCH Resultt -->
<div class="ltn__product-area ltn__product-gutter pb-70">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="text-center">
                    <h2 class="ltn__secondary-color">Fill Out The Following Fields To Find Recommened Medicines</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('/recomend') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <label for="age"><strong>Your Age:</strong></label>
                                    <div class="">
                                        <select class="nice-select" name="age">
                                            <option value="">Select Age</option>
                                            @foreach ($ages as $age)
                                                <option value="{{ $age->id }}">{{ $age->age }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="gender"><strong>Gender:</strong></label>
                                    <div class="input-item">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"  value="male">
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="female">
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="both">
                                            <label class="form-check-label" for="both">Both</label>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="col-md-6 mt-3">
                                    <label for="body_part"><strong>Body Part:</strong></label>
                                    <div class="input-item">
                                        <select class="select2 nice-select" id="body_part" name="body_part" style="height: 65px!important">
                                            <option value="">Select Body Part</option>
                                            @foreach ($body_parts as $body_part)
                                                <option value="{{ $body_part->id }}">{{ $body_part->body_part }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <label for="symptoms"><strong>Symptoms:</strong></label>
                                    <div class="input-item">
                                        <select class="select2 nice-select" multiple="multiple" id="symptoms" name="symptoms[]" style="height: 65px!important">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="btn-wrapper mt-5">
                                <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">get a free service</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>

@endsection

@section('javascript')
    <script>
        $(document).ready(function(){
            // Get Body Part related symptoms
            $('#body_part').on('change', function() {
               var body_part_id = $(this).val();
               if(body_part_id) {
                   $.ajax({
                       url: baseUrl + '/symptoms/' + body_part_id,
                       type: "GET",
                       success:function(data)
                       {
                         if(data){
                            $('#symptoms').empty();
                            let symptoms = data.symptoms;
                            $.each(symptoms, function(key, value){
                                $('#symptoms').append('<option value="'+ value.id +'">' + value.symptom+ '</option>');
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
    </script>
@endsection