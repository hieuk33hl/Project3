@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="header">
                    <h4 class="title">Danh sách sản phẩm </h4>
                </div>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                setlocale(LC_MONETARY, 'en_US');
                // echo money_format($number);
                ?>
                <a href="{{ URL::to('/add-product') }}" class="btn btn-success btn-fill btn-wd">Thêm</a>
                <div class="content">
                    <div class="content table-responsive table-full-width">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Ảnh</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày thêm</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $key => $value)
                                    <tr>
                                        <td class="text-center">{{ $value->id_product }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>${{ number_format($value->price, 1) }}$ </td>
                                        {{-- <td>{{ $value->image}}</td> --}}
                                        <td>
                                            <img src="{{ $value->image }}" width="80px" height="80px">
                                        </td>
                                        <td>
                                            @if ($value->status === 1)
                                                <input type="checkbox" data-toggle="switch" checked="" name="product_status"
                                                    value="{{ $value->status }}" data-off-text="Ẩn" data-on-text="Hiện" />
                                            @else
                                                <input type="checkbox" data-toggle="switch" checked="" name="product_status"
                                                    value="{{ $value->status }}" data-off-text="Ẩn" data-on-text="Hiện" />
                                            @endif
                                        </td>

                                        <td>{{ $value->date }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ URL::to('/edit-product/' . $value->id_product) }}" rel="tooltip"
                                                title="Sửa thông tin" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ URL::to('/detail-product/' . $value->id_product) }}" rel="tooltip"
                                                title="Chi tiet" class="btn btn-info btn-simple btn-xs">
                                                <i class="pe-7s-info"></i>
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
