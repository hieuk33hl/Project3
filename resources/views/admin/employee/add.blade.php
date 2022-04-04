@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="content">
                    <div class="header">
                        <h4 class="title">Thêm nhân viên</h4>
                    </div>
                        <div class="content">

                            <form method="POST" action="{{ URL::to('/save-employee') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Tên nhân viên</label>
                                    <input type="text" placeholder="Tên nhân viên" class="form-control" name="employee_name">
                                </div>
                                <div class="form-group">
                                    <label>Chức vụ</label>
                                    <select name="employee_role" class="selectpicker" data-title="Chức vụ" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                        <option  value="0" >Nhân viên</option>
                                        <option  value="1" >Quản lý</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" placeholder="Email" class="form-control" name="employee_email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" placeholder="Password" class="form-control" name="employee_password">
                                </div>
                                    <p class="category">Trạng thái</p>
									<input type="checkbox" data-toggle="switch" checked="" name="employee_status" value="1"
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
