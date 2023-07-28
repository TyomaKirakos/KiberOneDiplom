@extends('index')

@section('title', 'Каталог')

@section('content')
    <main class="main container">
        <section class="catalog-block block">
            <h1 class="catalog-block__heading heading">Каталог</h1>
            @if(count($products) != 0)
                <div class="catalog-block__products-list products-list">
                    @foreach($products as $product)
                        <div class="products-list__product-card">
                            <img src="/public/assets/img/products/{{ $product->img }}" alt="Товар" class="product-card__img">
                            <p class="product-card__info">{{ $product->name }}</p>
                            <div class="product-card__bottom-part">
                                <p class="bottom-part__btn btn">Цена: {{ $product->price }} К</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="products-list-block__panel-msg msg">Товаров нет</p>
            @endif
        </section>
    </main>
@endsection
