@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="content">
                    <div class="header">
                        @foreach ($list as $key => $value)
                            <h4 class="title">Sửa nhân viên có ID:{{ $value->id_admin }}</h4>
                    </div>
                    <div class="content">
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo $message;
                            Session::put('message', null);
                        }
                        ?>
                        <form method="POST" action="{{ URL::to('/update-employee/' . $value->id_admin) }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>ID</label>
                                <input type="hidden" placeholder="ID danh mục" class="form-control"
                                    value="{{ $value->id_admin }}">
                            </div>
                            <div class="form-group">
                                <label>Tên nhân viên</label>
                                <input type="text" placeholder="Tên danh mục" class="form-control" name="name"
                                    value="{{ $value->name }}">
                            </div>
                            <div class="form-group">
                                <label>Chức vụ</label>
                                <select name="role" class="selectpicker" data-title="Chức vụ nhân viên"
                                    data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                    <option selected value="0">Nhân viên</option>
                                    <option selected value="1">Quản lý</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" placeholder="Tên danh mục" class="form-control" name="email"
                                    value="{{ $value->email }}" readonly>
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
