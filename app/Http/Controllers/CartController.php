<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $product_id = $request->product_id;
        $qty = $request->qty;

        $category = DB::table("danh_muc")->orderBy('id_category', 'ASC')->where("danh_muc.status", 1)->get();
        $supplier = DB::table("nha_cung_cap")->orderBy('id_supplier', 'ASC')->get();

        $product_info = DB::table('san_pham')->where('id_product', $product_id)->first();
        Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        return view(
            'pages.cart.showcart',
            [
                'category' => $category,
                'supplier' => $supplier
            ]
        );
    }
}
