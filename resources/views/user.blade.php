@extends('layouts.app')

@section('content')
    <div class="main__content">
        <h2>Личный кабинет</h2>
        @can('is_admin')
            <h3>Админ</h3>
        @else
            <h3>Пользователь</h3>
        @endcan
    </div>
@endsection
