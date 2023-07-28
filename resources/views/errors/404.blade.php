@extends('index')

@section('title', 'Ошибка')

@section('content')
    <main class="main container">
        <div class="info-block block">
            <p class="info-block__heading">Ошибка :(</p>
            <p class="info-block__subheading">Такой страницы не существует</p>
            <a href="{{ route('main') }}" class="info-block__link">На главную</a>
        </div>
    </main>
@endsection
