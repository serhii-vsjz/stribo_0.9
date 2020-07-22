@extends('admin.layouts.app')
@section('content')

<div class="upload">
    <form action="{{ route('admin.products.upload') }}" enctype="multipart/form-data" method="POST" >
        @csrf
        <label>Загрузить категории с Excel файла</label>
        <input type="file" name="excel">
        <input type="submit">
    </form>
</div>

<h1>Список продуктов</h1>

<div class='row'>
    <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#addArticle">
        Добавить продукт
    </button>
</div>

<br />

<div class='row @if(count($products)!= 0) show @else hidden @endif' id='articles-wrap'>
    <table class="table table-striped ">
        <thead>
        <tr>
            <th>ID</th>
            <th>Артикул</th>
            <th>Действие</th>
        </tr>
        </thead>

        <tbodpry>
        @foreach($products as $product)

            <tr>
                <td>{{ $product->id }}</td>
                <td><a href="{{ route('product.show', ['product' => $product]) }}">{{ $product->vendor }}</a></td>
                <td><a href="" class="delete" data-href=" {{ route('product.destroy', ['id' => $product->id]) }} ">Удалить</a></td>
            </tr>

        @endforeach
        </tbodpry>

    </table>
</div>

<div class="row">
    <div class="alert alert-warning @if(count($products) != 0) hidden @else show @endif" role="alert"> Записей нет</div>
</div>

<!-- Modal -->
<div class="modal fade" id="addArticle" tabindex="-1" role="dialog" aria-labelledby="addArticleLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addArticleLabel">Добавление товара</h4>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="category">Категория</label>
                    <input type="text" class="form-control" id="category">
                </div>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="vendor">Артикул</label>
                    <textarea class="form-control" id="vendor"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" id="save" class="btn btn-primary">Сохранить</button>
            </div>

        </div>
    </div>
</div>




@endsection
