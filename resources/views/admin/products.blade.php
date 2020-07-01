@extends('admin.layouts.app')

@section('content')
{{--

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
--}}


<div class="upload">
    <form action="{{ route('admin.products.upload') }}" enctype="multipart/form-data" method="POST" >
        @csrf
        <label>Загрузить товары с Excel файл</label>
        <input type="file" name="excel">
        <input type="submit">
    </form>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $currentCategory!=''?$currentCategory->title:"Все продукты" }}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">


            {{--From this point, the display of all product characteristics tables begins--}}

            @foreach($attributesByGroups as $tableName => $attributes)
                <table class="table">
                    <caption>{{ __($tableName) }}</caption>
                    <tr>
                        <td>
                            {{ __('Vendor') }}
                        </td>
                        @foreach($attributes as $attribute)
                            <td>
                                {{ $attribute->name }}
                            </td>
                        @endforeach
                    </tr>

                    @foreach($products as $product)
                        <tr>
                            <td>
                                {{ $product->vendor }}
                            </td>
                            @foreach($attributes as $attribute)
                                <td>
                                    @if($product->getAttributeValueById($attribute->id))
                                        {{ $product->getAttributeValueById($attribute->id) }}
                                    @else
                                        -
                                    @endif
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            @endforeach

            {{--
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Категория</th>
                    <th>Артикул</th>
                    <th>Цена</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr id="product">
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->category->title}}</td>
                        <td>{{ $product->vendor }}</td>
                        <td>{{ $product->vendor }}</td>
                        <td id="plus">
                            +
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            --}}
        </div>
    </div>
</div>

@endsection
