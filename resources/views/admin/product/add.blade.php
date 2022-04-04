@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="content">
                    <div class="header">
                        <h4 class="title">Thêm sản phấm</h4>
                    </div>
                        <div class="content">

                            <form method="POST" action="{{ URL::to('/save-product') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>ID sản phẩm</label>
                                    <input type="number" placeholder="ID nhà sản phẩm" class="form-control" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" placeholder="Tên nhà sản phẩm" class="form-control" name="product_name">
                                </div>
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="number" placeholder="Giá sản phẩm" class="form-control" name="product_price">
                                </div>
                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input type="text" placeholder="Số lượng sản phẩm" class="form-control" name="product_stock">
                                </div>
                                <div class="form-group">
                                    <label>ảnh sản phẩm</label>
                                    <input type="file"  class="form-control" name="product_image">
                                </div>
                                <div class="form-group">
                                    <label>Danh mục sản phẩm</label>
                                    <select name="product_category" class="selectpicker" data-title="Danh mục sản phẩm" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                        @foreach ($supplier as $key => $value)
                                            <option value="{{ $value->id_supplier }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nhà cung cấp</label>
                                    <select name="product_supplier" class="selectpicker" data-title="Nhà cung cấp" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                        @foreach ($category as $key => $value)
                                            <option value="{{ $value->id_category }}"> {{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả sản phẩm</label>
                                    <textarea placeholder="Mô tả sản phẩm" rows="5" class="form-control" name="product_detail"></textarea>
                                </div>

                                    <p class="category">Trạng thái</p>
									<input type="checkbox" data-toggle="switch" checked="" name="product_status" value="1"
										data-off-text="Ẩn"
										data-on-text="Hiện"
									/>
                                </br> </br>

                                <button type="submit" class="btn btn-fill btn-info" name="update">Thêm </button>
                            </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
