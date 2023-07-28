@extends('index')

@section('title', 'Спасибо')

@section('content')
    <main class="main container">
        <div class="info-block block">
            <p class="info-block__heading">Спасибо за отправленную заявку!</p>
            <p class="info-block__subheading">Мы скоро с вами свяжемся</p>
            <a href="{{ route('main') }}" class="info-block__link">На главную</a>
        </div>
    </main>
@endsection
