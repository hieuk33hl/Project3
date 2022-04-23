@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="content">
                    <div class="header">
                        <h4 class="title">Thêm danh mục sản phẩm</h4>
                    </div>
                    <div class="content">
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo $message;
                            Session::put('message', null);
                        }
                        ?>
                        <form method="POST" action="{{ URL::to('/save-category-product') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Tên danh mục</label>
                                <input type="text" placeholder="Tên danh mục" class="form-control"
                                    name="category_product_name">
                            </div>


                            <button type="submit" class="btn btn-fill btn-info" name="update">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
