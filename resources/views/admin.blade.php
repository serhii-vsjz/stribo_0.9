<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin panel</title>
</head>
<body>
<a href="{{ route('Category.index') }}">
    Показать все категории
</a>

<br>
<a href="{{ route('Category.create') }}">
    Создать категорию
</a>

</body>
</html>
