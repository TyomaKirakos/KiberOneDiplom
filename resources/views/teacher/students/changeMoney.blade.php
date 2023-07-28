@extends('index')

@section('title', 'Изменение кол-ва киберенов')

@section('js')
    <script src="/public/assets/js/deleteWarnings.js" defer></script>
@endsection

@section('content')
    <main class="main container">
        <section class="auth-block block">
            <h1 class="auth-block__heading heading">Кибероны</h1>
            <form action="{{ route('change-money', $student) }}" method="POST" class="auth-block__auth-form">
                @csrf
                <div class="auth-form__auth-inputs">
                    <label for="money" class="auth-inputs__label just-text">Кибероны</label>
                    <input type="number" class="auth-inputs__input just-text @error('money') invalid-input @enderror" name="money" id="money" value="{{ $student->money }}">
                    @error('money')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__money-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="auth-form__submit-btn btn">Изменить</button>
            </form>
        </section>
    </main>
@endsection
