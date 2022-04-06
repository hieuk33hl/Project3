<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class Supplier extends Controller
{
    public function all_supplier()
    {

        $list = DB::table("nha_cung_cap")
            ->get();
        return view('admin.supplier.all', [
            "list" => $list
        ]);
    }
    public function add_supplier()
    {
        return view('admin.supplier.add');
    }
    public function save_supplier(Request $request)
    {
        $data = array();
        $data['name_sup'] = $request->supplier_name;
        $data['address'] = $request->supplier_address;
        $data['phone'] = $request->supplier_phone;

        DB::table('nha_cung_cap')->insert($data);
        Session::put('message', 'Thêm danh mục sản phẩm thành công');
        return Redirect::to('/all-supplier');
    }

    public function edit_supplier($id_supplier)
    {
        $list = DB::table("nha_cung_cap")
            ->where('id_supplier', $id_supplier)
            ->get();
        return view('admin.supplier.edit', [
            "list" => $list
        ]);
    }

    public function update_supplier(Request $request, $id_supplier)
    {
        $data = array();
        $data['name_sup'] = $request->supplier_name;
        $data['address'] = $request->supplier_address;
        $data['phone'] = $request->supplier_phone;
        DB::table('nha_cung_cap')->Where('id_supplier', $id_supplier)->update($data);
        Session::put('message', 'Cập nhật nhà cung cấp thành công');
        return Redirect::to('/all-supplier');
    }

    //end admin

    public function show_brand_home($id_brand)
    {
        $category = DB::table("danh_muc")->orderBy('id_category', 'ASC')->where("danh_muc.status", 1)->get();
        $supplier = DB::table("nha_cung_cap")->orderBy('id_supplier', 'ASC')->get();

        $brand_by_id = DB::table("san_pham")
            ->join("nha_cung_cap", 'san_pham.supplier', '=', 'nha_cung_cap.id_supplier')
            ->where('san_pham.category', $id_brand)
            ->get();
        $brand_name = DB::table("nha_cung_cap")->where("nha_cung_cap.id_supplier", $id_brand)->limit(1)->get();

        return view('pages.brand.showbrand', [
            'category' => $category,
            'supplier' => $supplier,
            'product' => $brand_by_id,
            'brand_name' => $brand_name
        ]);
    }
}
