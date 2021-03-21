@php 
    use App\Models\CategoryModel as CategoryModel;
    use App\Models\MenuModel;
    use App\Helpers\URL;
    use App\Helpers\Template;

    $menuModel = new MenuModel();
    $itemsMenu = $menuModel->listItems(null, ['task' => 'news-list-items']);

    $xhtmlMenu = '';
    $xhtmlMenuMobile = '';

    if (count($itemsMenu) > 0) {
        
        $xhtmlMenu = '<nav class="main_nav"><ul class="main_nav_list d-flex flex-row align-items-center justify-content-start">';
        $xhtmlMenuMobile = '<nav class="menu_nav"><ul class="menu_mm">';

            foreach ($itemsMenu as $item) {
            $link = $item['link'];
            $target = config('zvn.template.type_link.' . $item['type_link'] . '.target');

            switch ($item['type_menu']) {
                case 'link':
                    $xhtmlMenu .= sprintf('<li><a href="%s" target="%s">%s</a></li>', $link, $target, $item['name']);
                    $xhtmlMenuMobile .= sprintf('<li class="menu_mm"><a href="%s" target="%s">%s</a></li>', $link, $target, $item['name']);
                    break;
                case 'category_article':
                    $xhtmlMenu .= sprintf('<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" data-name="category_article">%s <span class="caret"></span></a>', $item['name']);
                    $xhtmlMenuMobile .= sprintf('<li class="dropdown menu_mm"><a class="dropdown-toggle" data-toggle="dropdown" href="#">%s <span class="caret"></span></a>', $item['name']);

                    $categoryModel = new CategoryModel();
                    $itemsCategory = $categoryModel->listItems(null, ['task' => 'news-list-items']);

                    if (count($itemsCategory) > 0) {
                        $xhtmlMenu .= '<ul class="dropdown-menu">';
                        $xhtmlMenuMobile .= '<ul class="dropdown-menu">';

                        Template::showNestedMenu($itemsCategory, $xhtmlMenu);

                        $xhtmlMenu .= '</ul>';
                        $xhtmlMenuMobile .= '</ul>';
                    }

                    $xhtmlMenu .= '</li>';
                    $xhtmlMenuMobile .= '</li>';
                    break;
            }
        }

        if (session('userInfo')) {
            $xhtmlMenuUser = sprintf('<li><a href="%s">%s</a></li>', route('auth/logout'), 'Logout');
        }else {
            $xhtmlMenuUser = sprintf('<li><a href="%s">%s</a></li>', route('auth/login'), 'Login');
        }

        $xhtmlMenu .= $xhtmlMenuUser . '</ul></nav>';
        $xhtmlMenuMobile .= $xhtmlMenuUser . '</ul></nav>';
    }

@endphp

<header class="header">

    <!-- Header Content -->
    <div class="header_content_container">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_content d-flex flex-row align-items-center justfy-content-start">
                        <div class="logo_container">
                            <a href="{!! route('home') !!}">
                                <div class="logo"><span>ZEND</span>VN</div>
                            </a>
                        </div>
                        <div class="header_extra ml-auto d-flex flex-row align-items-center justify-content-start">
                            <a href="#">
                                <div class="background_image" style="background-image:url({{asset('news/images/zendvn-online.png') }});background-size: contain"></div>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Navigation & Search -->
    <div class="header_nav_container" id="header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header_nav_content d-flex flex-row align-items-center justify-content-start">
                        
                        <!-- Logo -->
                        <div class="logo_container">
                            <a href="#">
                                <div class="logo"><span>ZEND</span>VN</div>
                            </a>
                        </div>

                        <!-- Navigation -->
                        {!! $xhtmlMenu !!}

                        <!-- Hamburger -->
                        <div class="hamburger ml-auto menu_mm"><i class="fa fa-bars  trans_200 menu_mm" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>		
    </div>
</header>

<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
    <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>

    {!! $xhtmlMenuMobile !!}
    
    
</div>