<!-- Сообщаем браузеру как стоит обрабатывать эту страницу -->
<!doctype html>
<!-- Оболочка документа, указываем язык содержимого -->
<html lang="ru">
<!-- Заголовок страницы, контейнер для других важных данных (не отображаеться)-->
<head>
    <!-- Заголовок страницы в браузере -->
    <title>Gurger</title>
    <!-- Подключаем CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Кодировка страницы -->
    <meta charset="UTF-8">
    <!-- Адаптив -->
    <meta name="viewport" content="width=device-width">
</head>
<!-- Отображаем тело страницы -->
<body>
<!-- Оболочка для демонстрации -->
<div class="wrapper">
    <!-- Контент -->
    <header class="header">
        <div class="container">
            <div class="header__body">
                <a href="#" class="header__logo">
                    <img src="img/logo.jpg" alt="">
                </a>
                <div class="header__burger">
                    <span></span>
                </div>
                <nav class="header__menu">
                    <ul class="header__list">
                        <li>
                            <a href="" class="header__link">Главная</a>
                        </li>
                        <li>
                            <a href="" class="header__link">Товары</a>
                        </li>
                        <li>
                            <a href="" class="header__link">Оборудование</a>
                        </li>
                        <li>
                            <a href="" class="header__link">Контакты</a>
                        </li>
                        <li>
                            <a href="" class="header__link">О нас</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <div class="main">
        <div class="container">
            <div class="main__content">

                @for($i = 0; $i < 12; $i++)
                <div class="card">
                    <h2 class="title">Блоки подготовки</h2>
                    <a href="#">
                        <img class="picture" src="{{ asset('img/adv.png') }}">
                    </a>
                    <p class="vendor">some text</p>
                </div>
                @endfor

            </div>
        </div>
    </div>
    <footer class="footer">
        <span>
            jzik studio
        </span>
    </footer>

</div>

<script type="text/javascript" src="{{ url('https://code.jquery.com/jquery-3.4.1.slim.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
