<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

session_start();

class CategoryProduct extends Controller
{
    public function add_category_product()
    {

        return view('admin.category.add');
    }

    public function all_category_product()
    {
        // $result = DB::table('danh_muc')->get();
        // $manager_category_product =  view('admin.category.list')->with('result', $result);
        // return view('admin.category.list')->with('result', $manager_category_product);
        $list = DB::table("danh_muc")
            ->get();
        return view('admin.category.list', [
            "list" => $list
        ]);
    }
    public function save_category_product(Request $request)
    {
        $data = array();
        $data['name_cat'] = $request->category_product_name;
        $data['status'] = $request->category_product_status;

        DB::table('danh_muc')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công');
        return Redirect::to('/all-category-product');
    }

    public function edit_category_product($id_category)
    {
        $list = DB::table("danh_muc")
            ->where('id_category', $id_category)
            ->get();
        return view('admin.category.edit', [
            "list" => $list
        ]);
    }

    public function update_category_product(Request $request, $id_category)
    {
        $data = array();
        $data['name_cat'] = $request->category_product_name;
        $data['status'] = $request->category_product_status;
        DB::table('danh_muc')->Where('id_category', $id_category)->update($data);
        Session::put('message', 'Cập nhật danh mục thành công');
        return Redirect::to('/all-category-product');
    }
}
