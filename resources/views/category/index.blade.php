<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <h1>Все категории</h1>
    <div class="wrapper">
        <div class="main">
            <div class="container">

                <div class="main__content">

                    @foreach($categories as $category)
                        <div class="card">
                            <h2 class="title">{{ $category->title }}</h2>
                            <a href="#">
                                <img class="picture" src="{{ asset($category->image) }}">
                            </a>

                            <form action="{{ route('Category.edit', ['Category' => $category]) }}" method="GET">
                                @csrf
                                <button type="submit">Редактировая</button>
                            </form>

                            <form action="{{ route('Category.destroy', ['Category' => $category]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Удалить</button>
                            </form>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>

