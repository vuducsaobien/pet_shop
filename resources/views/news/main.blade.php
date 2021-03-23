<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        @include('news.elements.head')
    </head>
    <body>

    	@include('news.elements.header')
        @include('news.block.slider')

        {{-- Food Category --}}
        @include('news.block.food_category')

        {{-- Product --}}
        <div class="product-area pt-95 pb-70 gray-bg">
            <div class="container">
                <div class="section-title text-center mb-55">
                    <h4>Most Populer</h4>
                    <h2>Recent Products</h2>
                </div>
                <div class="row">
                    @include('news.block.product')
                </div>
            </div>
        </div>


        {{-- deal --}}
    	@include('news.block.deal')

        {{-- testimonial --}}
        <div class="testimonial-area pt-90 pb-70 bg-img" style="background-image:url({{ asset('news/images/banner/banner-1.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 ml-auto mr-auto">
                        <div class="testimonial-wrap">
                            @include('news.block.testimonial')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- service --}}
    	@include('news.block.service')

        {{-- blog-area --}}
        <div class="blog-area pb-70">
            <div class="container">
                <div class="section-title text-center mb-60">
                    <h4>Latest News</h4>
                    <h2>From Our Blog</h2>
                </div>
                <div class="row">
                    @include('news.block.blog')
                </div>
            </div>
        </div>

		<!-- modal -->
        @include('news.partials.modal.home')

		<!-- all js here -->
        @include('news.elements.script')

    </body>
</html>
