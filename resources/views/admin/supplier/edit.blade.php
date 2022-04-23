@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="content">
                    <div class="header">
                        @foreach ($list as $key => $value)
                            <h4 class="title">Sửa nhà cung cấp sản phẩm có ID:{{ $value->id_supplier }}</h4>
                    </div>
                    <div class="content">
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo $message;
                            Session::put('message', null);
                        }
                        ?>
                        <form method="POST" action="{{ URL::to('/update-supplier/' . $value->id_supplier) }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" placeholder="ID danh mục" class="form-control"
                                    value="{{ $value->id_supplier }}">
                            </div>
                            <div class="form-group">
                                <label>Nhà cung cấp</label>
                                <input type="text" placeholder="Tên danh mục" class="form-control" name="supplier_name"
                                    value="{{ $value->name_sup }}">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" placeholder="Tên danh mục" class="form-control" name="supplier_address"
                                    value="{{ $value->address }}">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" placeholder="Tên danh mục" class="form-control" name="supplier_phone"
                                    value="{{ $value->phone }}">
                            </div>

                            <button type="submit" class="btn btn-fill btn-info">Update</button>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
