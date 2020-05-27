@extends('layouts.app')

@section('content')

<div class="main">
    <div class="container">
        <div class="category__create">


            <form action="{{ route('category.store') }}" enctype="multipart/form-data" method="POST">
                <h1>Добавить новую категорию</h1>
                @csrf

                <div class="form-group">
                    <label for="title">Название категории</label>
                    <input type="text"  name="title" id="title" class="form-control">
                </div>

                @include('category._form')

                <div class="form-group">
                    <label for="file">Изображение</label>
                    <input type="file" name="file" id="file" class="input-file">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn">Создать</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
