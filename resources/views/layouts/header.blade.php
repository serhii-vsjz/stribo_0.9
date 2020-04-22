<header class="header-top">
    <div class="container">
        <div class="header__body">
            <a href="{{ route('home') }}" class="header__logo">
                <img src="{{ asset('img/logo.jpg') }}" alt="">
            </a>

            <a href="tel:0500557775" class="header__contact">
                <img src="{{ asset('img/phone.jpg') }}" alt="">
            </a>

            <a href="viber://chat?number=%2B380500557775" class="header__contact">
                <img src="{{ asset('img/viber.jpg') }}" alt="">
            </a>

            <a href="mailto:pneumo.sales@gmail.com" class="header__contact">
                <img src="{{ asset('img/email.jpg') }}" alt="">
            </a>


            <nav class="header__menu">
                <ul class="header__list">
                    <li>
                        <a href="{{ route('home') }}" class="header__link">Главная</a>
                    </li>
                    <li>
                        <a href="{{ route('category.index') }}" class="header__link">Товары</a>
                    </li>
                    <li>
                        <a href="" class="header__link">Оборудование</a>
                    </li>
                    <li>
                        <a href="{{ route('contacts') }}" class="header__link">Контакты</a>
                    </li>
                    <li>
                        <a href="{{ route('about')}}" class="header__link">О нас</a>
                    </li>
                </ul>
            </nav>

            <div class="header__burger">
                <span></span>
            </div>

        </div>
    </div>
</header>


