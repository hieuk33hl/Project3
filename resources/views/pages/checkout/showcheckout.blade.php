@extends('layout')
@section('content')
    <?php
    $content = Cart::content();
    ?>
    <section id="cart_items">
        {{-- <div class="container"> --}}
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                <li class="active">Thông tin người nhận</li>
            </ol>
        </div>
        <!--/breadcrums-->
        <h3>Thông tin người nhận</h3>

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-10 clearfix">
                    <div class="bill-to">
                        <div class="form-one">
                            <form action="{{ URL::to('/save-checkout-customer') }}" method="post">
                                {{ csrf_field() }}
                                <input type="text" placeholder="Email" name="email" required="required">
                                <input type="text" placeholder="Tên người nhận" name="cus_name" required="required">
                                <input type="text" placeholder="Địa chỉ" name="address" required="required">
                                <input type="text" placeholder="Số điện thoại" name="phone" required="required">
                        </div>
                        <div class="form-two">
                            <textarea name="note" placeholder="Ghi chú về đơn hàng của bạn" rows="9"></textarea>
                            <input type="submit" value="Đặt hàng" name="send_order" class="btn btn-primary btn">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- </div> --}}
    </section>
    <!--/#cart_items-->
@endsection
