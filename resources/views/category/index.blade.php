@extends('layouts.app')

@section('content')
<h1>Все категории</h1>
<div class="wrapper">
    <div class="main">
        <div class="container">
            <div class="main__content">
                @foreach($categories as $category)
                    <div class="card">
                        <h2 class="title">{{ $category->title }}</h2>
                        <a href="{{ route('Category.show', ['Category' => $category]) }}">
                            <img class="picture" src="{{ asset($category->image) }}">
                        </a>
                        <div class="form_action">
                            <form class="form" action="{{ route('Category.edit', ['Category' => $category]) }}" method="GET">
                                @csrf
                                <button class="btn btn-edit" type="submit">Редактировая</button>
                            </form>

                            <form class="form" action="{{ route('Category.destroy', ['Category' => $category]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button  class="btn btn-delete" type="submit">Удалить</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
