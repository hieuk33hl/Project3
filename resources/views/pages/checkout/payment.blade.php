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
                <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div>
        <!--/breadcrums-->

        <div class="review-payment">
            <h2>Thông tin giỏ hàng</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description">Mô tả</td>
                        <td class="price">Giá </td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    ?>
                    @foreach ($content as $v_content)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{ $v_content->options->image }}" alt="" width="100"
                                        height="100"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{ $v_content->name }} </a></h4>
                                <p>Web ID: {{ $v_content->id }}</p>
                            </td>
                            <td class="cart_price">
                                <p>${{ $v_content->price }}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <input class="cart_quantity_input" type="text" name="quantity"
                                        value="{{ $v_content->qty }}" autocomplete="off" size="2" disabled>
                                </div>
                            </td>
                            <?php
                            $subtotal = $v_content->qty * $v_content->price;
                            $total += $subtotal;
                            ?>
                            <td class="cart_total">
                                <p class="cart_total_price">${{ $subtotal }}</p>
                            </td>
                        </tr>
                    @endforeach

                    @if ($content->count())
                        <tr>
                            <td colspan="3">&nbsp;</td>
                            <td colspan="2">
                                <table class="table table-condensed total-result">
                                    <tr>
                                        <td>Cart Sub Total</td>
                                        <td>${{ $total }}</td>
                                    </tr>
                                    <tr class="shipping-cost">
                                        <td>Shipping Cost</td>
                                        <td>
                                            <span>
                                                <?php $ship = 1;
                                                ?>
                                                ${{ $ship }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Total</strong>
                                        </td>
                                        <td><span>${{ $total + $ship }}</span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="5" align="center">
                                <h3 style="color:#FE980F">Giỏ hàng trống</h3>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="payment-options">
            <form action="{{ URL::to('/order-place') }}" method="post">
                {{ csrf_field() }}
                <span>
                    <label><input type="radio" name="payment" value="atm"> Thanh toán qua chuyển khoản</label>
                </span>
                <span>
                    <label><input type="radio" name="payment" value="cash"> Nhận tiền mặt</label>
                </span>
                <span>
                    <input type="hidden" name="total" value="{{ $total }}">
                </span>
                <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn">

            </form>
        </div>
        {{-- </div> --}}
    </section>
    <!--/#cart_items-->
@endsection
