@extends('layouts.app')

@section('content')

    <div class="main">
        <div class="container">
            <div class="category__create">
                <h1>Редактировать продукт</h1>

                <form action="{{ route('product.update', ['product' => $product]) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')

                    @include('category._form')

                    <div class="form-group">
                        <label for="title">Название продукта</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $product->title }}">
                    </div>

                    <div class="form-group">
                        <label for="title">Код продукта</label>
                        <input type="text" name="vendor" id="vendor" class="form-control" value="{{ $product->vendor??'' }}">
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
