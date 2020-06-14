@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" id="excel" name="excel">
            <button type="submit">Загрузить</button>
        </form>

        <hr>
        <a href="{{ route('category.index') }}">
            Показать все категории
        </a>


        <a href="{{ route('category.create') }}">
            Создать категорию
        </a>


        <a href="{{ route('product.index') }}">
            Показать все продукты
        </a>

        <a href="">
            Создать продукт
        </a>
    </div>
@endsection
