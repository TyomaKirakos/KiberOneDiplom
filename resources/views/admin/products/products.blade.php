@extends('index')

@section('title', 'Товары')

@section('content')
    <main class="main container">
        <section class="panel-list-block block">
            <h1 class="panel-list-block__heading heading">Все товары</h1>
            <a href="{{ route('create-product') }}" class="panel-list-block__create-btn btn">+ Добавить новый товар</a>
            @if(count($products) != 0)
                <div class="panel-list-block__products-list products-list">
                    @foreach($products as $product)
                        <div class="products-list__product-card">
                            <img src="/public/assets/img/products/{{ $product->img }}" alt="Товар" class="product-card__img">
                            <p class="product-card__info">{{ $product->name }}</p>
                            <p class="product-card__info">{{ $product->price }} К</p>
                            <div class="product-card__bottom-part">
                                <a href="{{ route('update-product', $product->id) }}" class="bottom-part__btn btn">Изменить</a>
                                <a href="{{ route('delete-product', $product->id) }}" class="bottom-part__btn btn">Удалить</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="panel-list-block__panel-msg msg">Товаров нет</p>
            @endif
        </section>
    </main>
@endsection
