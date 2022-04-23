<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class AdminController extends Controller
{
    public function index()
    {
        $id = Session::get('admin_id');

        if ($id) {
            return Redirect::to('/dashboard');
        }
        return view('login');
    }


    public function show_dashboard()
    {
        $total_invoice = DB::table('hoa_don')->count();
        $total_invoice_processed = DB::table('hoa_don')->where('status_order', '!=', 0)->count();
        $total_invoice_notprocessed = DB::table('hoa_don')->where('status_order', 0)->count();
        return view('admin.dashboard', [
            'total_invoice' => $total_invoice,
            'total_invoice_processed' => $total_invoice_processed,
            'total_invoice_notprocessed' => $total_invoice_notprocessed,
        ]);
    }
    public function dashboard(Request $request)
    {
        // return view('admin.dashboard');
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;
        $result = DB::table('admin')->where('email', $admin_email)->where('password', $admin_password)->where('status', 1)->first();

        if ($result) {
            Session::put('admin_name', $result->name);
            Session::put('admin_id', $result->id_admin);
            Session::put('role_admin', $result->role);
            return Redirect::to('/dashboard');
        } else {
            Session::put('message', 'Mật khẩu hoặc tài sản sai');
            return Redirect::to('/admin');
        }
    }
    public function log_out()
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/admin');
    }
}
