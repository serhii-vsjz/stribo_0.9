@extends('layouts.app')

@section('content')

    @include('category._navigate')

<div class="main__products">

    <div class="title__block">
        <h3>{{ $currentCategory->title }}</h3>
        <h3>{{ $currentCategory->vendor }}</h3>
    </div>

    <div class="image__block">
        <img class="image" src="{{ asset('images/' . $currentCategory->image) }}" alt="">
        <div class="image__vendor">

            <div class="h3">
                {{ $currentCategory->vendor }}
            </div>
        </div>
    </div>

{{--
    <div class="chart__block">
        <div class="picture_drawing">
            <img class="drawing" src="{{ asset('drawing/' . $currentCategory->image) }}" alt="">
        </div>
    </div>
--}}

{{--
    <div class="color__selector">
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
    </div>
--}}

    <table class="table">
        <tr>
            <td>Артикул</td>
            <td>Цена</td>

        </tr>
        @foreach($products as $product)

            <tr class="row">
                <td>
                    {{ $product->vendor }}
                </td>

                <td>
                    {{$product->price->getValue()}}
                </td>
                <td>
                    <form action="{{ route('getPrice')}}" method="POST">
                        @csrf
                        <input class="stroke" type="text" name="stroke">
                        <input class="product_id" type="text" name="product_id">
                        <input type="submit" value="?">

                    </form>
                    <input class="stroke" type="text">
                    <button class="get_price" product_id="{{ $product->id }}">Просчитать</button>
                    <p class="price">777</p>
                </td>

            </tr>
        @endforeach
    </table>





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
                            <td>
                                {{ $product->getAttributeValueById($attribute->id) }}
                            </td>

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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js') }}"></script>

    <script>
        $(function () {

            $('.get_price').on('click',function(){

                let row = $("this").parent("row");

                let product = $(this).attr('product_id');
                let stroke = $(this).siblings(".stroke").val();
                let price = $(this).siblings(".price");


                $.ajax({
                    url: "/admin/get_price",
                    type: "POST",
                    data: {
                        "_token": $('meta[name="csrf-token"]').attr('content'),
                        product:product,
                        stroke:stroke,
                    },

                    success: function (result) {
                        price.text(result)
                    }
                });
            })
        })
    </script>

@endsection

