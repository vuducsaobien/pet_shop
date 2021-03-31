@php
    use App\Helpers\Template;

    $count = count($items['comment']);
    $total = 0;
    foreach ($items['comment'] as $key => $value) {
        $total += $value['star'];
    }
    $average     = ceil($total/$count);
    $xhtmlRating = Template::showRating($average);

@endphp
<div class="product-rating">
    {!! $xhtmlRating !!}
    <span> ( 0{{ $count }} Customer Review ) </span>
</div>
