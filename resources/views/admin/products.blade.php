@extends('admin.layouts.app')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Price</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Артикул</th>
                        <th>Цена</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)

                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><a href="{{ route('product.show', ['product' => $product]) }}">{{ $product->vendor }}</a></td>
                            <td>{{ $product->price?$product->price->getValue():''}}</td>
                            <td><a href="" class="delete" data-href=" {{ route('product.destroy', ['id' => $product->id]) }} ">Удалить</a></td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
