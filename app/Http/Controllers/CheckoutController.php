<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Cart;

session_start();


class CheckoutController extends Controller
{
    public function login_checkout()
    {
        $category = DB::table("danh_muc")->orderBy('id_category', 'ASC')->where("danh_muc.status", 1)->get();
        $supplier = DB::table("nha_cung_cap")->orderBy('id_supplier', 'ASC')->get();

        $id_cus = Session::get('customer_id');
        if ($id_cus) {
            return Redirect::to('/');
        }
        return view('pages.checkout.login_checkout', [
            'category' => $category,
            'supplier' => $supplier
        ]);
    }

    public function logout_checkout()
    {
        Session::flush();
        return Redirect('/login-checkout');
    }

    public function login_customer(Request $request)
    {
        $email = $request->email;
        $password = md5($request->password);
        $result = DB::table('khach_hang')->where('email', $email)->where('password', $password)->first();

        if ($result) {
            Session::put('customer_id', $result->id_customer);
            return Redirect::to('/');
        } else {
            return Redirect::to('/login-checkout');
        }
    }

    public function add_customer(Request $request)
    {
        $data = array();
        $data['name'] = $request->name_cus;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = md5($request->password);

        $customer_id = DB::table('khach_hang')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->name_cus);

        return Redirect('/checkout');
    }

    public function checkout()
    {
        $category = DB::table("danh_muc")->orderBy('id_category', 'ASC')->where("danh_muc.status", 1)->get();
        $supplier = DB::table("nha_cung_cap")->orderBy('id_supplier', 'ASC')->get();
        return view('pages.checkout.showcheckout', [
            'category' => $category,
            'supplier' => $supplier
        ]);
    }

    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->cus_name;
        $data['shipping_phone'] = $request->phone;
        $data['shipping_address'] = $request->address;
        $data['shipping_email'] = $request->email;
        $data['shipping_note'] = $request->note;

        $shipping_id = DB::table('shipping')->insertGetId($data);

        Session::put('shipping_id', $shipping_id);

        return Redirect::to('/payment');
    }

    public function payment()
    {
        $category = DB::table("danh_muc")->orderBy('id_category', 'ASC')->where("danh_muc.status", 1)->get();
        $supplier = DB::table("nha_cung_cap")->orderBy('id_supplier', 'ASC')->get();
        return view(
            'pages.checkout.payment',
            [
                'category' => $category,
                'supplier' => $supplier
            ]
        );
    }

    public function order_place(Request $request)
    {
        //insert payment method
        $data = array();
        $data['payment_method'] = $request->payment;

        $payment_id = DB::table('payment')->insertGetId($data);

        //insert order
        $order = array();
        $order['customer'] = Session::get('customer_id');
        $order['total'] = $request->total;
        $order['shipping_id'] = Session::get('shipping_id');;
        $order['payment_id'] = $payment_id;

        $order_id = DB::table('hoa_don')->insertGetId($order);

        //insert order details
        $order_detail = array();
        $content = Cart::content();
        foreach ($content as $v_content) {
            $order_detail['invoice'] = $order_id;
            $order_detail['product'] = $v_content->id;
            $order_detail['product_name'] = $v_content->name;
            $order_detail['product_price'] = $v_content->price;
            $order_detail['quantity'] = $v_content->qty;

            DB::table('hoa_don_ct')->insert($order_detail);
        }

        $category = DB::table("danh_muc")->orderBy('id_category', 'ASC')->where("danh_muc.status", 1)->get();
        $supplier = DB::table("nha_cung_cap")->orderBy('id_supplier', 'ASC')->get();

        if ($data['payment_method'] == 'atm') {
            $cash = 0;
        } else {
            $cash = 1;
        }
        Cart::destroy();
        return view('pages.checkout.cash', [
            'category' => $category,
            'supplier' => $supplier,
            'cash' => $cash,
        ]);
    }
}
