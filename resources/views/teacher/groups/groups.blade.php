@extends('index')

@section('title', 'Группы')

@section('content')
    <main class="main container">
        <section class="panel-list-block block">
            <h1 class="panel-list-block__heading heading">Все группы</h1>
            <div class="panel-list-block__panel-list">
                @if(count($groups) != 0)
                    @foreach($groups as $group)
                        <div class="panel-list__panel-item">
                            <a href="{{ route('group-page', $group->id) }}" class="panel-item__info">{{ $group->name }}</a>
                            <div class="panel-item__manage-btns">
                                <a href="{{ route('change-homework', $group->id) }}" class="manage-btns__btn btn">Д/З</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="panel-list-block__panel-msg msg">Групп нет</p>
                @endif
            </div>
        </section>
    </main>
@endsection
