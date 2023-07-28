@extends('index')

@section('title', 'Регистрация пользователя')

@section('js')
    <script src="/public/assets/js/deleteWarnings.js" defer></script>
@endsection

@section('content')
    <main class="main container">
        <section class="auth-block block">
            <h1 class="auth-block__heading heading">Регистрация пользователя</h1>
            <form action="" method="POST" class="auth-block__auth-form">
                @csrf
                <div class="auth-form__auth-inputs">
                    <label for="surname" class="auth-inputs__label just-text">Фамилия</label>
                    <input type="text" class="auth-inputs__input just-text @error('surname') invalid-input @enderror" name="surname" id="surname" value="{{ old('surname') }}">
                    @error('surname')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__surname-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <div class="auth-form__auth-inputs">
                    <label for="name" class="auth-inputs__label just-text">Имя</label>
                    <input type="text" class="auth-inputs__input just-text @error('name') invalid-input @enderror" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__name-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <div class="auth-form__auth-inputs">
                    <label for="login" class="auth-inputs__label just-text">Логин</label>
                    <input type="text" class="auth-inputs__input just-text @error('login') invalid-input @enderror" name="login" id="login" value="{{ old('login') }}">
                    @error('login')
                        <p class="input-block__warning-text auth-inputs__warning-text auth__login-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <div class="auth-form__auth-inputs">
                    <label for="birthdate" class="auth-inputs__label just-text">Дата рождения</label>
                    <input type="date" class="auth-inputs__input just-text @error('birthdate') invalid-input @enderror" name="birthdate" id="birthdate" value="{{ old('birthdate') }}">
                    @error('birthdate')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__birthdate-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <div class="auth-form__auth-inputs">
                    <label for="gender" class="auth-inputs__label just-text">Пол</label>
                    <select class="auth-inputs__input just-text @error('gender') invalid-input @enderror" name="gender" id="gender">
                        <option value="мужской" selected>Мужской</option>
                        <option value="женский">Женский</option>
                    </select>
                    @error('gender')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__gender-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <div class="auth-form__auth-inputs">
                    <label for="money" class="auth-inputs__label just-text">Кибероны</label>
                    <input type="number" class="auth-inputs__input just-text @error('money') invalid-input @enderror" name="money" id="money" @if(old('money')) value="{{ old('money') }}" @else value="0" @endif>
                    @error('money')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__money-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <div class="auth-form__auth-inputs">
                    <label for="role" class="auth-inputs__label just-text">Статус</label>
                    <select class="auth-inputs__input just-text @error('role') invalid-input @enderror" name="role" id="role">
                        <option value="ученик" selected>Ученик</option>
                        <option value="тьютор">Тьютор</option>
                        <option value="менеджер">Менеджер</option>
                    </select>
                    @error('role')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__role-warning-text">{{ $message }}</p>
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
                    <input type="text" class="auth-inputs__input just-text @error('contact') invalid-input @enderror" name="contact" id="contact" value="{{ old('contact') }}">
                    @error('contact')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__contact-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <div class="auth-form__auth-inputs">
                    <label for="password" class="auth-inputs__label just-text">Пароль</label>
                    <input type="password" class="auth-inputs__input just-text @error('password') invalid-input @enderror" name="password" id="password">
                    @error('password')
                        <p class="input-block__warning-text auth-inputs__warning-text auth__password-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <div class="auth-form__auth-inputs">
                    <label for="password_confirmation" class="auth-inputs__label just-text">Повтор пароля</label>
                    <input type="password" class="auth-inputs__input just-text @error('password') invalid-input @enderror" name="password_confirmation" id="password_confirmation">
                    @error('password')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__password-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="auth-form__submit-btn btn">Зарегистрировать</button>
            </form>
        </section>
    </main>
@endsection
