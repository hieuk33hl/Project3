@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <?php
            $message = Session::get('message');
            ?>
            @if ($message)
                <div class="alert alert-success" id="hideMeAfter5Seconds">
                    <span>{{ $message }}</span>
                </div>
            @endif

            <?php
            Session::put('message', null);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Danh sách nhân viên</h4>
                </div>

                <a href="{{ URL::to('/add-employee') }}" class="btn btn-success btn-fill btn-wd"
                    style="margin-left: 577px; margin-top: -41px;min-width: 72px;">
                    Thêm</a>
                <div class="content">
                    <div class="content table-responsive table-full-width">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Tên nhân viên</th>
                                    <th>Chức vụ</th>
                                    <th>Email</th>
                                    <th>Trạng thái</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $key => $value)
                                    <tr>
                                        <td class="text-center">{{ $value->id_admin }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>
                                            @if ($value->role == 0)
                                                Quản lý
                                            @else
                                                Nhân viên
                                            @endif
                                        </td>
                                        <td>{{ $value->email }}</td>

                                        <td class="text-center">
                                            @if ($value->status == 1)
                                                <strong class="text-info"> Hoạt động</strong>
                                            @else
                                                <strong class="text-danger"> Không hoạt động</strong>
                                            @endif
                                        </td>
                                        <td class="td-actions text-right">
                                            <a href="{{ URL::to('/edit-employee/' . $value->id_admin) }}" rel="tooltip"
                                                title="Sửa thông tin" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @if ($value->status == 0)
                                                <a href="{{ URL::to('/active-employee/' . $value->id_admin) }}"
                                                    rel="tooltip" title="Hiển thị" class="btn btn-info btn-simple btn-xs">
                                                    <i class="pe-7s-check"></i>
                                                </a>
                                            @else
                                                <a href="{{ URL::to('/unactive-employee/' . $value->id_admin) }}"
                                                    rel="tooltip" title="Ẩn" class="btn btn-danger btn-simple btn-xs"
                                                    onclick="confirm('Bạn có chắc muốn khóa tài khoản này ')">
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
