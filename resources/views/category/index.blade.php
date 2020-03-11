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

</body>
</html>
<ul>
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
                        <p class="vendor">some text</p>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</ul>
