@extends('layouts.app')

@section('content')

    @include('category._navigate')

<div class="main__products">
    <h3>Серия SQ - Стандартный цилиндр ISO6431</h3>
    <h4>Standart square</h4>
    <br>

    <h2>{{ $currentCategory->title }}</h2>
    <h3>{{ $currentCategory->vender }}</h3>

    <div class="picture">
        <div class="picture_vendor">
            <div class="h3">
                {{ $currentCategory->vendor }}
            </div>
            <img class="image" src="{{ asset($currentCategory->image) }}" alt="">
        </div>
    </div>


    <div class="drawing">
        <div class="picture_drawing">
            <img class="drawing" src="{{ asset($currentCategory->drawing) }}" alt="">
        </div>
    </div>



    {{--From this point, the display of all product characteristics tables begins--}}

    @foreach($attributesByGroups as $tableName => $attributes)
    <table class="table">
        <caption>{{ __($tableName) }}</caption>
        <tr>
            <td>
                {{ __('Vendor') }}
            </td>
            @foreach($attributes as $attribute)
                <td>
                    {{ $attribute->name }}
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
                        @if($product->getAttributeValueById($attribute->id))
                            {{ $product->getAttributeValueById($attribute->id) }}
                        @else
                            -
                        @endif
                    </td>
                @endforeach
            </tr>
        @endforeach
    </table>
    @endforeach



</div>

@endsection

