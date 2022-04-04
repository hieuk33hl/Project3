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
}
