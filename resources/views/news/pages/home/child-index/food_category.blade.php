@php
    use App\Helpers\URL;
    echo '<pre style="color:red";>$itemsCategory === '; print_r($itemsCategory);echo '</pre>';
@endphp
@foreach($itemsCategory as $item)
    <div class="col-lg-4 col-md-4">
        <div class="single-food-category cate-padding-1 text-center mb-30">
            <div class="single-food-hover-2">
                <img src="{{ asset($item->thumb) }}" alt="">
            </div>
            <div class="single-food-content">
                <h3><a href="{{URL::linkCategory($item)}}">{{ucfirst($item->name)}}</a></h3>
            </div>
        </div>
    </div>
@endforeach