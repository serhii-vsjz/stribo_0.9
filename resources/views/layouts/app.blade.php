<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stribo</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <meta name="google-site-verification" content="sRYLW56TPQHIWD7zzKuKDY6YbgbPFUdRdEA3rm92ViM" />
</head>
<body>
    @include('layouts.header')
    @include('layouts.contacts')

    <div class="main">
        <div class="container">
            @yield('content')
        </div>
    </div>

    @include('layouts.footer')


    <script type="text/javascript" src="{{ url('https://code.jquery.com/jquery-3.4.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

