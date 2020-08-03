@extends('admin.layouts.app')

@section('content')
<div class="uploads">
    <h2>Загрузки</h2>

    <div class="upload">
        <form action="{{ route('admin.upload') }}" enctype="multipart/form-data" method="POST" >
            @csrf
            <label>Выберите файл для загрузки</label>
            <input type="file" name="excel">
            <select name="list" id="list">
                @foreach($list as $upload)
                <option value="{{ $upload }}">{{ $upload }}</option>
                @endforeach
            </select>
            <input type="submit">
        </form>
    </div>
{{--

    <div class="upload">
        <form action="{{ route('admin.products.upload') }}" enctype="multipart/form-data" method="POST" >
            @csrf
            <label>Товары с атрибутами</label>
            <input type="file" name="excel">
            <input type="submit">
        </form>
    </div>

    <div class="upload">
        <form action="{{ route('admin.priceCosts.upload') }}" enctype="multipart/form-data" method="POST" >
            @csrf
            <label>Товары + себестоимость</label>
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

    <div class="upload">
        <form action="{{ route('admin.services.upload') }}" enctype="multipart/form-data" method="POST" >
            @csrf
            <label>Услуги</label>
            <input type="file" name="excel">
            <input type="submit">
        </form>
    </div>

--}}
</div>


@endsection
