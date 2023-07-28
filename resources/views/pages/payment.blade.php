@extends('index')

@section('title', 'Оплата')

@section('content')
    <main class="main container">
        <div class="payment-block block">
            <h1 class="payment-block__heading heading">Оплата</h1>
            <img src="/public/assets/img/payment/payment.png" alt="QR-код для оплаты" class="payment-block__qr-code">
            <p class="payment-block__text just-text">Для оплаты отсканируйте QR-код выше</p>
        </div>
    </main>
@endsection
