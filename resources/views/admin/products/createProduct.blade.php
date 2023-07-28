@extends('index')

@section('title', 'Добавление товара')

@section('js')
    <script src="/public/assets/js/deleteWarnings.js" defer></script>
@endsection

@section('content')
    <main class="main container">
        <section class="auth-block block">
            <h1 class="auth-block__heading heading">Добавление товара</h1>
            <form action="" method="POST" class="auth-block__auth-form">
                @csrf
                <div class="auth-form__auth-inputs">
                    <label for="name" class="auth-inputs__label just-text">Название</label>
                    <input type="text" class="auth-inputs__input just-text @error('name') invalid-input @enderror" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__name-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <div class="auth-form__auth-inputs">
                    <label for="img" class="auth-inputs__label just-text">Изображение</label>
                    <input type="file" accept="image/png, image/jpeg, image/jpg" class="auth-inputs__input just-text @error('img') invalid-input @enderror" name="img" id="img" value="{{ old('img') }}">
                    @error('img')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__img-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <div class="auth-form__auth-inputs">
                    <label for="price" class="auth-inputs__label just-text">Цена</label>
                    <input type="number" class="auth-inputs__input just-text @error('price') invalid-input @enderror" name="price" id="price" value="{{ old('price') }}">
                    @error('price')
                    <p class="input-block__warning-text auth-inputs__warning-text auth__price-warning-text">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="auth-form__submit-btn btn">Добавить</button>
            </form>
        </section>
    </main>
@endsection
