@extends('index')

@section('title', 'Вход')

@section('js')
    <script src="/public/assets/js/deleteWarnings.js" defer></script>
@endsection

@section('content')
    <main class="main container">
        <section class="auth-block block">
            <h1 class="auth-block__heading heading">Вход</h1>
            <form action="" method="POST" class="auth-block__auth-form">
                @csrf
                <div class="auth-form__auth-inputs">
                    <label for="login" class="auth-inputs__label just-text">Логин</label>
                    <input type="text" class="auth-inputs__input just-text @error('login') invalid-input @enderror" name="login" id="login" value="{{ old('login') }}">
                    @error('login')
                        <p class="input-block__warning-text auth-inputs__warning-text login__login-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <div class="auth-form__auth-inputs">
                    <label for="password" class="auth-inputs__label just-text">Пароль</label>
                    <input type="password" class="auth-inputs__input just-text @error('password') invalid-input @enderror @if (session('auth')) invalid-input @endif" name="password" id="password">
                    @error('password')
                        <p class="input-block__warning-text auth-inputs__warning-text login__password-warning-text">{{ $message }}</p>
                    @enderror
                    @if (session('auth'))
                        <p class="input-block__warning-text auth-inputs__warning-text login__password-warning-text">Неверный пароль</p>
                    @endif
                </div>
                <button type="submit" class="auth-form__submit-btn btn">Войти</button>
            </form>
        </section>
    </main>
@endsection
