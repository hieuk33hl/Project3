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
        <div class="col-md-10">
            <div class="card">
                <div class="header">
                    <h4 class="title" align="center">Danh sách sản phẩm </h4>
                </div>
                <?php
                setlocale(LC_MONETARY, 'en_US');
                ?>
                <a href="{{ URL::to('/add-product') }}" class="btn btn-success btn-fill"
                    style="margin-left: 1029px; margin-top: -41px;min-width: 72px;">
                    Thêm
                </a>
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
                                            @if (str_contains($value->image, 'https') === true)
                                                <img src="{{ $value->image }}" width="80px" height="80px">
                                            @else
                                                <img src="public/upload/product/{{ $value->image }}" width="80px"
                                                    height="80px">
                                            @endif
                                        </td>
                                        <td>
                                            @if ($value->status == 0)
                                                <strong class="text-danger"> Ẩn</strong>
                                            @else
                                                <strong class="text-info"> Hiển thị</strong>
                                            @endif

                                        </td>

                                        <td>{{ \Carbon\Carbon::parse($value->date)->format('d/m/Y') }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ URL::to('/edit-product/' . $value->id_product) }}" rel="tooltip"
                                                title="Sửa thông tin" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @if ($value->status == 0)
                                                <a href="{{ URL::to('/active-product/' . $value->id_product) }}"
                                                    rel="tooltip" title="Hiển thị" class="btn btn-info btn-simple btn-xs">
                                                    <i class="pe-7s-check"></i>
                                                </a>
                                            @else
                                                <a href="{{ URL::to('/unactive-product/' . $value->id_product) }}"
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
