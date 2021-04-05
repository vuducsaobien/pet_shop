<!-- menu profile quick info -->
<div class="profile clearfix">
    <div class="profile_pic">
        <img src="{{ asset(session('userInfo')['thumb']) }}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">

        <h2><span>{{__('message.welcome')}},</span>
            {{ session('userInfo')['username'] }} <br>

            <a href="{{route('language','en')}}"><img width="30" src="{{asset('images/logo/en.png')}}" alt=""></a>
            &nbsp; <a href="{{route('language','vi')}}"><img width="30" src="{{asset('images/logo/vi.png')}}"
                                                             alt=""></a>
        </h2>

    </div>
</div>
<!-- /menu profile quick info -->
<br/>
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section active">
        {{-- <div class="menu_section"> --}}

        <h3>Menu</h3>
        <ul class="nav side-menu">
            <li id="dashboard"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> {{__('message.dashboard')}}
                </a></li>

            <li>
                <a><i class="fa fa-product-hunt"></i> Quản lý sản phẩm <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li id="product"><a href="{{ route('product') }}"> Sản phẩm</a></li>
                    <li id="category"><a href="{{ route('category') }}"> Danh mục</a></li>
                    <li id="discount"><a href="{{ route('discount') }}"> Coupon</a></li>
                    <li id="attribute"><a href="{{ route('attribute') }}"> Thuộc tính</a></li>
                    <li id="shipping"><a href="{{ route('shipping') }}"> Phí ship</a></li>
                    <li id="cart"><a href="{{ route('cart') }}">Đơn Hàng</a></li>
                    <li id="comment"><a href="{{ route('comment') }}"> Comment</a></li>

                </ul>
            </li>


            <li>
                <a><i class="fa fa-archive"></i> Quản lý bài viết <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li id="article"><a href="{{ route('article') }}"> Article</a></li>
                    <li id="comment_article"><a href="{{ route('commentArticle') }}"> Comment</a></li>
                    <li id="testimonial"><a href="{{ route('testimonial') }}"> Testimonial</a></li>
                    <li id="team"><a href="{{ route('team') }}"> Team</a></li>
                </ul>
            </li>
            <li>
                <a><i class="fa fa-user"></i> Quản lý thành viên <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li id="user"><a href="{{ route('user') }}"> User</a></li>
                    <li class="none"><a href="{{ route('user/change-logged-password') }}"> Change Password</a></li>

                </ul>
            </li>
            <li><a href="{{ route('menu') }}"><i class="fa fa-sitemap"></i> Quản lý Menu</a></li>
            <li id = "logs" class="none"><a href="{{ route('logs') }}"><i class="fa fa-history"></i> Logs</a></li>
            <li><a href="{{ route('gallery') }}"><i class="fa fa-image"></i> Gallery</a></li>

            <li><a href="{{ route('slider') }}"><i class="fa fa-sliders"></i> Slider</a></li>
            <li><a href="{{ route('contact') }}"><i class="fa fa-connectdevelop"></i> Contact</a></li>

            <li>
                <a><i class="fa fa-cog"></i> {{__('message.config')}} <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li id="setting"><a href="{{ route('setting', ['type' => 'general']) }}">Cấu hình chung</a></li>
                    <li id="setting"><a href="{{ route('setting', ['type' => 'email']) }}">Email</a></li>
                    <li id="setting"><a href="{{ route('setting', ['type' => 'social']) }}">Social</a></li>
                    <li id="setting"><a href="{{ route('setting', ['type' => 'share']) }}">Share button</a></li>
                </ul>
            </li>

            <li><a href="{{ route('home') }}"><i class="fa fa-globe"></i> {{__('message.view-website')}}</a></li>
            <li><a href="{{ route('auth/logout') }}"><i class="fa fa-sign-out"></i> {{__('message.logout')}}</a></li>

        </ul>
    </div>
</div>
<!-- /sidebar menu -->
