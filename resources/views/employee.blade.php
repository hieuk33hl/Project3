@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Danh sách nhân viên</h4>
                </div>
                <div class="content">
                    <div class="content table-responsive table-full-width">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Tên nhân viên</th>
                                <th>Chức vụ</th>
                                <th class="text-right">Email</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Andrew Mike</td>
                                <td>Develop</td>
                                <td class="text-right">&euro; 99,225</td>
                                <td class="td-actions text-right">
{{--                                    <a href="#" rel="tooltip" title="View Profile" class="btn btn-info btn-simple btn-xs">--}}
{{--                                        <i class="fa fa-user"></i>--}}
{{--                                    </a>--}}
                                    <a href="#" rel="tooltip" title="Sửa thông tin" class="btn btn-success btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" rel="tooltip" title="Ẩn" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">1</td>
                                <td>Andrew Mike</td>
                                <td>Develop</td>
                                <td class="text-right">&euro; 99,225</td>
                                <td class="td-actions text-right">
                                    {{--                                    <a href="#" rel="tooltip" title="View Profile" class="btn btn-info btn-simple btn-xs">--}}
                                    {{--                                        <i class="fa fa-user"></i>--}}
                                    {{--                                    </a>--}}
                                    <a href="#" rel="tooltip" title="Sửa thông tin" class="btn btn-success btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="#" rel="tooltip" title="Ẩn" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
