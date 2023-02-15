<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $genral->name }}- @yield('title')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
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

    @yield('javascript')

</body>

</html>
