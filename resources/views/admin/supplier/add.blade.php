@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="content">
                    <div class="header">
                        <h4 class="title">Thêm nhà cung cấp sản phấm</h4>
                    </div>
                    <div class="content">

                        <form method="POST" action="{{ URL::to('/save-supplier') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Tên nhà cung cấp</label>
                                <input type="text" placeholder="Tên nhà cung cấp" class="form-control"
                                    name="supplier_name">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" placeholder="Địa chỉ" class="form-control" name="supplier_address">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" placeholder="Số điện thoại" class="form-control" name="supplier_phone">
                            </div>
                            <button type="submit" class="btn btn-fill btn-info" name="update">Thêm </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
