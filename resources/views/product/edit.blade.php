@extends('layouts.app')

@section('content')

<h1>Редактировать продукт</h1>

<form action="{{ route('product.update', ['product' => $product]) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <label for="category_id">Родительская категория</label>
    <select name="category_id">
        @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->title }}</option>
        @endforeach
    </select>
    <input type="text" name="title" value="{{ $product->title }}">
    <input type="text" name="vendor" value="{{ $product->vendor }}">
    <br>
    <img style="width: 200px" class="picture" src="{{ asset($product->image) }}">
    <br>
    <input type="file" name="image">
    <button type="submit">Сохранить изменения</button>
</form>

@endsection
