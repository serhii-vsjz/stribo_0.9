@extends('layouts.app')

@section('content')

<div class="main__content">
    @foreach($products as $product)
    <div class="card">
        <h2 class="title">{{ $product->title }}</h2>
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
</div>

@endsection

