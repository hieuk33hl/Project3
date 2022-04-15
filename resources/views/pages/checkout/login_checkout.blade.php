@extends('layout')
@section('content')
    <section id="form">
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <h2>Đăng nhập</h2>
                        <form action="{{ URL::to('/login-customer') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="email" placeholder="Email" name="email" />
                            <input type="password" placeholder="Mật khẩu" name="password" />
                            {{-- <span>
                                <input type="checkbox" class="checkbox">
                                Keep me signed in
                            </span> --}}
                            <button type="submit" class="btn btn-default">Đăng nhập</button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">Hoặc</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>Tạo tài khoản mới</h2>
                        <form action="{{ URL::to('/add-customer') }}" method="post">
                            {{ csrf_field() }}
                            <input type="text" placeholder="Email" name="email" />
                            <input type="password" placeholder="Password" name="password" />
                            <input type="text" placeholder="Họ và tên" name="name_cus" />
                            <input type="number" placeholder="Điện thoại" name="phone" />
                            <button type="submit" class="btn btn-default">Đăng kí</button>
                        </form>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
    <!--/form-->
@endsection
