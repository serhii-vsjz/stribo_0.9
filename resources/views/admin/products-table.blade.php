@extends('admin.layouts.app')

@section('content')

    <h1>Список продуктов</h1>

    <div class='row'>
        <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#addProduct">
            Добавить продукт
        </button>
    </div>

    <br />

    <div class='row @if(count($products)!= 0) show @else hidden @endif' id='articles-wrap'>

        <table class="table table-striped ">

            <thead>

            <tr>

                <th>ID</th>

                <th>Продукт</th>

                <th></th>

            </tr>

            </thead>

            <tbody>

            @foreach($products as $product)

                <tr>

                    <td>{{ $product->id }}</td>

                    <td><a href="{{ route('product.show', ['product' => $product->id]) }}">{{ $product->vendor }}</a></td>

                    <td><a href="" class="delete" data-href=" {{ route('product.destroy',$product->id) }} ">Удалить</a></td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

    <div class="row">

        <div class="alert alert-warning @if(count($products) != 0) hidden @else show @endif" role="alert"> Записей нет</div>

    </div>



<!-- Modal -->

<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addArticleLabel">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title" id="addArticleLabel">Добавление продукта</h4>

            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="category_id">category_id</label>
                    <input type="text" class="form-control" id="category_id">
                </div>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="vendor">vendor</label>
                    <textarea class="form-control" id="vendor"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" id ="save" class="btn btn-primary">Сохранить</button>
            </div>

        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script>

    $(function() {

        $('#save').on('click',function(){

            let category_id = $('#category_id').val();

            let vendor = $('#vendor').val();

            $.ajax({

                url: '{{ route('product.store') }}',
                type: "POST",
                data: {category_id:category_id,vendor:vendor},
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },

                success: function (data) {

                    $('#addProduct').modal('hide');

                    $('#articles-wrap').removeClass('hidden').addClass('show');

                    $('.alert').removeClass('show').addClass('hidden');

                    let str = '<tr><td>'+data['id']+

                        '</td><td><a href="/product/show/'+data['id']+'">'+data['vendor']+'</a>'+

                        '</td><td><a href="/product/'+data['id']+'" class="delete" data-delete="'+data['id']+'">Удалить</a></td></tr>';

                    $('.table > tbody:last').append(str);

                },

                error: function (msg) {

                    alert('Ошибка');

                }
            });
        });
    })

</script>

@endsection


