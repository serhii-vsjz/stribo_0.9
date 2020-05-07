@extends('layouts.app')

@section('content')

    @include('category._navigate')

<div class="main__products">
    <img class="image" src="{{ asset($currentCategory->image) }}" alt="">
    <h2>{{ $currentCategory->title }}</h2>
    <h3>{{ $currentCategory->vender }}</h3>
        <table class="table">
            <tr>
                <td>Наименование</td>
                <td>Артикул</td>
                <td>Цена</td>
                <td>Кол-во</td>
                <td>Добавить</td>
            </tr>

                @foreach($products as $product)

                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->vendor }}</td>
                        <td>22.50</td>
                        <td>
                            <form class="form">
                                <input type="text" name="count">
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('product.show', ['product' => $product]) }}">
                                <img class="picture" src="{{ asset('img/add.png') }}">
                            </a>
                        </td>
                    </tr>

                @endforeach
            @can('is_admin')
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->vendor }}</td>
                    <td>22.50</td>
                    <td>
                        <form class="form">
                            <input type="text" name="count">
                        </form>
                    </td>
                    <td>
                        <a class="link" href="{{ route('product.create', ['category' => $currentCategory])}}">
                            <img class="picture" src="{{ asset('img/add.png') }}">
                        </a>
                    </td>
                </tr>
            @endcan


        </table>

    {{--@can('is_admin')
        <div class="form_action">
            <form class="form" action="{{ route('product.create', ['category' => $product]) }}" method="GET">
                @csrf

                <button class="btn btn-edit" type="submit">Добавить</button>
            </form>

            <form class="form" action="{{ route('product.edit', ['product' => $product]) }}" method="GET">
                @csrf
                <button class="btn btn-edit" type="submit">Изменить</button>
            </form>

            <form class="form" action="{{ route('product.destroy', ['product' => $product]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button  class="btn btn-delete" type="submit">Удалить</button>
            </form>
        </div>
    @endcan--}}

</div>

@endsection

