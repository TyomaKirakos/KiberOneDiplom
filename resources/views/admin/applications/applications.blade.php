@extends('index')

@section('title', 'Заявки')

@section('content')
    <main class="main container">
        <section class="applications-list-block block">
            <h1 class="applications-list-block__heading heading">Новые заявки</h1>
            <div class="applications-list-block__applications-list">
                @if(count($new_applications) != 0)
                    @foreach($new_applications as $new_application)
                        <div class="applications-list__application">
                            <div class="application__application-info-block">
                                <p class="application-info-block__application-label just-text">ФИО</p>
                                <p class="application-info-block__application-info just-text">{{ $new_application->fullname }}</p>
                            </div>
                            <div class="application__application-info-block">
                                <p class="application-info-block__application-label just-text">Телефон</p>
                                <p class="application-info-block__application-info just-text">{{ $new_application->phone }}</p>
                            </div>
                            <div class="application__application-info-block">
                                <p class="application-info-block__application-label just-text">Дата и время</p>
                                <p class="application-info-block__application-info just-text">{{ date('d.m.Y H:i', strtotime($new_application->created_at)) }}</p>
                            </div>
                            <a href="{{ route('handle-application', $new_application->id) }}" class="application__handle-btn btn">Обработать</a>
                        </div>
                    @endforeach
                @else
                    <p class="applications-list__application-msg msg">Новых заявок нет</p>
                @endif
            </div>
        </section>
        <section class="applications-list-block block">
            <h1 class="applications-list-block__heading heading">Обработанные заявки</h1>
            <div class="applications-list-block__applications-list">
                @if(count($handled_applications) != 0)
                    @foreach($handled_applications as $handled_application)
                        <div class="applications-list__application">
                            <div class="application__application-info-block">
                                <p class="application-info-block__application-label just-text">ФИО</p>
                                <p class="application-info-block__application-info just-text">{{ $handled_application->fullname }}</p>
                            </div>
                            <div class="application__application-info-block">
                                <p class="application-info-block__application-label just-text">Телефон</p>
                                <p class="application-info-block__application-info just-text">{{ $handled_application->phone }}</p>
                            </div>
                            <div class="application__application-info-block">
                                <p class="application-info-block__application-label just-text">Дата и время</p>
                                <p class="application-info-block__application-info just-text">{{ date('d.m.Y H:i', strtotime($handled_application->created_at)) }}</p>
                            </div>
                            <a href="{{ route('delete-application', $handled_application->id) }}" class="application__delete-btn btn">Удалить</a>
                        </div>
                    @endforeach
                @else
                    <p class="applications-list__application-msg msg">Заявок нет</p>
                @endif
            </div>
        </section>
    </main>
@endsection
