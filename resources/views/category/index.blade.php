@extends('layouts.app')

@section('content')
<div class="main__content">
@foreach($categories as $category)
    <div class="card">
        <h2 class="title">{{ $category->title }}</h2>
        <a href="{{ route('category.show', ['category' => $category]) }}">
            <img class="picture" src="{{ asset($category->image) }}">
        </a>


        @can('is_admin')
        <div class="form_action">

            <form class="form" action="{{ route('category.create', ['category' => $category]) }}" method="GET">
                @csrf
                <button class="btn btn-edit" type="submit">Категорию</button>
            </form>
            <form class="form" action="{{ route('product.create', ['category' => $category]) }}" method="GET">
                @csrf
                <button class="btn btn-edit" type="submit">Товар</button>
            </form>

            <form class="form" action="{{ route('category.edit', ['category' => $category]) }}" method="GET">
                @csrf
                <button class="btn btn-edit" type="submit">Изменить</button>
            </form>

            <form class="form" action="{{ route('category.destroy', ['category' => $category]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button  class="btn btn-delete" type="submit">Удалить</button>
            </form>
        </div>
        @endcan

    </div>
@endforeach
</div>

@endsection
