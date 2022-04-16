@extends('layout_account')
@section('content_account')
    <h2 class="title text-center">Danh sách các đơn hàng</h2>

    <table class="table table-bordered table-hover border-primary">
        <tr>
            <th>#</th>
            <th>ID hóa đơn</th>
            <th>Tổng tiền</th>
            <th>Tình trạng</th>
            <th>Hình thức thanh toán</th>
            <th>Ngày tạo</th>
            <th>Chi tiết</th>
        </tr>
        <?php $id = 1; ?>
        @foreach ($invoicehistory as $item)
            <tr>
                <td>{{ $id }}</td> <?php $id++; ?>
                <td>{{ $item->id_invoice }}</td>
                <td>${{ number_format($item->total, 2) }}</td>
                <td>
                    @if ($item->status_order == 0)
                        <strong class="text-info">Đang chờ xử lý</strong>
                    @elseif ($item->status_order == 1)
                        <strong class="text-danger"> Đã hủy</strong>
                    @elseif ($item->status_order == 2)
                        <strong class="text-success">Đã xử lý</strong>
                    @endif
                </td>
                <td>
                    @if ($item->payment_method == 'atm')
                        Chuyển khoản
                    @else
                        Tiền mặt
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($item->Date)->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ URL::to('/invoice-history-detail', $item->id_invoice) }}">Xem chi tiết</a>
                </td>
            </tr>
        @endforeach

    </table>
@endsection
