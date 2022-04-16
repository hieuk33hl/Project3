<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

session_start();

class InvoiceHistoryController extends Controller
{
    public function invoice_history()
    {
        $id_cus = Session::get('customer_id');
        if ($id_cus) {
            $category = DB::table("danh_muc")->orderBy('id_category', 'ASC')->where("danh_muc.status", 1)->get();
            $supplier = DB::table("nha_cung_cap")->orderBy('id_supplier', 'ASC')->get();

            $id_cus = Session::get('customer_id');
            $invoicehistory = DB::table("hoa_don")
                ->orderBy('id_invoice', 'DESC')
                ->join('shipping', 'hoa_don.shipping_id', '=', 'shipping.shipping_id')
                ->join('payment', 'hoa_don.payment_id', '=', 'payment.payment_id')
                ->where("hoa_don.customer", $id_cus)
                ->get();
            return view(
                'pages.account.invoicehistory',
                [
                    'category' => $category,
                    'supplier' => $supplier,
                    'invoicehistory' => $invoicehistory
                ]
            );
        } else {
            return Redirect::to('/login-checkout');
        }
    }

    public function invoice_history_detail($id_invoice)
    {
        $category = DB::table("danh_muc")->orderBy('id_category', 'ASC')->where("danh_muc.status", 1)->get();
        $supplier = DB::table("nha_cung_cap")->orderBy('id_supplier', 'ASC')->get();

        $id_cus = Session::get('customer_id');
        $invoicehistory = DB::table("hoa_don")
            ->orderBy('id_invoice', 'DESC')
            ->join('shipping', 'hoa_don.shipping_id', '=', 'shipping.shipping_id')
            ->join('payment', 'hoa_don.payment_id', '=', 'payment.payment_id')
            ->join('khach_hang', 'hoa_don.customer', '=', 'khach_hang.id_customer')
            ->where("hoa_don.id_invoice", $id_invoice)
            ->get();

        $list = DB::table("hoa_don_ct")
            ->join('san_pham', 'hoa_don_ct.product', '=', 'san_pham.id_product')
            ->where("hoa_don_ct.invoice", $id_invoice)
            ->get();
        return view(
            'pages.account.detailinvoicehistory',
            [
                'category' => $category,
                'supplier' => $supplier,
                'list' => $list,
                'invoicehistory' => $invoicehistory
            ]
        );
    }

    public function account_info()
    {
        $id_cus = Session::get('customer_id');
        $list = DB::table("khach_hang")
            ->where("id_customer", $id_cus)
            ->get();

        return view(
            'pages.account.accInfo',
            ['list' => $list]
        );
    }

    public function save_info(Request $request)
    {
        $id_cus = Session::get('customer_id');

        $result = $request->all();

        $data = [];
        $data['name'] = $result['name'];
        $data['address'] = $result['address'];
        if ($result['password_old'] && $result['password_new']) {
            $cus = DB::table('khach_hang')
                ->where('id_customer', $id_cus)
                ->where('password', md5($result['password_old']))
                ->first();
            if ($cus) {
                if ($result['password_new'] == $result['password_new_retype']) {
                    $data['password'] = md5($result['password_new']);
                }
            }
        }

        echo "<pre>";
        print_r($data);
        echo "<pre>";
        die();
    }
}
