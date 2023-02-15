<div class="ltn__call-to-action-area section-bg-1 bg-image pt-120 pb-120" data-bs-bg="{{ asset('images/').'/'.$cms->countdown_img }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-4">
                <!-- <img src="img/banner/15.png" alt="#"> -->
            </div>
            <div class="col-lg-5 col-md-6 col-sm-8">
                <div class="call-to-action-inner text-color-white--- text-center---">
                    <div class="section-title-area ltn__section-title-2--- text-center---">
                        <h6 class="ltn__secondary-color">{{ $cms->countdown_subheading }}</h6>
                        <h1 class="section-title">{{ $cms->countdown_heading }}</h1>
                        <p>{{ $cms->countdown_desc }} </p>
                    </div>
                    <div class="ltn__countdown ltn__countdown-3 bg-white--" data-countdown="{{ \Carbon\Carbon::parse($cms->countdown_date)->format('Y/m/d') }}">
                    </div>
                    <div class="btn-wrapper animated">
                        <a href="{{ url('/shop') }}" class="theme-btn-1 btn btn-effect-1 text-uppercase">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>