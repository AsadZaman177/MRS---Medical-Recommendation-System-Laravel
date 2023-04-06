<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $genral->name }}- @yield('title')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.png in the root directory -->
    <link rel="shortcut icon" href="{{ asset('frontend/img/favicon.png ')}}" type="image/x-icon"/>
    <!-- Font Icons css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-icons.css ')}}">
    <!-- plugins css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/plugins.css ')}}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css ')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css ')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('/backend/plugins/toastr/toastr.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    @yield('css')
</head>

<body>


    <!-- Body main wrapper start -->
    <div class="body-wrapper">

        <!-- Header -->
          @include('layouts.header')
        <!-- End Header -->

        @yield('content')
        
        <!-- CALL TO ACTION START (call-to-action-6) -->
        @include('layouts.cta')
        <!-- CALL TO ACTION END -->

        <!-- FOOTER AREA START -->
        @include('layouts.footer')
        <!-- FOOTER AREA END -->

    </div>
    <!-- Body main wrapper end -->


    <!-- All JS Plugins -->
    <script src="{{ asset('frontend/js/plugins.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
         });

         baseUrl = {!! json_encode(url('/')) !!}

    
        toastr.options =
                    {
                        "closeButton" : true,
                        "progressBar" : true,
                        "positionClass": "toast-bottom-center",
                    }
  
        $(document).on("click", "#addtocart", function(e) {
            // Add To Cart
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ url('add-to-cart') }}' + '/' + ele.attr("data-id"),
                method: "get",
                data: {_token: '{{ csrf_token() }}'},
                dataType: "json",
                success: function (response) {
                    
                    toastr.success(response.msg);
                    $("#header-bar").html(response.data);
                }
            });
        });
        
    
        @if(Session::has('message'))
                toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
            toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif

        //Initialize Select2 Elements
        $('.select2').select2();
    </script>

    @yield('javascript')

</body>

</html>
