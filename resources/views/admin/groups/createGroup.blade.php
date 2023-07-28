@extends('index')

@section('title', 'Создание группы')

@section('js')
    <script src="/public/assets/js/deleteWarnings.js" defer></script>
@endsection

@section('content')
    <main class="main container">
        <section class="auth-block block">
            <h1 class="auth-block__heading heading">Создание группы</h1>
            <form action="" method="POST" class="auth-block__auth-form">
                @csrf
                <div class="auth-form__auth-inputs">
                    <label for="name" class="auth-inputs__label just-text">Название</label>
                    <input type="text" class="auth-inputs__input just-text @error('name') invalid-input @enderror" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__name-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="auth-form__submit-btn btn">Создать</button>
            </form>
        </section>
    </main>
@endsection
