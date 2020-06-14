@extends('layouts.app')

@section('content')

    @include('category._navigate')

<div class="main__products">
    <h3>Серия SQ - Стандартный цилиндр ISO6431</h3>
    <h4>Standart square</h4>
    <br>

    <div class="picture">
        <div class="picture_vendor">
            <img class="image" src="{{ asset($currentCategory->image) }}" alt="">
        </div>
    </div>

    <h2>{{ $currentCategory->title }}</h2>
    <h3>{{ $currentCategory->vender }}</h3>

    {{--From this point, the display of all product characteristics tables begins--}}

    <table class="table">
        <tr>
            <td>
                vendor
            </td>
            @foreach($attributes as $attribute)
                <td>
                    {{ $attribute }}
                </td>
            @endforeach
        </tr>

        @foreach($products as $product)
            <tr>
                <td>
                    {{ $product->vendor }}
                </td>
                @foreach($attributes as $attribute)
                    <td>
                        @if($product->getAttributeValueByName($attribute))
                            {{ $product->getAttributeValueByName($attribute) }}
                        @else
                            -
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
    </table>



</div>

@endsection

