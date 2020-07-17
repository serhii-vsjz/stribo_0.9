@extends('admin.layouts.app')

@section('content')

    <div class="upload">
        <form action="{{ route('admin.products.upload') }}" enctype="multipart/form-data" method="POST" >
            @csrf
            <label>Загрузить категории с Excel файла</label>
            <input type="file" name="excel">
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduct">
        Добавить продукт
    </button>

    @include('admin.products-table')

    <!-- Delete script -->
    <script>
        $('#tbody').on('click','.delete',function(e){

            e.preventDefault();

            var url = $(this).data('href');

            var el = $(this).parents('tr');

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



@endsection
