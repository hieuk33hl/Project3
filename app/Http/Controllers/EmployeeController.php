<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    public function all_employee()
    {
        $list = DB::table("admin")
            ->get();
        return view('admin.employee.all', [
            "list" => $list
        ]);
    }

    public function add_employee()
    {

        return view('admin.employee.add');
    }

    public function save_employee(Request $request)
    {
        $data = array();
        $data['name'] = $request->employee_name;
        $data['role'] = $request->employee_role;
        $data['password'] = $request->employee_password;
        $data['email'] = $request->employee_email;
        $data['status'] = '';

        DB::table('admin')->insert($data);
        Session::put('message', 'Thêm nhân viên thành công');
        return Redirect::to('/all-employee');
    }

    public function edit_employee($id_employee)
    {
        $list = DB::table("admin")
            ->where('id_admin', $id_employee)
            ->get();
        return view('admin.employee.edit', [
            "list" => $list
        ]);
    }

    public function update_employee($id_employee, Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['role'] = $request->role;
        $data['email'] = $request->email;
        DB::table('admin')->Where('id_admin', $id_employee)->update($data);
        Session::put('message', 'Cập nhật danh mục thành công');
        return Redirect::to('/all-employee');
    }
}
