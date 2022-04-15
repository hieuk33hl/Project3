@extends('layout')
@section('content')
    @if ($cash)
        <div class="review-payment">
            <h2>Cảm ơn bạn đã đặt hàng bên phía chúng tôi</h2>
        </div>
    @else
        <div class="review-payment">
            <h2>chuyen khoan</h2>
        </div>
    @endif
@endsection
