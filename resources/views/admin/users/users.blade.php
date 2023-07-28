@php
    use App\Models\Group;
@endphp

@extends('index')

@section('title', 'Пользователи')

@section('content')
    <main class="main container">
        <section class="panel-list-block block">
            <h1 class="panel-list-block__heading heading">Все пользователи</h1>
            <a href="{{ route('create-user') }}" class="panel-list-block__create-btn btn">+ Создать нового пользователя</a>
            <div class="panel-list-block__panel-list">
                @foreach($users as $user)
                    <div class="panel-list__panel-item">
                        <a href="{{ route('user-profile', $user->id) }}" class="panel-item__info">{{ $user->surname }} {{ $user->name }}, {{ Group::find($user->group_id)->name}}</a>
                        <div class="panel-item__manage-btns">
                            <a href="{{ route('update-user', $user->id) }}" class="manage-btns__btn btn">Изменить</a>
                            @if(auth()->user()->id != $user->id)
                                <a href="{{ route('delete-user', $user->id) }}" class="manage-btns__btn btn">Х</a>
                            @else
                                <a href="#" class="manage-btns__btn btn">Х</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
