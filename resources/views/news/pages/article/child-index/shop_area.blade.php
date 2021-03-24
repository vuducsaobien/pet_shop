<div class="shop-area pt-100 pb-100">
    <div class="container">
        <div class="row flex-row-reverse">

            <div class="col-lg-9 col-md-8">
                <div class="blog-details-wrapper res-mrg-top">
                    @include('news.pages.article.child-index.shop_detail')
                </div>
            </div>

            <!-- shop-sidebar -->
            <div class="col-lg-3 col-md-4">
                <div class="shop-sidebar blog-mrg">

                    <div class="shop-widget">
                        <h4 class="shop-sidebar-title">Search Products</h4>
                        <div class="shop-search mt-25 mb-50">
                            <form class="shop-search-form">
                                <input type="text" placeholder="Find a product">
                                <button type="submit">
                                    <i class="icon-magnifier"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    @include('news.pages.article.child-index.shop_sidebar')

                </div>
            </div>
            
        </div>
    </div>
</div>
