@extends('layouts.app')

@section('content')

    @include('category._navigate')

<div class="main__content">

@foreach($categories as $category)

    <div class="card {{ $category->active?'':'disabled' }}">
        <a class="link {{ $category->active?'':'disabled' }}" href="{{ route('category.show', ['category' => $category]) }}" >
            <h2 class="title">{{ $category->title }}</h2>

                <img class="picture" src="{{ asset($category->image) }}">
        </a>
        @can('is_admin')
        <div class="form_action">

            <form class="form" action="{{ route('category.create', ['category' => $category]) }}" method="GET">
                @csrf
                <button class="btn btn-edit" type="submit">Категорию</button>
            </form>
            <form class="form" action="{{ route('category.active', ['category' => $category]) }}" method="GET">
                @csrf
                <button class="btn btn-edit" type="submit">
                    {{ $category->active?'Скрыть':'Отобразить' }}
                </button>
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
@can('is_admin')
        <div class="card">
            <a class="link" href="{{ route('category.create', ['category' => $currentCategory])}}">

                <img class="picture" src="{{ asset('img/add.png') }}">
                <h2 class="title">Добавить</h2>

            </a>
        </div>
@endcan
</div>

@endsection
