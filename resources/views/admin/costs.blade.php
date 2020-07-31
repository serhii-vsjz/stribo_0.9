@extends('admin.layouts.app')

@section('content')
    <h1>Расходные материалы</h1>

    <table class="table table-responsive">
        <tr>
            <td>Название</td>
            <td>Цена</td>
        </tr>
        @foreach($costs as $cost)
        <tr>
            <td>{{ $cost->name}}</td>
            <td>{{ $cost->value}}</td>
        </tr>
        @endforeach
    </table>
@endsection
