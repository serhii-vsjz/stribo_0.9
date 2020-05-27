@extends('layouts.app')

@section('content')

<div class="main">
    <div class="container">
        <div class="category__create">

            <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
                <h1>Добавить новый продукт </h1>
                @csrf

                <div class="form-group">
                    <label for="vendor">Артикул</label>
                    <input type="text"  name="vendor" id="vendor" class="form-control">
                </div>

                @include('category._form')

                <div class="form-group">
                    <label for="file">Изображение</label>
                    <input type="file" name="file" id="file" class="input-file">
                </div>

                <div class="form-group">
                    <label for="price">Цена</label>
                    <input type="text"  name="price" id="price" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn">Добавить</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection

