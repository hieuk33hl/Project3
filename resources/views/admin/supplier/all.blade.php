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
                    <h4 class="title">Danh sách nhà cung cấp</h4>
                </div>
                <a href="{{ URL::to('/add-supplier') }}" class="btn btn-success btn-fill btn-wd"
                    style="margin-left: 577px; margin-top: -41px;min-width: 72px;">Thêm</a>

                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>

                <div class="content">
                    <div class="content table-responsive table-full-width">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Tên nhà cung cấp</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Trạng thái</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $key => $value)
                                    <tr>
                                        <td class="text-center">{{ $value->id_supplier }}</td>
                                        <td>{{ $value->name_sup }}</td>
                                        <td>{{ $value->address }}</td>
                                        <td>{{ $value->phone }}</td>

                                        <td class="text-center">
                                            @if ($value->sup_status == 0)
                                                <strong class="text-danger"> Ẩn</strong>
                                            @else
                                                <strong class="text-info"> Hiển thị</strong>
                                            @endif
                                        </td>
                                        <td class="td-actions text-right">
                                            <a href="{{ URL::to('/edit-supplier/' . $value->id_supplier) }}" rel="tooltip"
                                                title="Sửa thông tin" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @if ($value->sup_status == 0)
                                                <a href="{{ URL::to('/active-supplier-product/' . $value->id_supplier) }}"
                                                    rel="tooltip" title="Hiển thị" class="btn btn-info btn-simple btn-xs">
                                                    <i class="pe-7s-check"></i>
                                                </a>
                                            @else
                                                <a href="{{ URL::to('/unactive-supplier-product/' . $value->id_supplier) }}"
                                                    rel="tooltip" title="Ẩn" class="btn btn-danger btn-simple btn-xs"
                                                    onclick="confirm('Bạn có chắc muốn ẩn ')">
                                                    <i class="fa fa-times"></i>
                                            @endif

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
