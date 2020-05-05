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

                <div class="form-group">
                    <label for="title">Название категории</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $category->title}}">
                </div>

                <div class="form-group">
                    <label for="file">Изображение</label>
                    <input type="file" name="file" id="file" class="input-file">
                </div>

                <button type="submit" class="btn">Сохранить изменения</button>

            </form>

        </div>
    </div>
</div>
@endsection
