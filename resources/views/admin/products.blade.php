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

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>CategoryId</th>
                        <th>Vendor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->category_id }}</td>
                            <td>{{ $category->vendor }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
