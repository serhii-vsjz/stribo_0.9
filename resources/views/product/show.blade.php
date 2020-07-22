@extends('layouts.app')

@section('content')

<div class="main">
    <div class="container">
        <div class="product__show">

            <div class="product__picture">
                <img class="picture" src="{{ asset($product->image) }}">
                <a href="" class="link">Скачать вырезку из каталога</a>
            </div>

            <div class="product__info">
                <h2>{{ $product->title }}</h2>
                <span>{{ $product->category->title }}</span>
                <h3>Серия {{ $product->vendor }}</h3>

                <table class="table table-bordered">
                    <tr>
                        <th>Артикул</th>
                        <th>Цена</th>
                        <th>Количество</th>
                    </tr>

                    <tr>
                        <td>{{ $product->vendor}}</td>
                        <td>{{ $product->price->getValue() }}</td>
                        <td>55 шт</td>
                    </tr>



                </table>

            </div>

        </div>
    </div>
</div>

@endsection
