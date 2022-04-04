@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="content">
                    <div class="header">
                        <h4 class="title">Thông tin sản phấm </h4>
                    </div>
                    <div class="content">
                        @foreach ($list as $key => $value)
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" placeholder="Tên nhà sản phẩm" class="form-control" name="product_name"
                                    value="{{ $value->name }}">
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="number" placeholder="Giá sản phẩm" class="form-control" name="product_price"
                                    value="{{ $value->price }}">
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input type="text" placeholder="Số lượng sản phẩm" class="form-control"
                                    name="product_stock" value="{{ $value->stock }}">
                            </div>
                            <div class="form-group">
                                <label>Danh mục sản phẩm</label>
                                <input type="text" placeholder="Số lượng sản phẩm" class="form-control"
                                    name="product_stock" value="{{ $value->name_cat }}">
                            </div>
                            <div class="form-group">
                                <label>Nhà cung cấp</label>
                                <input type="text" placeholder="Số lượng sản phẩm" class="form-control"
                                    name="product_stock" value="{{ $value->name_sup }}">
                            </div>
                            <div class="form-group">
                                <label>Mô tả sản phẩm</label>
                                <textarea placeholder="Mô tả sản phẩm" rows="5" class="form-control"
                                    name="product_detail">{{ $value->detail }}</textarea>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="content">
                    <div class="card card-user">
                        <img src="{{ $value->image }}" width="90%" height="90%" />
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
