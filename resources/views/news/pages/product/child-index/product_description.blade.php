@php
    // echo '<pre style="color:red";>$items[all_attribute] === '; print_r($items['all_attribute']);echo '</pre>';  

    $xhtmlAttribute = '';
    foreach ($items['all_attribute'] as $key => $value) {
        $xhtmlAttribute .= '<li><span>'.$value['name'].':</span>'.$value['detail_string'].'</li>';
    }
    // echo '<h3>Die is Called Blade</h3>';die;
@endphp


<div class="description-review-area pb-100">
    <div class="container">
        <div class="description-review-wrapper gray-bg pt-40">

            <div class="description-review-topbar nav text-center">
                <a class="active" data-toggle="tab" href="#des-details1">DESCRIPTION</a>
                <a data-toggle="tab" href="#des-details2">MORE INFORMATION</a>
                <a data-toggle="tab" href="#des-details3">REVIEWS (2)</a>
            </div>
            
            <div class="tab-content description-review-bottom">

                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        {!! $items['description'] !!}
                    </div>
                </div>
                
                <div id="des-details2" class="tab-pane">
                    <div class="product-anotherinfo-wrapper">
                        <ul>
                            {!! $xhtmlAttribute !!}
                        </ul>
                    </div>
                </div>

                <div id="des-details3" class="tab-pane">

                    <div class="rattings-wrapper">
                        @include('news.pages.product.child-index.description.rating_show')                        
                    </div>

                    <div class="ratting-form-wrapper">
                        <h3>Add your Comments :</h3>
                        <div class="ratting-form">
                            @include('news.pages.product.child-index.description.rating_form')
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
