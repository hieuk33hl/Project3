@extends('layout')
@section('content')
    <table class="table table-bordered border-primary">
        <tr>
            <th>ID</th>
            <th>ID hóa đơn</th>
            <th>Tổng tiền</th>
            <th>Ngày tạo</th>
            <th>Chi tiết</th>
        </tr>
        <?php $id = 1; ?>
        @foreach ($invoicehistory as $item)
            <tr>
                <td>{{ $id }}</td> <?php $id++; ?>
                <td>{{ $item->id_invoice }}</td>
                <td>{{ $item->total }}</td>
                <td>{{ $item->Date }}</td>
                <td>
                    <a href="{{ URL::to('/invoice-history-detail', $item->id_invoice) }}">Tài khoản</a>
                </td>
            </tr>
        @endforeach

    </table>
@endsection
