@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="content">
                    <div class="header">
                        <h4 class="title">Cập nhật sản phấm</h4>
                    </div>
                    <div class="content">
                        @foreach ($list as $key => $value)
                            <form method="POST" action="{{ URL::to('/update-product/' . $value->id_product) }}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" placeholder="Tên nhà sản phẩm" class="form-control"
                                        name="product_name" value="{{ $value->name }}" </div>
                                    <div class="form-group">
                                        <label>Giá sản phẩm</label>
                                        <input type="number" placeholder="Giá sản phẩm" class="form-control"
                                            name="product_price" value="{{ $value->price }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Số lượng</label>
                                        <input type="text" placeholder="Số lượng sản phẩm" class="form-control"
                                            name="product_stock" value="{{ $value->stock }}">
                                    </div>
                                    <div class="form-group">
                                        <label>ảnh sản phẩm</label>
                                        <input type="file" class="form-control" name="product_image">

                                        @if (str_contains($value->image, 'https') === true)
                                            <img src="{{ $value->image }}" width="80px" height="80px">
                                        @else
                                            <img src=" {{ URL::to('public/upload/product/' . $value->image) }}"
                                                width="80px" height="80px">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Danh mục sản phẩm</label>
                                        <select name="product_category" class="selectpicker"
                                            data-title="Danh mục sản phẩm" data-style="btn-default btn-block"
                                            data-menu-style="dropdown-blue">
                                            @foreach ($category as $key => $item)
                                                @if ($item->id_category == $value->category)
                                                    <option selected value="{{ $item->id_category }}">
                                                        {{ $item->name_cat }}</option>
                                                @else
                                                    <option value="{{ $item->id_category }}">{{ $item->name_cat }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nhà cung cấp</label>
                                        <select name="product_supplier" class="selectpicker" data-title="Nhà cung cấp"
                                            data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                            @foreach ($supplier as $key => $item)
                                                @if ($item->id_supplier == $value->supplier)
                                                    <option selected value="{{ $item->id_supplier }}">
                                                        {{ $item->name_sup }}</option>
                                                @else
                                                    <option value="{{ $item->id_supplier }}"> {{ $item->name_sup }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea placeholder="Mô tả sản phẩm" rows="5" class="form-control" name="product_detail">
                                    {{ $value->detail }}
                                </textarea>
                                    </div>


                                    <button type="submit" class="btn btn-fill btn-info" name="update">Cập nhật </button>
                        @endforeach

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
