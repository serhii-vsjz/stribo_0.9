@extends('admin.layouts.app')

@section('content')

    <div class="upload">
        <form action="{{ route('admin.products.upload') }}" enctype="multipart/form-data" method="POST" >
            @csrf
            <label>Товары</label>
            <input type="file" name="excel">
            <input type="submit">
        </form>
    </div>

    <div class="upload">
        <form action="{{ route('admin.categories.upload') }}" enctype="multipart/form-data" method="POST" >
            @csrf
            <label>Категории</label>
            <input type="file" name="excel">
            <input type="submit">
        </form>
    </div>

    <div class="upload">
        <form action="{{ route('admin.price.upload') }}" enctype="multipart/form-data" method="POST" >
            @csrf
            <label>Цены</label>
            <input type="file" name="excel">
            <input type="submit">
        </form>
    </div>
@endsection
