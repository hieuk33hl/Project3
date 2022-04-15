@extends('layout')
@section('content')
    <section id="cart_items">
        {{-- <div class="container"> --}}
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                <li class="active">Giỏ hàng</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php
            $content = Cart::content();
            ?>
            <table class="table table-condensed" width="300px">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Mô tả</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    ?>
                    @if (!$content->count())
                        <tr>
                            <td colspan="5" align="center">
                                <h3 style="color:#FE980F">Giỏ hàng trống</h3>
                            </td>
                        </tr>
                    @else
                        @foreach ($content as $v_content)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="{{ $v_content->options->image }}" alt="" width="110"
                                            height="110"></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $v_content->name }}</a></h4>
                                    <p>ID: {{ $v_content->id }}</p>
                                </td>
                                <td class="cart_price">
                                    <p>${{ $v_content->price }}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <form method="post" action="{{ URL::to('/update-cart-qty') }}">
                                            {{ csrf_field() }}
                                            {{-- <a class="cart_quantity_up" href=""> + </a> --}}
                                            <input class="cart_quantity_input" type="text" name="quantity"
                                                value="{{ $v_content->qty }}" autocomplete="off" size="2">
                                            <input type="hidden" value="{{ $v_content->rowId }}" name="rowID_cart">
                                            <input type="submit" value="Cập nhật" name="update_qty">
                                            {{-- <a class="cart_quantity_down" href=""> - </a> --}}
                                        </form>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <?php
                                    $subtotal = $v_content->qty * $v_content->price;
                                    $total += $subtotal;
                                    ?>
                                    <p class="cart_total_price">${{ $subtotal }}</p>
                                </td>
                                <td class="cart_delete">
                                    <a href="{{ URL::to('/delete-to-cart/' . $v_content->rowId) }}"
                                        class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div>
        {{-- </div> --}}
    </section>
    <!--/#cart_items-->
    @if ($content->count())
        <section id="do_action">
            <div class="row">
                <div class="col-sm-5">
                    <div class="total_area">
                        <ul>
                            <li>Tống cộng<span>${{ $total }}</span></li>
                            <li>Phí Ship<span>${{ $ship_fee = 1 }}</span></li>
                            <li>Thành tiền<span>${{ $total + $ship_fee }}</span></li>
                        </ul>

                        <?php
                        $customer_id = Session::get('customer_id');
                        ?>
                        @if ($customer_id != null)
                            <ul>
                                <a class="btn btn-primary" href="{{ URL::to('/checkout') }}">Thanh toán</a>
                            </ul>
                        @else
                            <ul>
                                Bạn phải <a href="{{ URL::to('/login-checkout') }}">Đăng
                                    nhập</a> mới có thể thanh toán
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--/#do_action-->
@endsection
