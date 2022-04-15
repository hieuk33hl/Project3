<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Cart;

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
        $product_id = $request->product_id;
        $qty = $request->qty;


        $product_info = DB::table('san_pham')->where('id_product', $product_id)->first();
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // Cart::destroy();

        $data['id'] = $product_info->id_product;
        $data['qty'] = $qty;
        $data['name'] = $product_info->name;
        $data['price'] = $product_info->price;
        $data['weight'] = '550';
        $data['options']['image'] = $product_info->image;
        Cart::add($data);
        // Cart::destroy();

        return Redirect::to('/show-cart');
    }


    public function show_cart()
    {
        $category = DB::table("danh_muc")->orderBy('id_category', 'ASC')->where("danh_muc.status", 1)->get();
        $supplier = DB::table("nha_cung_cap")->orderBy('id_supplier', 'ASC')->get();
        return view(
            'pages.cart.showcart',
            [
                'category' => $category,
                'supplier' => $supplier
            ]
        );
    }

    public function delete_to_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }


    public function update_cart_qty(Request $request)
    {
        $rowId = $request->rowID_cart;
        $qty_cart  = $request->quantity;
        Cart::update($rowId, $qty_cart);
        return Redirect::to('/show-cart');
    }
}
