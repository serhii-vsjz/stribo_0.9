@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="main">
        <div class="container">
            <div class="main__content">
                <h1>Создать новый продукт </h1>
                <form action="{{ route('Product.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <label for="parent_id">Родительская категория</label>
                    <select name="parent_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{$category->title}}</option>
                        @endforeach
                    </select>
                    <input type="text" name="title" placeholder="title">
                    <input type="text" name="vendor" placeholder="vendor">
                    <input type="file" name="image">
                    <button type="submit">Добавить</button>
                </form>
                @endsection

            </div>
        </div>
    </div>
</div>
