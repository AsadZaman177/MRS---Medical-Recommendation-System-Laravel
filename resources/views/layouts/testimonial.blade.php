<div class="ltn__testimonial-area section-bg-1 pt-80 pb-70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center">
                    <h6 class="section-subtitle ltn__secondary-color">Testimonials</h6>
                    <h1 class="section-title">Clients Feedbacks<span>.</span></h1>
                </div>
            </div>
        </div>
        <div class="row ltn__testimonial-slider-3-active slick-arrow-1 slick-arrow-1-inner">
            @foreach ($testimonials as $testimonial )
                <div class="col-lg-12">
                    <div class="ltn__testimonial-item ltn__testimonial-item-4">
                        <div class="ltn__testimoni-img">
                            <img src="{{ asset('images/').'/'.$testimonial->image }}" alt="#">
                        </div>
                        <div class="ltn__testimoni-info">
                            <p>{{ $testimonial->comments }} </p>
                            <h4>{{ $testimonial->name }}</h4>
                            <h6>{{ $testimonial->company }}</h6>
                        </div>
                        <div class="ltn__testimoni-bg-icon">
                            <i class="far fa-comments"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>