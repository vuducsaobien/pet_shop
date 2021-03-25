@php
    use App\Helpers\URL;
    use App\Models\CategoryModel;
    use App\Models\MenuModel;
        /*================================= lay menu =============================*/
        $menuModel = new MenuModel();
        $itemsMenu = $menuModel->listItems(null, ['task' => 'news-list-items']);

        /*================================= lay category ==========================*/
        $categoryModel = new CategoryModel();
        $itemsCategory = $categoryModel->listItems(null, ['task' => 'news-list-items']);
@endphp
@if(count($itemsMenu))

<nav>
    <ul>
        @foreach($itemsMenu as $item)
        @switch($item->type_menu)
                @case("link")
                <li><a href="{{$item->link}}">{{$item->name}}</a></li>
                @break

                @case("category_product")
                <li class="mega-menu-position"><a href="{{$item->link}}">Food</a>
                    <ul class="mega-menu">
                        @foreach($itemsCategory as $item)
                        <li>
                            <ul>
                                <li class="mega-menu-title">{{$item->name}}</li>
                                @foreach($item->children as $i)
                                <li><a href="{{URL::linkCategory($i)}}">{{$i->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                        <li>
                            <ul>
                                <li><a href="shop-page.html"><img alt="" src="{{ asset('news/images/banner/menu-img-4.jpg') }}"></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @break
        @endswitch

        {{--<li class="mega-menu-position"><a href="shop-page.html">Food</a>
            <ul class="mega-menu">
                <li>
                    <ul>
                        <li class="mega-menu-title">Dogs Food</li>
                        <li><a href="shop-page.html">Eggs</a></li>
                        <li><a href="shop-page.html">Carrots</a></li>
                        <li><a href="shop-page.html">Salmon fishs</a></li>
                        <li><a href="shop-page.html">Peanut Butter</a></li>
                        <li><a href="shop-page.html">Grapes & Raisins</a></li>
                    </ul>
                </li>


            </ul>
        </li>
        --}}
        @endforeach
    </ul>
</nav>
@endif
