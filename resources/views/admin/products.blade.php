<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Список статей</title>

    <!-- Bootstrap -->

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->

</head>

<body>

<div class="container">

    <h1>Список статей</h1>

    <div class='row'>

        <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#addArticle">

            Добавить статью

        </button>

    </div>

    <br />

    <div class='row @if(count($products)!= 0) show @else hidden @endif' id='articles-wrap'>

        <table class="table table-striped ">

            <thead>

            <tr>

                <th>ID</th>

                <th>Заголовок</th>

                <th></th>

            </tr>

            </thead>

            <tbody>

            @foreach($products as $product)

                <tr>

                    <td>{{ $product->id }}</td>

                    <td><a href="{{ route('product.show', ['product' => $product]) }}">{{ $product->vendor }}</a></td>

                    <td><a href="" class="delete" data-href=" {{ route('product.destroy', ['id' => $product->id]) }} ">Удалить</a></td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

    <div class="row">

        <div class="alert alert-warning @if(count($products) != 0) hidden @else show @endif" role="alert"> Записей нет</div>

    </div>

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



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src={{ asset("https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js") }}></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="{{ asset('js/bootstrap.js') }}"></script>

<script>

    $(function() {

        $('#save').on('click',function(){

            let category = $('#category').val();

            let vendor = $('#vendor').val();

            $.ajax({

                url: '{{ route('product.store') }}',

                type: "POST",

                data: {category:category,vendor:vendor},

                headers: {

                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')

                },

                success: function (data) {

                    $('#addArticle').modal('hide');

                    $('#articles-wrap').removeClass('hidden').addClass('show');

                    $('.alert').removeClass('show').addClass('hidden');

                    var str = '<tr><td>'+data['id']+

                        '</td><td><a href="/product/'+data['id']+'">'+data['vendor']+'</a>'+

                        '</td><td><a href="/product/'+data['id']+'" class="delete" data="'+data['id']+'">Удалить</a></td></tr>';

                    $('.table > tbody:last').append(str);

                },

                error: function (msg) {

                    alert('Ошибка');

                }

            });

        });

    });

    $('body').on('click','.delete',function(e){

        e.preventDefault();

        let url = $(this).data('href');

        let el = $(this).parents('tr');

        $.ajax({
            url: url,
            type: "DELETE",
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {

                el.detach();
            },
            error: function (msg) {
                alert('Ошибка');
            }
        });
    });

</script>


</body>

</html>
