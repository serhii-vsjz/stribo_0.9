@extends('layouts.app')

@section('content')
    <div class="category__create">
        <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
            <h1 id="test">Добавить новый продукт </h1>
            @csrf

            <div class="form-group">
                <label for="vendor">Артикул</label>
                <input type="text"  name="vendor" id="vendor" class="form-control">
            </div>

            @include('category._form')

            <div class="form-group">
                <label for="price">Цена</label>
                <input type="text"  name="price" id="price" class="form-control">
            </div>

            <div class="form-group-double-wrap" id="int-wrap">
                <div class="form-group-double">

                    <input type="text" name="attribute[0]" class="form-control-double" placeholder="Атрибут">
                    <input type="text" name="value[0]" class="form-control-double" placeholder="Значение">

                </div>
            </div>

            <div id="add-attribute" class="form-group-add">+</div>

            <div class="form-group">
                <button type="submit" class="btn">Добавить</button>
            </div>


        </form>
    </div>
    <script>
        const add = document.getElementById('add-attribute')
        const wrap = document.getElementById('int-wrap')

        let id = 1

        add.onclick = () => {

            const group = document.createElement('div');
            group.className = 'form-group-double';
            wrap.appendChild(group);

            const el = document.createElement('input');

            el.name = `attribute[${id}]`;

            el.className = 'form-control-double';
            el.type = 'text';
            group.appendChild(el);
            el.focus();

            const el1 = document.createElement('input');

            el1.name = `value[${id}]`;
            el1.className = 'form-control-double';
            el1.type = 'text';
            group.appendChild(el1);
            id++;

        }
    </script>

@endsection

