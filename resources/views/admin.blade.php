@extends('layouts.app')

@section('content')
    <div class="container">
        <br><br>
        <br><br>
        <br><br>
        <hr>
        <a href="{{ route('category.index') }}">
            Показать все категории
        </a>

        <hr>
        <a href="{{ route('category.create') }}">
            Создать категорию
        </a>

        <hr>
        <a href="{{ route('product.index') }}">
            Показать все продукты
        </a>

        <hr>
        {{--<a href="{{ route('product.create') }}">--}}
        <a href="">
            Создать продукт
        </a>
    </div>
@endsection
