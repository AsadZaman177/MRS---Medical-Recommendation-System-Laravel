<!-- HEADER AREA START (header-3) -->
<header class="ltn__header-area ltn__header-3">

    <!-- ltn__header-top-area start -->
    <div class="ltn__header-top-area border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="ltn__top-bar-menu">
                        <ul>
                            <li><a href="mailto:info@webmail.com?Subject=Flower%20greetings%20to%20you"><i
                                        class="icon-mail"></i> {{ $genral->email }}</a></li>
                            <li><a href="locations.html"><i class="icon-placeholder"></i> {{ $genral->address }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="top-bar-right text-right text-end">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li>
                                    <!-- ltn__language-menu -->
                                    <div class="ltn__drop-menu ltn__currency-menu ltn__language-menu">
                                        <ul>
                                            <li><a href="#" class="dropdown-toggle"><span
                                                        class="active-currency">English</span></a>
                                                <ul>
                                                    <li><a href="#">Arabic</a></li>
                                                    <li><a href="#">Bengali</a></li>
                                                    <li><a href="#">Chinese</a></li>
                                                    <li><a href="#">English</a></li>
                                                    <li><a href="#">French</a></li>
                                                    <li><a href="#">Hindi</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <!-- ltn__social-media -->
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li><a href="{{ $genral->facebook  }}" title="Facebook"><i
                                                        class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="{{ $genral->twitter }}" title="Twitter"><i
                                                        class="fab fa-twitter"></i></a></li>

                                            <li><a href="{{ $genral->instagram }}" title="Instagram"><i
                                                        class="fab fa-instagram"></i></a></li>
                                            <li><a href="{{ $genral->youtube }}" title="Youtube"><i
                                                        class="fab fa-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-top-area end -->
    
    <!-- ltn__header-middle-area start -->
    <div class="ltn__header-middle-area">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="site-logo">
                        @if($genral->logo)
                            <a href="{{ url('/') }}"><img src="{{ asset('images/'.$genral->logo) }}" alt="Logo"></a> 
                        @else
                            <a href="{{ url('/') }}">{{ $genral->name }}</a>
                        @endif
                    </div>
                </div>
                
                <div class="col-8">
                    <!-- header-options -->
                    <div class="ltn__header-options">
                        <ul>
                            @auth
                                <li>
                                    <strong><i class="icon-user"></i> <a href="{{ url('/dashboard') }}">My Account ({{ Auth::user()->name }})</a></strong> 
                                </li>
                                <li>
                                    <strong>
                                        <i class="fas fa-sign-out-alt"></i> 
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                    </strong> 
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @else
                                <li>
                                    <strong><i class="icon-user"></i> <a href="{{ route('login') }}">Login</a></strong> 
                                </li>
                                <li>
                                    <strong>OR</strong>
                                </li>
                                <li>
                                    <strong><i class="icon-user"></i> <a href="{{ route('register') }}">Register</a></strong> 
                                </li>
                            @endauth
                            <li id="header-bar">
                                <!-- mini-cart 2 -->
                                @include('layouts.header_cart')
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->

    <!-- header-bottom-area start -->
    <div class="header-bottom-area ltn__border-top ltn__header-sticky  ltn__sticky-bg-white--- ltn__sticky-bg-secondary ltn__secondary-bg section-bg-1 menu-color-white d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col header-menu-column justify-content-center">
                    <div class="sticky-logo">
                        <div class="site-logo">
                            @if($genral->logo)
                                <a href="{{ url('/') }}"><img src="{{ asset('images/'.$genral->logo) }}" alt="Logo"></a> 
                            @else
                                <a href="{{ url('/') }}">{{ $genral->name }}</a>
                            @endif
                        </div>
                    </div>
                    <div class="header-menu header-menu-2">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                    <li class="menu-icon"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="menu-icon"><a href="{{ url('/about') }}">About</a></li>
                                    <li class="menu-icon"><a href="{{ url('/shop') }}">Shop</a></li>
                                    <li class="menu-icon"><a href="{{ url('smart-doctor') }}">Smart Doctor</a></li>
                                    <li class="menu-icon"><a href="{{ url('/search-medcine') }}">Search Medicine</a></li>
                                    <li class="menu-icon"><a href="{{ url('/news') }}"">News</a></li>
                                    <li class="menu-icon"><a href="{{ url('/contact-us') }}"">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header-bottom-area end -->
</header>
<!-- HEADER AREA END -->

<!-- MOBILE MENU START -->
<div class="mobile-header-menu-fullwidth mb-30 d-block d-lg-none">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Mobile Menu Button -->
                <div class="mobile-menu-toggle d-lg-none">
                    <span>MENU</span>
                    <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                        <svg viewBox="0 0 800 600">
                            <path
                                d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                id="top"></path>
                            <path d="M300,320 L540,320" id="middle"></path>
                            <path
                                d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                id="bottom"
                                transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MOBILE MENU END -->



<!-- Utilize Mobile Menu Start -->
<div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <div class="site-logo">
                @if($genral->logo)
                    <a href="{{ url('/') }}"><img src="{{ asset('images/'.$genral->logo) }}" alt="Logo"></a> 
                @else
                    <a href="{{ url('/') }}">{{ $genral->name }}</a>
                @endif
            </div>
            <button class="ltn__utilize-close">×</button>
        </div>
        <div class="ltn__utilize-menu">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/shop') }}">Shop</a></li>
                <li><a href="{{ url('/smart-doctor') }}">Smart Doctor</a></li>
                <li><a href="{{ url('/search-medcine') }}">Search Medicine</a></li>
                <li><a href="{{ url('/news') }}"">News</a></li>
                <li><a href="{{ url('/contact-us') }}"">Contact</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Utilize Mobile Menu End -->

{{-- <div class="ltn__utilize-overlay"></div> --}}