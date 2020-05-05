@extends('layouts.app')

@section('content')

    @include('category._navigate')

<div class="main__content">

    @foreach($products as $product)
    <div class="card">
        <h2 class="title">{{ $product->title }}</h2>
        <h3 class="title">{{ $product->vendor }}</h3>
        <a href="{{ route('product.show', ['product' => $product]) }}">
            <img class="picture" src="{{ asset($product->image) }}">
        </a>
        <div class="form_action">
            <form class="form" action="{{ route('product.create', ['category' => $product]) }}" method="GET">
                @csrf

                <button class="btn btn-edit" type="submit">Добавить</button>
            </form>

            <form class="form" action="{{ route('product.edit', ['product' => $product]) }}" method="GET">
                @csrf
                <button class="btn btn-edit" type="submit">Изменить</button>
            </form>

            <form class="form" action="{{ route('product.destroy', ['product' => $product]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button  class="btn btn-delete" type="submit">Удалить</button>
            </form>
        </div>
    </div>
    @endforeach
    @can('is_admin')
        <div class="card">
            <a class="link" href="{{ route('product.create', ['category' => $currentCategory])}}">

                <img class="picture" src="{{ asset('img/add.png') }}">
                <h2 class="title">Добавить</h2>

            </a>
        </div>
    @endcan
</div>

@endsection

