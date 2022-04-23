@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="header">
                    <h4 class="title">Danh sách khách hàng</h4>
                </div>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
                {{-- <a href="{{ URL::to('/add-employee') }}" class="btn btn-success btn-fill btn-wd">Thêm</a> --}}
                <div class="content">
                    <div class="content table-responsive table-full-width">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Tên khách hàng</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Email</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $key => $value)
                                    <tr>
                                        <td class="text-center">{{ $value->id_customer }}</td>
                                        <td>{{ $value->name }}</td>

                                        <td>{{ $value->phone }}</td>
                                        <td>{{ $value->address }}</td>
                                        <td>{{ $value->email }}</td>

                                        <td class="text-center">
                                            @if ($value->status == 0)
                                                <strong class="text-danger"> Không hoạt động</strong>
                                            @else
                                                <strong class="text-info"> Hoạt động</strong>
                                            @endif
                                        </td>
                                        <td class="td-actions text-right">
                                            <a href="{{ URL::to('/detail-customer/' . $value->id_customer) }}"
                                                rel="tooltip" title="Thông tin chi tiết"
                                                class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @if ($value->status == 0)
                                                <a href="{{ URL::to('/active-customer/' . $value->id_customer) }}"
                                                    rel="tooltip" title="Hiển thị" class="btn btn-info btn-simple btn-xs">
                                                    <i class="pe-7s-check"></i>
                                                </a>
                                            @else
                                                <a href="{{ URL::to('/unactive-customer/' . $value->id_customer) }}"
                                                    rel="tooltip" title="Ẩn" class="btn btn-danger btn-simple btn-xs"
                                                    onclick="confirm('Bạn có chắc muốn ẩn ')">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            @endif
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
