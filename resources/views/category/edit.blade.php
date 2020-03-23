@extends('layouts.app')

@section('content')

<div class="main">
    <div class="container">
        <div class="category__create">
            <h1>Редактировать категорию</h1>

            <form action="{{ route('category.update', ['category' => $category]) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                @include('category._form')
                <button type="submit" class="btn">Изменить</button>
            </form>

        </div>
    </div>
</div>

@endsection
