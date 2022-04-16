@extends('layout_account')
@section('content_account')
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h1>
                Thông tin tài khoản
            </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-12">
            <table class="table ">
                <form method="post" action="{{ URL::to('/save-info-cus') }}">
                    {{ csrf_field() }}
                    @foreach ($list as $item)
                        <tr>
                            <th>Họ tên</th>
                            <td>
                                <input type="text" class="form-control" value="{{ $item->name }}" name="name">
                                <input type="hidden" value="{{ $item->id_customer }}" name="id_customer">
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                <input type="email" class="form-control" value={{ $item->email }} name="email">
                            </td>
                        </tr>
                        <tr>
                            <th>Số điện thoại</th>
                            <td>
                                <input type="text" class="form-control" value={{ $item->phone }}>
                            </td>
                        </tr>
                        <tr>
                            <th>Địa chỉ</th>
                            <td>
                                <input type="text" class="form-control" value={{ $item->address }} name="address">
                            </td>
                        </tr>
                    @endforeach

                    <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample"
                        aria-expanded="false" aria-controls="collapseExample">
                        Đổi mật khẩu
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div class="well">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Mật khẩu cũ</span>
                                <input type="text" class="form-control" placeholder="Password"
                                    aria-describedby="basic-addon1" width="100px" name="password_old">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon2">Mật khẩu mới</span>
                                <input type="text" class="form-control" placeholder="Password"
                                    aria-describedby="basic-addon2" width="100px" name="password_new">
                            </div>
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon3">Nhập lại mật khẩu mới</span>
                                <input type="text" class="form-control" placeholder="Password"
                                    aria-describedby="basic-addon3" width="100px" name="password_new_retype">
                            </div>

                        </div>
                    </div>
                    <button type="submit">sửa</button>
                </form>
            </table>

        </div>
    </div>
@endsection
