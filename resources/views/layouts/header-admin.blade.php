<header class="header">
    <div class="container">
        <div class="header__body">
            <a href="#" class="header__logo">
                <img src="{{ asset('img/logo.jpg') }}" alt="">
            </a>
            <div class="header__burger">
                <span></span>
            </div>
            <nav class="header__menu">
                <ul class="header__list">
                    <li>
                        <a href="{{ route('Category.index')  }}" class="header__link">Категории</a>
                    </li>
                    <li>
                        <a href="{{ route('Category.create') }}" class="header__link">Создать категорию</a>
                    </li>
                    <li>
                        <a href="{{ route('Product.index') }}" class="header__link">Товары</a>
                    </li>
                    <li>
                        <a href="{{ route('Product.create') }}" class="header__link">Создать товар</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
