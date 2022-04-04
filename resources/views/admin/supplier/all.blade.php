@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="header">
                    <h4 class="title">Danh sách nhà cung cấp</h4>
                </div>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>

                {{-- <div class="alert alert-success">
                    <button type="button" aria-hidden="true" class="close">×</button>
                    <span><b> Success - </b> This is a regular notification made with ".alert-success"</span>
                </div> --}}

                <a href="{{ URL::to('/add-supplier') }}" class="btn btn-success btn-fill btn-wd">Thêm</a>
                <div class="content">
                    <div class="content table-responsive table-full-width">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Tên nhà cung cấp</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    {{-- <th>Trạng thái</th> --}}
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

                                        {{-- <td class="text-center">
                                    @if ($value->status == 0)
                                        Ẩn
                                    @else
                                     Hiển thị
                                    @endif
                                </td> --}}
                                        <td class="td-actions text-right">
                                            <a href="{{ URL::to('/edit-supplier/' . $value->id_supplier) }}" rel="tooltip"
                                                title="Sửa thông tin" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ URL::to('/delete-category-product') }}" rel="tooltip" title="Ẩn"
                                                class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
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
