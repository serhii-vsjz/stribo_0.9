@extends('admin.layouts.app')

@section('content')
<div class="uploads">

    <div class="upload">
        <form action="{{ route('admin.categories.upload') }}" enctype="multipart/form-data" method="POST" >
            @csrf
            <label>Категории</label>
            <input type="file" name="excel">
            <input type="submit">
        </form>
    </div>

    <div class="upload">
        <form action="{{ route('admin.products.upload') }}" enctype="multipart/form-data" method="POST" >
            @csrf
            <label>Товары с атрибутами</label>
            <input type="file" name="excel">
            <input type="submit">
        </form>
    </div>

    <div class="upload">
        <form action="{{ route('admin.price.upload') }}" enctype="multipart/form-data" method="POST" >
            @csrf
            <label>Товары с ценами</label>
            <input type="file" name="excel">
            <input type="submit">
        </form>
    </div>

    <div class="upload">
        <form action="{{ route('admin.priceCosts.upload') }}" enctype="multipart/form-data" method="POST" >
            @csrf
            <label>Себестоимость</label>
            <input type="file" name="excel">
            <input type="submit">
        </form>
    </div>

</div>
@endsection
