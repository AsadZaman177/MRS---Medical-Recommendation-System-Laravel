<footer class="ltn__footer-area  ">
    <div class="footer-top-area  section-bg-2 plr--5">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-about-widget">
                        <div class="footer-logo">
                            <div class="site-logo">
                                @if($genral->logo)
                                <a href="{{ url('/') }}"><img src="{{ asset('images/'.$genral->logo) }}" alt="Logo"></a> 
                                @else
                                    <a href="{{ url('/') }}">{{ $genral->name }}</a>
                                @endif
                            </div>
                        </div>
                        <p>{{ $genral->footer_about }}</p>
                        <div class="mt-10">
                            <img src="{{ asset('images/'.$genral->footer_certificate) }}">
                        </div>
                        <div class="ltn__social-media mt-20">
                            <ul>
                                <li><a href="{{ $genral->facebook }}" title="Facebook"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $genral->twitter }}" title="Twitter"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li><a href="{{ $genral->instagram }}" title="Linkedin"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li><a href="{{ $genral->youtube }}" title="Youtube"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">Company</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{ url('/about') }}">About</a></li>
                                <li><a href="{{ url('/shop') }}">All Products</a></li>
                                <li><a href="{{ url('/smart-doctor') }}">Smart Doctor</a></li>
                                <li><a href="{{ url('/search-medcine') }}">Search Medicine</a></li>
                                <li><a href="{{ url('/contact') }}">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
    
                <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget footer-menu-widget clearfix">
                        <h4 class="footer-title">Customer Care</h4>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/dashboard') }}">My account</a></li>
                                <li><a href="{{ url('track-order') }}">Order tracking</a></li>
                                <li><a href="{{ url('/news') }}">News</a></li>
                                <li><a href="{{ url('/terms-and-conditions') }}">Term & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                    <div class="footer-widget footer-newsletter-widget">
                        <h4 class="footer-title">Contact Us</h4>
                        <div class="footer-address">
                            <ul>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-placeholder"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p>{{ $genral->address }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-call"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p><a href="tel:+0123-456789">+0123-456789</a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="footer-address-icon">
                                        <i class="icon-mail"></i>
                                    </div>
                                    <div class="footer-address-info">
                                        <p><a href="mailto:{{ $genral->email }}">{{ $genral->email }}</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <h5 class="mt-30">We Accept</h5>
                        <img src="{{ asset('images/'.'/'.$genral->footer_payment) }}" alt="Payment Image">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="ltn__copyright-area ltn__copyright-2 section-bg-7  plr--5">
        <div class="container-fluid ltn__border-top-2">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="ltn__copyright-design clearfix">
                        <p>{{ $genral->copyright }} <span class="current-year"></span></p>
                    </div>
                </div>
                <div class="col-md-6 col-12 align-self-center">
                    <div class="ltn__copyright-menu text-end">
                        <ul>
                            <li><a href="{{ url('/terms-and-conditions') }}">Terms & Conditions</a></li>
                            <li><a href="{{ url('/privacy-policy') }}">Privacy & Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>