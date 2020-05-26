@extends('layouts.app')

@section('content')

    @include('category._navigate')

<div class="main__products">
    <img class="image" src="{{ asset($currentCategory->image) }}" alt="">
    <h2>{{ $currentCategory->title }}</h2>
    <h3>{{ $currentCategory->vender }}</h3>
        <table class="table">
            <tr>
                <td>Артикул</td>
                <td>Цена</td>
            </tr>

                @foreach($products as $product)

                    <tr>
                        <td>{{ $product->vendor }}</td>
                        <td>{{$product->price->price??'-'}}</td>
                    </tr>

                @endforeach

        </table>

</div>

@endsection

