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
                    <h4 class="title">Danh sách danh mục sản phẩm</h4>
                </div>

                <a href="{{ URL::to('/add-category-product') }}" class="btn btn-success btn-fill btn-wd"
                    style="margin-left: 577px; margin-top: -41px;min-width: 72px;">Thêm</a>
                <div class="content">
                    <div class="content table-responsive table-full-width">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">ID danh mục</th>
                                    <th>Tên danh mục</th>
                                    <th>Trạng thái</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $key => $value)
                                    <tr>
                                        <td class="text-center">{{ $value->id_category }}</td>
                                        <td>{{ $value->name_cat }}</td>
                                        <td class="text-center">
                                            @if ($value->status == 0)
                                                <strong class="text-danger"> Ẩn</strong>
                                            @else
                                                <strong class="text-info"> Hiển thị</strong>
                                            @endif
                                        </td>
                                        <td class="td-actions text-right">
                                            <strong>
                                                <a href="{{ URL::to('/edit-category-product/' . $value->id_category) }}"
                                                    rel="tooltip" title="Sửa thông tin"
                                                    class="btn btn-success btn-simple btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @if ($value->status == 0)
                                                    <a href="{{ URL::to('/active-category-product/' . $value->id_category) }}"
                                                        rel="tooltip" title="Hiển thị"
                                                        class="btn btn-info btn-simple btn-xs">
                                                        <i class="pe-7s-check"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ URL::to('/unactive-category-product/' . $value->id_category) }}"
                                                        rel="tooltip" title="Ẩn" class="btn btn-danger btn-simple btn-xs"
                                                        onclick="confirm('Bạn có chắc muốn ẩn ')">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                @endif


                                            </strong>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-4">
            <div class="card">
                <div class="content">
                        <div class="header">
                            <h4 class="title">Thêm danh mục sản phẩm</h4>
                        </div>
                            <div class="content">
                                <form method="#" action="#">
                                    <div class="form-group">
                                        <label>ID danh mục</label>
                                        <input type="number" placeholder="ID danh mục" class="form-control" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input type="text" placeholder="Tên danh mục" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-fill btn-info">Submit</button>
                                </form>
                            </div>

                </div>
            </div>
        </div> --}}

    </div>
@endsection
