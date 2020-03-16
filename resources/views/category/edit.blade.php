@extends('layouts.app')

@section('content')
<h1>Редактировать категорию</h1>

<form action="{{ route('Category.update', ['Category' => $edited_category]) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <label for="parent_id">Родительская категория</label>
    <select name="parent_id">
        @foreach($categories as $category)
            <option>{{ $category->id }}</option>
        @endforeach
    </select>
    <input type="text" name="title" value="{{ $edited_category->title }}">
    <input type="text" name="vendor" value="{{ $edited_category->vendor }}">
    <br>
    <img style="width: 200px" class="picture" src="{{ asset($edited_category->image) }}">
    <br>
    <input type="file" name="image">
    <button type="submit">Сохранить изменения</button>
</form>
@endsection
