@extends('layout_account')
@section('content_account')
    @foreach ($invoicehistory as $item)
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h1>
                    Đơn hàng #{{ $item->id_invoice }}
                </h1>
            </div>
        </div>
        <div class="row">
            <h3>Thông tin chung</h3>
            <div class="col-xs-12 col-md-6">
                <h4>Thông tin đơn hàng</h4>
                <table class="table table-striped ">
                    <tr>
                        <td>Ngày đặt hàng</td>
                        <td align="right">{{ $item->Date }}</td>
                    </tr>
                    <tr>
                        <td>Tình trạng</td>
                        <td align="right">
                            <h4>
                                @if ($item->status_order == 0)
                                    <strong class="text-info">Đang chờ xử lý</strong>
                                @elseif ($item->status_order == 1)
                                    <strong class="text-danger"> Đã hủy</strong>
                                @elseif ($item->status_order == 2)
                                    <strong class="text-success">Đã xử lý</strong>
                                @endif
                            </h4>
                        </td>
                    </tr>
                </table>
            </div>
            @if ($item->status_order == 0)
                <div class="col-xs-12 col-md-2">
                    <form method="get" action="{{ URL::to('/cancel-order/' . $item->id_invoice) }}">
                        <button class="btn btn-danger btn-fill btn-wd" name="status" value="1" type="submit"
                            onclick="confirm('Bạn có chắc hủy đơn hàng không')">
                            <h4>Hủy đơn hàng</h4>
                        </button>
                    </form>
                </div>
            @endif

        </div>

        <div class="row">
            <h3>Thông tin địa chỉ</h3>
            <div class="col-xs-12 col-md-6">
                <h4>Người đặt</h4>
                <table class="table">
                    <tr>
                        <td>
                            <p>{{ $item->name }}</p>
                            <p>{{ $item->address }}</p>
                            <p>{{ $item->phone }}</p>
                        </td>
                    </tr>

                </table>
            </div>
            <div class=" col-xs-6 col-md-6">
                <h4>Người nhận</h4>
                <table class="table">
                    <tr>
                        <td>
                            <p>{{ $item->shipping_name }}</p>
                            <p>{{ $item->shipping_address }}</p>
                            <p>{{ $item->shipping_phone }}</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <h3>Thanh toán</h3>
            <div class="col-xs-12 col-md-6">
                <h4>Phương thức thanh toán</h4>
                <table class="table">
                    <tr>
                        <td>
                            <h5>
                                @if ($item->payment_method == 'atm')
                                    Chuyển khoản
                                @else
                                    Thanh toán bằng tiền mặt
                                @endif
                            </h5>
                        </td>
                    </tr>

                </table>
            </div>
            <div class=" col-xs-6 col-md-6">
                <h4>Vận chuyển</h4>
                <table class="table">
                    <tr>
                        <td>
                            <p>GHTK - <strong>$1</strong></p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    @endforeach


    <div class="row">
        <h3>Thông tin đơn hàng</h3>
        <div class="col-xs-12 col-md-12">
            <table class="table table-bordered table-hover border-primary">
                <tr>
                    <th>#</th>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                </tr>
                <?php $id = 1;
                $total = 0;
                ?>
                @foreach ($list as $item)
                    <tr>
                        <td>{{ $id }}</td> <?php $id++; ?>
                        <td>
                            <p>{{ $item->name }}</p>
                            <p>ID:{{ $item->product }}</p>
                        </td>
                        <td>${{ number_format($item->price, 2) }}</td>

                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($item->quantity * $item->product_price, 2) }}</td>
                        <?php $id++;
                        $total += $item->quantity * $item->product_price;
                        ?>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" align="center">
                        <h4>Tổng cộng</h4>
                    </td>
                    <td>
                        <h4>
                            ${{ number_format($total, 2) }}
                        </h4>
                    </td>

                </tr>

            </table>
        </div>
    </div>
@endsection
