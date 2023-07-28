@php
    use App\Models\Group;
@endphp

@extends('index')

@section('title', 'Профиль')

@section('content')
    <main class="main container">
        <section class="profile-block block">
            <h1 class="profile-block__heading heading">Профиль</h1>
            <div class="profile-block__profile-card profile-card">
                <img src="../../../../public/assets/img/profile/user.svg" alt="Профиль" class="profile-card__img">
                <div class="profile-card__profile-info">
                    <div class="profile-info__profile-info-part">
                        <div class="profile-info-part__info-item">
                            <p class="info-item__label just-text">Фамилия</p>
                            <p class="info-item__info">{{ $student->surname }}</p>
                        </div>
                        <div class="profile-info-part__info-item">
                            <p class="info-item__label just-text">Имя</p>
                            <p class="info-item__info">{{ $student->name }}</p>
                        </div>
                        <div class="profile-info-part__info-item">
                            <p class="info-item__label just-text">Дата рождения</p>
                            <p class="info-item__info">{{ date('d.m.Y', strtotime($student->birthdate)) }}</p>
                        </div>
                        <div class="profile-info-part__info-item">
                            <p class="info-item__label just-text">Пол</p>
                            <p class="info-item__info">{{ $student->gender }}</p>
                        </div>
                    </div>
                    <div class="profile-info__profile-info-part">
                        <div class="profile-info-part__info-item">
                            <p class="info-item__label just-text">Кибероны</p>
                            <p class="info-item__info">{{ $student->money }} К</p>
                        </div>
                        <div class="profile-info-part__info-item">
                            <p class="info-item__label just-text">Статус</p>
                            <p class="info-item__info">{{ $student->role }}</p>
                        </div>
                        <div class="profile-info-part__info-item">
                            <p class="info-item__label just-text">Группа</p>
                            <a href="{{ route('group-page', $student->group_id) }}" class="info-item__info-link">{{ Group::find($student->group_id)->name}}</a>
                        </div>
                        <div class="profile-info-part__info-item">
                            <p class="info-item__label just-text">Контакты</p>
                            <p class="info-item__info">{{ $student->contact }}</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('change-money', $student->id) }}" class="profile-card__logout-btn btn">Кибероны</a>
            </div>
        </section>
        <section class="homework-block block">
            <h1 class="homework-block__heading heading">Д/З</h1>
            @if(Group::find($student->group_id)->homework)
                <p class="homework-block__homework msg">{{ Group::find($student->group_id)->homework }}</p>
            @else
                <p class="homework-block__homework msg">Домашнего задания нет</p>
            @endif
        </section>
    </main>
@endsection

