<!-- menu profile quick info -->
<div class="profile clearfix">
    <div class="profile_pic">
        <img src="{{ asset('admin/img/img.jpg') }}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Welcome,</span>
        <h2>{{ session('userInfo')['username'] }}</h2>
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
            <li id = "dashboard"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li id = "article"><a   href="{{ route('article') }}"><i class="fa fa-newspaper-o"></i> Article</a></li>
            <li id = "product"><a   href="{{ route('product') }}"><i class="fa fa-paw"></i> Product</a></li>
            <li id = "menu"><a      href="{{ route('menu') }}"><i class="fa fa-sitemap"></i> Menu</a></li>
            <li id = "category"><a  href="{{ route('category') }}"><i class="fa fa fa-building-o"></i> Category</a></li>

            <li>
                <a><i class="fa fa-cubes"></i> Chưa phân loại <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li id = "comment" class="none"><a href="{{ route('comment') }}"> Comment</a></li>
                    <li id = "payment" class="none"><a href="{{ route('payment') }}"> Payment</a></li>
                    <li id = "team" class="none"><a href="{{ route('team') }}"> Team</a></li>
                    <li id = "shipping" class="none"><a href="{{ route('shipping') }}"> Shipping</a></li>
                    <li id = "contact" class="none"><a href="{{ route('contact') }}"> Contact</a></li>
                </ul>
            </li>
            <li>
                <a><i class="fa fa-cog"></i> Cấu hình <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li id = "setting"><a href="{{ route('setting', ['type' => 'general']) }}"></i>Cấu hình chung</a></li>
                    <li id = "setting"><a href="{{ route('setting', ['type' => 'email']) }}"></i>Email</a></li>
                    <li id = "setting"><a href="{{ route('setting', ['type' => 'social']) }}">Social</a></li>
                    <li id = "logs"     class="none"><a href="{{ route('logs') }}"> Logs</a></li>
                    <li id = "gallery"  class="none"><a href="{{ route('gallery') }}"> Gallery</a></li>
                    <li id = "contact"  class="none"><a href="{{ route('contact') }}"> Liên hệ</a></li>
                    <li id = "rss"      class="none"><a href="{{ route('rss') }}"> RSS</a></li>
                    <li id = "slider"   class="none"><a href="{{ route('slider') }}"> Slider</a></li>
                    <li id = "attribute"    class="none"><a href="{{ route('attribute') }}"> Attribute</a></li>
                    <li id = "testimonial"  class="none"><a href="{{ route('testimonial') }}"> Testimonial</a></li>
                </ul>
            </li>

            <li>
                <a><i class="fa fa-user"></i> Người dùng <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li id = "user" class="none"><a href="{{ route('user/change-logged-password') }}"> Change Password</a></li>
                    <li id = "user" class="none"><a href="{{ route('user') }}"> User</a></li>
                </ul>
            </li>

            <li><a href="{{ route('home') }}"><i class="fa fa-globe"></i> View Website</a></li>
            <li><a href="{{ route('auth/logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>

        </ul>
    </div>
</div>
<!-- /sidebar menu -->
