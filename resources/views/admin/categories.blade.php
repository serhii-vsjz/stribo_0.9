@extends('admin.layouts.app')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

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
                    <th>Title</th>
                    <th>Vendor</th>
                    <th>Image</th>
                    <th>Drawing</th>
                    <th>Active</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>
                            <a href="{{ route('admin.category.show', ['category' => $category]) }}">{{ $category->title }}</a>
                        </td>

                        <td>{{ $category->vendor }}</td>
                        <td>
                            <img style="height: 10%" src="{{ asset($category->image) }}">
                        </td>
                        <td>
                            <img style="height: 10%" src="{{ asset($category->drawing) }}">
                        </td>
                        <td>
                            {{ $category->active }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
