@php
    use App\Helpers\Template;

    $total=0;

@endphp

{{-- @foreach($item->products as $k=>$val)
    @php
        $class     = $k%2= = 0?"even":"odd";
        $quantity  = $val->pivot->quantity;
        $price     = $val->pivot->price;
        $subTotal  = $quantity*$price;
        $total    += $subTotal;
    @endphp --}}

    {{-- <tr class="{{$class}} pointer"> --}}
    <tr class="pointer">

        {{-- <td class=" ">{{$val->name}}</td>
        <td class=" "><img width="70" src="{{asset($val->thumb)}}" alt=""> </td>
        <td class=" ">{{Template::format_price($price)}}</td>
        <td>{{$quantity}}</td>
        <td>{{Template::format_price($subTotal)}}</td> --}}

        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>
        <td>2</td>

    </tr>

{{-- @endforeach --}}
