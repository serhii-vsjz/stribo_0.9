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

                <table>
                    <tr>
                        <th>Артикул</th>
                        <th>Цена</th>
                        <th>Количество</th>
                    </tr>
                    @for($i=0;$i<5;$i++)
                        <tr>
                            <td>EPC 8-G02</td>
                            <td>22.5</td>
                            <td>$300</td>
                        </tr>
                    @endfor


                </table>

            </div>

        </div>
    </div>
</div>

@endsection
