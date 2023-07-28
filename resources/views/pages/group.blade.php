@extends('index')

@section('title', $group->name)

@section('content')
    <main class="main container">
        <section class="group-block block">
            <h1 class="group-block__heading heading">{{ $group->name }}</h1>
                @if(count($students) != 0)
                    <ol class="group-block__members-list">
                        @foreach($students as $student)
                            <li class="members-list__member-item just-text">
                                @if(auth()->user()->role == 'менеджер')
                                    <a href="{{ route('user-profile', $student->id) }}">{{ $student->surname }} {{ $student->name }}, {{ date('d.m.Y', strtotime($student->birthdate)) }}</a>
                                @elseif(auth()->user()->role == 'тьютор')
                                    <a href="{{ route('student-profile', $student->id) }}">{{ $student->surname }} {{ $student->name }}, {{ date('d.m.Y', strtotime($student->birthdate)) }}</a>
                                @else
                                    <p>{{ $student->surname }} {{ $student->name }}, {{ date('d.m.Y', strtotime($student->birthdate)) }}</p>
                                @endif
                            </li>
                        @endforeach
                    </ol>
                @else
                    <p class="members-list__members-msg msg">В группе нет учеников</p>
                @endif
        </section>
        <section class="homework-block block">
            <h1 class="homework-block__heading heading">Д/З</h1>
            @if($group->homework)
                <p class="homework-block__homework msg">{{ $group->homework }}</p>
            @else
                <p class="homework-block__homework msg">Домашнего задания нет</p>
            @endif
            @if(auth()->user()->role == 'тьютор')
                <a href="{{ route('change-homework', $group->id) }}" class="homework-block__btn btn">Редактировать Д/З</a>
            @endif
        </section>
    </main>
@endsection
