@extends('index')

@section('title', 'KIBERone')

@section('js')
    <script src="/public/assets/js/formValidation.js" defer></script>
@endsection

@section('content')
    <main class="main container">
        <section class="welcome-block">
            <div class="welcome-block__welcome-text">
                <h1 class="welcome-text__heading">KIBER ONE</h1>
                <p class="welcome-text__subheading">Цифровые технологии для<br>детей от 6 до 14 лет</p>
                <a href="#enroll-block" class="welcome-text__enroll-btn btn">Записаться</a>
            </div>
            <img src="public/assets/img/index/welcome.png" alt="Школа программирования для детей" class="welcome-block__img">
        </section>
        <section class="about-us-block block">
            <h2 class="about-us-block__heading heading">Кто мы?</h2>
            <div class="about-us-block__text-block">
                <p class="text-block__text just-text">KIBERone – не просто кибершкола будущих ИТ-специалистов, а первая в России Международная школа цифрового творчества для детей.</p>
                <p class="text-block__text just-text">Именно в у нас дети в возрасте с 6 до 14 лет учатся: читать и управлять кодами; проектировать свой город в Minecraft; получать навыки системного и стратегического мышления современными способами; владеть профессиональными инструментами, которые используют в Yandex, Mail, YouTube; создавать компьютерные игры, сайты и приложения для Web и Store; создавать мультфильмы и монтировать видео; пользоваться графическими редакторами и воплощать в жизнь идеи в области дизайна и даже общаться на английском языке – без этого сегодня никак!</p>
                <p class="text-block__text just-text">Наша миссия – замена бесполезного времяпрепровождения детей в гаджетах на полезное!</p>
            </div>
            <img src="public/assets/img/index/about.png" alt="KIBERone - крутая школа программирования" class="about-us-block__img">
        </section>
        <section class="reasons-block block">
            <h2 class="reasons-block__heading heading">Почему KIBERone?</h2>
            <ul class="reasons-block__reasons-list">
                <li class="reason-list__item">KIBERone признан ООН и ЮНЕСКО лучшим проектом в мире в сфере цифровых технологий для детей</li>
                <li class="reason-list__item">KIBERone – квалифицировано корпорацией Майкрософт</li>
                <li class="reason-list__item">KIBERone – лучший проект в сфере цифровых технологий на территории Евросоюза с 2018 года</li>
                <li class="reason-list__item">Каждый ребёнок получает сертификат международного образца</li>
            </ul>
        </section>
        <section id="enroll-block" class="enroll-block block">
            <form action="" method="POST" class="enroll-block__enroll-form">
                @csrf
                <h2 class="enroll-form__heading">Хочешь учиться у нас?</h2>
                <p class="enroll-form__subheading">Оставляй заявку на бесплатный IT-квест!</p>
                <div class="enroll-form__input-block">
                    <label for="fullname" class="input-block__label">Ваше ФИО</label>
                    <input type="text" class="input-block__input enroll__fio-input" name="fullname" id="fullname" placeholder="Иванов Иван Иванович">
                    <p class="input-block__warning-text enroll__fio-warning-text"></p>
                </div>
                <div class="enroll-form__input-block">
                    <label for="phone" class="input-block__label">Ваш телефон</label>
                    <input type="text" class="input-block__input enroll__phone-input" name="phone" id="phone" placeholder="+79998887766">
                    <p class="input-block__warning-text enroll__phone-warning-text"></p>
                </div>
                <button type="submit" class="enroll-form__submit-btn btn">Записаться</button>
            </form>
        </section>
    </main>
@endsection
