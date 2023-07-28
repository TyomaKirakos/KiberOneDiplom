@extends('index')

@section('title', 'Изменение Д/З')

@section('js')
    <script src="/public/assets/js/deleteWarnings.js" defer></script>
@endsection

@section('content')
    <main class="main container">
        <section class="auth-block block">
            <h1 class="auth-block__heading heading">Изменение Д/З</h1>
            <form action="{{ route('HomeworkChange', $group) }}" method="POST" class="auth-block__auth-form">
                @csrf
                <div class="auth-form__auth-inputs">
                    <label for="homework" class="auth-inputs__label just-text">Д/З</label>
                    <textarea type="texthomework" class="auth-inputs__input just-text @error('homework') invalid-input @enderror" name="homework" id="homework">{{ $group->homework }}</textarea>
                    @error('homework')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__homework-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="auth-form__submit-btn btn">Сохранить</button>
            </form>
        </section>
    </main>
@endsection
