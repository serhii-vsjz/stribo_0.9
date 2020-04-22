<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<header class="contact">
    <div class="container">
        <div class="contact__body">
            <div class="contact__left">
                <div class="mail">
                    <span>pneumo.sales@gmail.com</span>
                </div>
                <div class="phone">
                    050 055 777 5
                </div>
            </div>
            <div class="login__right">
                <div class="login">
                    <!-- Authentication Links -->
                    @guest
                        <a href="{{ route('login') }}">Войти</a>
                    @else
                        <form action="" method="POST">
                            @csrf
                            <button type="submit" formaction="{{ route('user') }}" formmethod="GET">{{ Auth::user()->name }}</button>
                            <br>
                            <button type="submit" formaction="{{ route('logout') }}">Выйти</button>
                        </form>
{{--                        <a href="{{ route('logout') }}">{{ Auth::user()->name }}</a>--}}
                    @endguest

                </div>

            </div>

        </div>
    </div>
</header>


