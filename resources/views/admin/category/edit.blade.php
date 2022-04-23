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

                                <input type="hidden" placeholder="ID danh mục" class="form-control"
                                    value="{{ $value->id_category }}" </div>
                                <div class="form-group">
                                    <label>Tên danh mục</label>
                                    <input type="text" placeholder="Tên danh mục" class="form-control"
                                        name="category_product_name" value="{{ $value->name_cat }}">
                                </div>

                                {{-- <div class="row">
                                    <div class="col-md-6">
                                        <select name="cities" class="selectpicker" data-title="Danh mục sản phẩm"
                                            data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                            <option value="id">Bahasa Indonesia</option>
                                            <option value="ms">Bahasa Melayu</option>
                                            <option value="ca">Català</option>
                                            <option value="da">Dansk</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <br />
                                <button type="submit" class="btn btn-fill btn-info">Update</button>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
