@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="content">
                    <div class="header">
                        @foreach ($list as $key => $value)
                            <h4 class="title">Sửa danh mục sản phẩm có ID:{{ $value->id_category }}</h4>
                    </div>
                    <div class="content">
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo $message;
                            Session::put('message', null);
                        }
                        ?>
                        <form method="POST" action="{{ URL::to('/update-category-product/' . $value->id_category) }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>ID danh mục</label>
                                <input type="number" placeholder="ID danh mục" class="form-control" readonly="readonly"
                                    value="{{ $value->id_category }}" </div>
                                <div class="form-group">
                                    <label>Tên danh mục</label>
                                    <input type="text" placeholder="Tên danh mục" class="form-control"
                                        name="category_product_name" value="{{ $value->name_cat }}" </div>
                                    <p class="category">Trạng thái</p>
                                    <input type="checkbox" data-toggle="switch" checked="" name="category_product_status"
                                        value="1" data-off-text="Ẩn" data-on-text="Hiện" />
                                    </br> </br>

                                    <button type="submit" class="btn btn-fill btn-info">Update</button>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
