@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Danh sách hóa đơn</h4>
                </div>
                <?php
                    $message =Session::get('message');
                    if ($message) {
                        echo $message;
                        Session::put('message',null);
                    }
                 ?>


                <div class="content">
                    <div class="content table-responsive table-full-width">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Ngày đặt hàng</th>
                                <th>Số điện thoại đặt hàng</th>
                                <th>Tình trạng</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $key => $value)
                            <tr>
                                <td class="text-center">{{ $value->id_invoice }}</td>
                                <td>{{ $value->Date}}</td>
                                <td>{{ $value->phone}}</td>
                                <td>
                                    @if ($value->status_order == 0)
                                        <strong class="text-info">Đang chờ xử lý</strong>
                                    @elseif ($value->status_order == 1)
                                        <strong class="text-danger"> Đã hủy</strong>
                                    @elseif ($value->status_order == 2)
                                        <strong class="text-success">Đã xử lý</strong>
                                    @endif
                                </td>

                                <td class="td-actions text-right">
                                    <a href="{{ URL::to('/detail-invoice/'.$value->id_invoice)}}" rel="tooltip" title="Chi tiết đơn hàng" class="btn btn-success btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
