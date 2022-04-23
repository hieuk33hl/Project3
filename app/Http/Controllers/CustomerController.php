<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function all_customer()
    {
        $list = DB::table("khach_hang")
            ->get();
        return view('admin.customer.all', [
            "list" => $list
        ]);
    }
    public function active($id_cus)
    {
        DB::table("khach_hang")->where("id_customer", $id_cus)->update(['status' => 1]);
        return Redirect::to('/all-customer');
    }
    public function unactive($id_cus)
    {
        DB::table("khach_hang")->where("id_customer", $id_cus)->update(['status' => 0]);
        return Redirect::to('/all-customer');
    }

    public function detail($id_cus)
    {
        $list = DB::table("hoa_don")
            ->join("khach_hang", 'hoa_don.customer', '=', 'khach_hang.id_customer')
            ->where("customer", $id_cus)
            ->orderBy('id_invoice', 'desc')
            ->get();
        return view('admin.customer.detail', [
            "list" => $list
        ]);
    }
}
