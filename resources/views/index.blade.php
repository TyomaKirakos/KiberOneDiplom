<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Главная страница')</title>
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <script src="/public/assets/js/burger.js" defer></script>
    @yield('js')
</head>
<body>
<header class="header">
    <div class="header__content container">
        <a href="{{ route('main') }}" class="header__logo">
            <img src="/public/assets/img/logo.svg" alt="KIBERone" class="logo__img">
        </a>
        <nav class="header__nav nav">
            <a href="{{ route('main') }}" class="nav__item">Главная</a>
            <a href="{{ route('contacts') }}" class="nav__item">Контакты</a>
            <a href="{{ route('catalog') }}" class="nav__item">Каталог</a>
            <a href="{{ route('payment') }}" class="nav__item">Оплата</a>
            @guest
                <a href="{{ route('login') }}" class="nav__item">Вход</a>
            @endguest
            @auth
                @if(auth()->user()->role == 'менеджер')
                    <div class="nav__item nav__dropdown-item">
                        <p class="nav__item">Админ-панель</p>
                        <div class="dropdown-item__dropdown-content">
                            <a class="nav__item dropdown-content__item" href="{{ route('users-panel') }}">Пользователи</a>
                            <a class="nav__item dropdown-content__item" href="{{ route('groups-panel') }}">Группы</a>
                            <a class="nav__item dropdown-content__item" href="{{ route('applications-panel') }}">Заявки</a>
                            <a class="nav__item dropdown-content__item" href="{{ route('products-panel') }}">Товары</a>
                        </div>
                    </div>
                @endif
                @if(auth()->user()->role == 'тьютор')
                    <div class="nav__item nav__dropdown-item">
                        <p class="nav__item">Тьютор-панель</p>
                        <div class="dropdown-item__dropdown-content">
                            <a class="nav__item dropdown-content__item" href="{{ route('students-list') }}">Пользователи</a>
                            <a class="nav__item dropdown-content__item" href="{{ route('groups-list') }}">Группы</a>
                        </div>
                    </div>
                @endif
                <a href="{{ route('profile') }}" class="nav__item">Профиль</a>
                <a href="{{ route('logout') }}" class="nav__item">Выход</a>
            @endauth
        </nav>
        <div class="header__burger-btn">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</header>
@yield('content')
<footer class="footer">
    <div class="footer__content container">
        <a href="#" class="footer__logo">
            <img src="/public/assets/img/logo.svg" alt="KIBERone" class="logo__img">
        </a>
        <nav class="footer__nav nav">
            <a href="{{ route('main') }}" class="nav__item">Главная</a>
            <a href="{{ route('contacts') }}" class="nav__item">Контакты</a>
            <a href="{{ route('catalog') }}" class="nav__item">Каталог</a>
            <a href="{{ route('payment') }}" class="nav__item">Оплата</a>
        </nav>
        <p class="footer__copyright">© Все права защищены</p>
    </div>
</footer>
</body>
{{--Бургер меню--}}
<div class="burger-bg">
    <div class="burger">
        <div class="burger__content">
            <button class="burger__close-btn">X</button>
            <nav class="burger__burger-nav nav">
                <a href="{{ route('main') }}" class="burger-nav__item just-text">Главная</a>
                <a href="{{ route('contacts') }}" class="burger-nav__item just-text">Контакты</a>
                <a href="{{ route('catalog') }}" class="burger-nav__item just-text">Каталог</a>
                <a href="{{ route('payment') }}" class="burger-nav__item just-text">Оплата</a>
                @guest
                    <a href="{{ route('login') }}" class="burger-nav__item just-text">Вход</a>
                @endguest
                @auth
                    @if(auth()->user()->role == 'менеджер')
                        <p class="burger-nav__item burger-nav__category just-text">Админ-панель</p>
                        <a class="burger-nav__item burger-nav__subitem" href="{{ route('users-panel') }}">Пользователи</a>
                        <a class="burger-nav__item burger-nav__subitem" href="{{ route('groups-panel') }}">Группы</a>
                        <a class="burger-nav__item burger-nav__subitem" href="{{ route('applications-panel') }}">Заявки</a>
                        <a class="burger-nav__item burger-nav__subitem" href="{{ route('products-panel') }}">Товары</a>
                    @endif
                    @if(auth()->user()->role == 'тьютор')
                            <p class="burger-nav__item burger-nav__category just-text">Тьютор-панель</p>
                            <a class="burger-nav__item burger-nav__subitem" href="{{ route('students-list') }}">Пользователи</a>
                            <a class="burger-nav__item burger-nav__subitem" href="{{ route('groups-list') }}">Группы</a>

                    @endif
                    <a href="{{ route('profile') }}" class="burger-nav__item just-text">Профиль</a>
                    <a href="{{ route('logout') }}" class="burger-nav__item just-text">Выход</a>
                @endauth
            </nav>
        </div>
    </div>
</div>
</html>
