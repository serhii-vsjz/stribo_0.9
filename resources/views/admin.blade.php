@extends('layouts.app-admin')

@section('content')
    <div class="container">
        <br><br>
        <br><br>
        <br><br>
        <a href="{{ route('Category.index') }}">
            Показать все категории
        </a>

        <hr>
        <a href="{{ route('Category.create') }}">
            Создать категорию
        </a>

        <hr>
        <a href="{{ route('Product.create') }}">
            Создать продукт
        </a>
    </div>
@endsection
