@extends('index')

@section('title', 'Редактирование пользователя')

@section('js')
    <script src="/public/assets/js/deleteWarnings.js" defer></script>
@endsection

@section('content')
    <main class="main container">
        <section class="auth-block block">
            <h1 class="auth-block__heading heading">Редактирование пользователя</h1>
            <form action="{{ route('UserUpdate', $user) }}" method="POST" class="auth-block__auth-form">
                @csrf
                <div class="auth-form__auth-inputs">
                    <label for="surname" class="auth-inputs__label just-text">Фамилия</label>
                    <input type="text" class="auth-inputs__input just-text @error('surname') invalid-input @enderror" name="surname" id="surname" value="{{ $user->surname }}">
                    @error('surname')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__surname-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <div class="auth-form__auth-inputs">
                    <label for="name" class="auth-inputs__label just-text">Имя</label>
                    <input type="text" class="auth-inputs__input just-text @error('name') invalid-input @enderror" name="name" id="name" value="{{ $user->name }}">
                    @error('name')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__name-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <div class="auth-form__auth-inputs">
                    <label for="birthdate" class="auth-inputs__label just-text">Дата рождения</label>
                    <input type="date" class="auth-inputs__input just-text @error('birthdate') invalid-input @enderror" name="birthdate" id="birthdate" value="{{ $user->birthdate }}">
                    @error('birthdate')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__birthdate-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <div class="auth-form__auth-inputs">
                    <label for="money" class="auth-inputs__label just-text">Кибероны</label>
                    <input type="number" class="auth-inputs__input just-text @error('money') invalid-input @enderror" name="money" id="money" value="{{ $user->money }}">
                    @error('money')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__money-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <div class="auth-form__auth-inputs">
                    <label for="group_id" class="auth-inputs__label just-text">Группа</label>
                    <select class="auth-inputs__input just-text @error('group_id') invalid-input @enderror" name="group_id" id="group_id">
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                    @error('group_id')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__group-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <div class="auth-form__auth-inputs">
                    <label for="contact" class="auth-inputs__label just-text">Контакты</label>
                    <input type="text" class="auth-inputs__input just-text @error('contact') invalid-input @enderror" name="contact" id="contact" value="{{ $user->contact }}">
                    @error('contact')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__contact-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="auth-form__submit-btn btn">Редактировать</button>
            </form>
        </section>
    </main>
@endsection
