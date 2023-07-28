@extends('index')

@section('title', 'Группы')

@section('content')
    <main class="main container">
        <section class="panel-list-block block">
            <h1 class="panel-list-block__heading heading">Все группы</h1>
            <a href="{{ route('create-group') }}" class="panel-list-block__create-btn btn">+ Создать новую группу</a>
            <div class="panel-list-block__panel-list">
                @foreach($groups as $group)
                    <div class="panel-list__panel-item">
                        <a href="{{ route('group-page', $group->id) }}" class="panel-item__info">{{ $group->name }}</a>
                        <div class="panel-item__manage-btns">
                            @if($group->id == 1)
                                <a href="#" class="manage-btns__btn btn">Удалить</a>
                            @else
                                <a href="{{ route('delete-group', $group->id) }}" class="manage-btns__btn btn">Удалить</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection
