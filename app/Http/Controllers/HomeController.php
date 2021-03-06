<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $category = DB::table("danh_muc")->orderBy('id_category', 'ASC')->where("danh_muc.status", 1)->get();
        $supplier = DB::table("nha_cung_cap")->orderBy('id_supplier', 'ASC')->get();
        $product = DB::table("san_pham")
            ->where("san_pham.status", 1)
            ->orderBy('id_product', 'ASC')
            ->limit(9)
            ->get();

        $related_products = DB::table("san_pham")
            ->orderBy('id_product', 'ASC')
            ->skip(9)
            ->take(3)
            ->get();
        $related_products2 = DB::table("san_pham")
            ->orderBy('id_product', 'ASC')
            ->skip(12)
            ->take(3)
            ->get();
        return view('pages.home', [
            'category' => $category,
            'supplier' => $supplier,
            'product' => $product,
            'related_products' => $related_products,
            'related_products2' => $related_products2,
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword_submit;

        $category = DB::table("danh_muc")->orderBy('id_category', 'ASC')->where("danh_muc.status", 1)->get();
        $supplier = DB::table("nha_cung_cap")->orderBy('id_supplier', 'ASC')->get();
        $search_product = DB::table("san_pham")->where("san_pham.status", 1)->where('san_pham.name', 'like', '%' . $keyword . '%')->get();
        return view('pages.product.search', [
            'category' => $category,
            'supplier' => $supplier,
            'search_product' => $search_product
        ]);
    }
}
