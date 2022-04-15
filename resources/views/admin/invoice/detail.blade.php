@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="content">
                    <div class="header">
                        <h4 class="title">Thông tin người đặt hàng</h4>
                    </div>
                    <div class="content">
                        @foreach ($list2 as $key => $value)
                            <?php $status = $value->status_order;
                            $id_invoice = $value->id_invoice;
                            ?>
                            <div class="form-group">
                                <label>Tên người đặt</label>
                                <input type="text" class="form-control" value="{{ $value->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" value="{{ $value->phone }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" value="{{ $value->address }}" disabled>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="content">
                    <div class="header">
                        <h4 class="title">Thông tin người nhận</h4>
                    </div>
                    <div class="content">
                        @foreach ($list2 as $key => $value)
                            <div class="form-group">
                                <label>Tên người nhận</label>
                                <input type="text" class="form-control" value="{{ $value->shipping_name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" value="{{ $value->shipping_phone }}" disabled>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" value="{{ $value->shipping_address }}" disabled>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="content">
                    <div class="header">
                        <h4 class="title">Trạng thái đơn hàng</h4>
                    </div>
                    <div class="content">
                        @if ($status == 0)
                            <button class="btn btn-info btn-fill btn-wd" width="100px">Đang chờ xử lý</button>
                        @elseif($status == 1)
                            <button class="btn btn-danger btn-fill btn-wd" width="100px">Đã bị hủy</button>
                        @else
                            <button class="btn btn-success btn-fill btn-wd" width="100px">Đã xác nhận</button>
                        @endif
                    </div>
                </div>
            </div>
            @if ($status == 0)
                <div class="card">
                    <div class="content">
                        <div class="header">
                            <h4 class="title">Xử lý đơn hàng</h4>
                        </div>
                        <div class="content">
                            <form method="get" action="{{ URL::to('/update-status-order/' . $id_invoice) }}">
                                <button class="btn btn-danger btn-fill btn-wd" name="status" value="1" type="submit">Hủy
                                    đơn</button>
                                <button class="btn btn-success btn-fill btn-wd" name="status" value="2" type="submit">Xác
                                    nhận
                                    đơn</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="content">
                    <div class="header">
                        <h4 class="title">Thông tin đơn hàng</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0;
                                $i = 1; ?>
                                @foreach ($list as $key => $value)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>
                                            <img src="{{ $value->image }}" width="80">
                                        </td>
                                        <td>{{ $value->quantity }}</td>
                                        <td>${{ number_format($value->price, 1, ',', '.') }}</td>
                                        <td>${{ number_format($value->price * $value->quantity, 1, ',', '.') }}</td>
                                        <?php $total += $value->price * $value->quantity; ?>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td colspan="3">
                                        <strong>
                                            <span style="font-size:25px">Tổng tiền</span>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong>
                                            <span style="font-size:20px"> ${{ number_format($total, 1) }}</span>
                                            <strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
