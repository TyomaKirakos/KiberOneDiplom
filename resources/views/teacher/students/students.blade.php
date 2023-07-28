@php
    use App\Models\Group;
@endphp

@extends('index')

@section('title', 'Ученики')

@section('content')
    <main class="main container">
        <section class="panel-list-block block">
            <h1 class="panel-list-block__heading heading">Все ученики</h1>
            <div class="panel-list-block__panel-list">
                @if(count($students) != 0)
                    @foreach($students as $student)
                        <div class="panel-list__panel-item">
                            <a href="{{ route('student-profile', $student->id) }}" class="panel-item__info">{{ $student->surname }} {{ $student->name }}, {{ Group::find($student->group_id)->name}}</a>
                            <div class="panel-item__manage-btns">
                                <a href="{{ route('change-money', $student->id) }}" class="manage-btns__btn btn">Изменить</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="panel-list-block__panel-msg msg">Учеников нет</p>
                @endif
            </div>
        </section>
    </main>
@endsection
