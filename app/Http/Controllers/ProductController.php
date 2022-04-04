<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function all_product()
    {
        $list = DB::table("san_pham")
            ->get();
        return view('admin.product.all', [
            "list" => $list
        ]);
    }
    public function add_product()
    {
        $category = DB::table("danh_muc")->orderBy('id_category', 'ASC')->get();
        $supplier = DB::table("nha_cung_cap")->orderBy('id_supplier', 'ASC')->get();
        return view('admin.product.add', [
            'category' => $category,
            'supplier' => $supplier
        ]);
    }

    public function save_product(Request $request)
    {

        $data = array();
        $data['name'] = $request->product_name;
        $data['price'] = $request->product_price;
        $data['stock'] = $request->product_stock;
        $data['category'] = $request->product_category;
        $data['supplier'] = $request->product_supplier;
        $data['detail'] = $request->product_detail;
        $data['status'] = $request->product_status;
        $data['image'] = '';

        $get_image = $request->file('product_image');
        // echo $get_image;
        // die();
        if ($get_image) {
            $get_image_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_image_name));
            $new_image = $name_image . rand(0, 99) . "." . $get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product', $new_image);
            $data['image'] = $new_image;
        }
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();
        DB::table('san_pham')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('/all-product');
    }

    public function detail_product(Request $request, $id_product)
    {
        $list = DB::table("san_pham")
            ->join("danh_muc", 'san_pham.category', '=', 'danh_muc.id_category')
            ->join("nha_cung_cap", 'san_pham.supplier', '=', 'nha_cung_cap.id_supplier')
            ->where("san_pham.id_product", $id_product)
            ->get();
        return view('admin.product.detail', [
            "list" => $list
        ]);
    }

    public function edit_product(Request $request, $id_product)
    {
        $list = DB::table("san_pham")
            ->join("danh_muc", 'san_pham.category', '=', 'danh_muc.id_category')
            ->join("nha_cung_cap", 'san_pham.supplier', '=', 'nha_cung_cap.id_supplier')
            ->where("san_pham.id_product", $id_product)
            ->get();
        $category = DB::table("danh_muc")->orderBy('id_category', 'ASC')->get();
        $supplier = DB::table("nha_cung_cap")->orderBy('id_supplier', 'ASC')->get();
        return view('admin.product.edit', [
            "list" => $list,
            'category' => $category,
            'supplier' => $supplier
        ]);
    }
    public function update_product(Request $request, $id_product)
    {
        $data = array();
        $data['name'] = $request->product_name;
        $data['price'] = $request->product_price;
        $data['stock'] = $request->product_stock;
        $data['category'] = $request->product_category;
        $data['supplier'] = $request->product_supplier;
        $data['detail'] = $request->product_detail;
        $data['status'] = $request->product_status;
        $data['image'] = '';
        // echo "<pre>";
        // print_r($data);
        // echo "</pre";
        // die();

        DB::table('san_pham')->Where('id_product', $id_product)->update($data);

        Session::put('message', 'Cập nhật sản phẩm thành công');
        return Redirect::to('/all-product');
    }
}
