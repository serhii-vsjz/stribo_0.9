<!-- Sidebar -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Stribo</h3>
    </div>

    <ul class="list-unstyled components">
        <li class="active">
            <a href="#ProductSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Контент</a>
            <ul class="collapse list-unstyled" id="ProductSubmenu">
                <li>
                    <a href="{{ route('admin.categories') }}">Категории</a>
                </li>
                <li>
                    <a href="{{ route('admin.products') }}">Продукты</a>
                </li>
                <li>
                    <a href="{{ route('admin.uploads') }}">Загрузка</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#PriceSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Учет</a>
            <ul class="collapse list-unstyled" id="PriceSubmenu">
                <li>
                    <a href="{{ route('admin.products') }}">Продукты</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#PriceSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Цены</a>
            <ul class="collapse list-unstyled" id="PriceSubmenu">
                <li>
                    <a href="{{ route('admin.products') }}">Продукты</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
            </ul>
        </li>

    </ul>
</nav>
