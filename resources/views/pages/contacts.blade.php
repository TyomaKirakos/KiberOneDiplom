@extends('index')

@section('title', 'Контакты')

@section('content')
    <main class="main container">
        <div class="contacts-block block">
            <h1 class="contacts-block__heading heading">Контакты</h1>
            <div class="contacts-block__contacts-list">
                <div class="contacts-list__contact-item">
                    <p class="contact-item__contact-label just-text">Номер телефона</p>
                    <a href="tel:+79671993307" class="contact-item__contact-info">+7 967 199-33-07</a>
                </div>
                <div class="contacts-list__contact-item">
                    <p class="contact-item__contact-label just-text">Электронная почта</p>
                    <a href="mailto:s.posad@kiber-one.com" class="contact-item__contact-info">s.posad@kiber-one.com</a>
                </div>
                <div class="contacts-list__contact-item">
                    <p class="contact-item__contact-label just-text">Адрес</p>
                    <p class="contact-item__contact-info">г. Сергиев Посад, ул. Пионерская, д.6, офис 306А БЦ "Александрийский дом"</p>
                </div>
            </div>
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A7cceabce1ae424c597aa4834a8420431365ec22709fcff50b01a7140e12ec3e9&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
    </main>
@endsection
