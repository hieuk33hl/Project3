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
        $role = Session::get('role_admin');

        if ($role == 1) {
            return Redirect::to('/dashboard');
        }

        $list = DB::table("admin")
            ->get();
        return view('admin.employee.all', [
            "list" => $list
        ]);
    }

    public function add_employee()
    {
        $role = Session::get('role_admin');

        if ($role == 0) {
            return view('admin.employee.add');
        }
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
        Session::put('message', 'Thêm thành công');
        return Redirect::to('/all-employee');
    }

    public function edit_employee($id_employee)
    {
        $role = Session::get('role_admin');

        if ($role == 1) {
            return Redirect::to('/dashboard');
        }

        $result = DB::table("admin")
            ->where('id_admin', $id_employee)

            ->get();
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
        Session::put('message', 'Cập nhật thành công');
        return Redirect::to('/all-employee');
    }

    public function active($id_em)
    {
        $role = Session::get('role_admin');

        if ($role == 0) {
            DB::table("admin")->where("id_admin", $id_em)->update(['status' => 1]);
            return Redirect::to('/all-employee');
        }
    }
    public function unactive($id_em)
    {
        $role = Session::get('role_admin');

        if ($role == 0) {
            DB::table("admin")->where("id_admin", $id_em)->update(['status' => 0]);
            return Redirect::to('/all-employee');
        }
    }
}
