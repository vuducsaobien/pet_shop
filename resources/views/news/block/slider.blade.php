{{-- @php
    use App\Helpers\Template as Template;
@endphp
@if (count($itemsSlider) > 0) 
    <div class="home">

        <!-- Home Slider -->
        <div class="home_slider_container">
            <div class="owl-carousel owl-theme home_slider">
                @foreach ($itemsSlider as $key => $val)
                    @php
                        $name        = $val['name'];
                        $description = $val['description'];
                        $link        = $val['link'];
                        $thumb       = url("/images/slider") . '/' . $val['thumb'];
                    @endphp
                    <div class="owl-item home_slider_item">
                        <div class="background_image" style="background-image:url('{!! $thumb !!}')"></div>
                        <div class="home_slider_content text-center">
                            <div class="home_slider_content_inner" data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                <div class="home_title">{!! $name !!}</div>
                                <div class="home_text">{!! $description !!}</div>
                                <div class="home_button trans_200"><a href="{!! $link !!}">Xem chi tiết</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if (count($itemsSlider) > 1) 
                <div class="home_slider_nav home_slider_prev trans_200"><i class="fa fa-angle-left trans_200" aria-hidden="true"></i></div>
                <div class="home_slider_nav home_slider_next trans_200"><i class="fa fa-angle-right trans_200" aria-hidden="true"></i></div>
            @endif
        </div>
    </div>
@endif --}}

<div class="slider-area">
    <div class="slider-active owl-dot-style owl-carousel">

        <div class="single-slider pt-100 pb-100 yellow-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12 col-sm-7">
                        <div class="slider-content slider-animated-1 pt-114">
                            <h3 class="animated">We keep pets for pleasure.</h3>
                            <h1 class="animated">Food & Vitamins <br>For all Pets</h1>
                            <div class="slider-btn">
                                <a class="animated" href="product-details.html">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 col-sm-5">
                        <div class="slider-single-img slider-animated-1">
                            <img class="animated" src="assets/img/slider/slider-single-img.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-slider pt-100 pb-100 yellow-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-7 col-12">
                        <div class="slider-content slider-animated-1 pt-114">
                            <h3 class="animated">We keep pets for pleasure.</h3>
                            <h1 class="animated">Food & Vitamins <br>For all Pets</h1>
                            <div class="slider-btn">
                                <a class="animated" href="product-details.html">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-5 col-12">
                        <div class="slider-single-img slider-animated-1">
                            <img class="animated" src="assets/img/slider/slider-single-img-2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
