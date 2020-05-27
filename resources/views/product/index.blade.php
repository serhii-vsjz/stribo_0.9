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

            @can('is_admin')
            <tr>

                <td colspan="2">+
                    <a href="{{ route('product.create', ['category' => $currentCategory]) }}">
                    </a>
                </td>

            </tr>
            @endcan
        </table>

</div>

@endsection

