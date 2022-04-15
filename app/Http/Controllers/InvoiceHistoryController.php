<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Cart;
use Illuminate\Http\Request;

class InvoiceHistoryController extends Controller
{
    public function invoice_history()
    {
        $id_cus = Session::get('customer_id');
        if ($id_cus) {
            $category = DB::table("danh_muc")->orderBy('id_category', 'ASC')->where("danh_muc.status", 1)->get();
            $supplier = DB::table("nha_cung_cap")->orderBy('id_supplier', 'ASC')->get();

            $id_cus = Session::get('customer_id');
            $invoicehistory = DB::table("hoa_don")->orderBy('id_invoice', 'DESC')->where("hoa_don.customer", $id_cus)->get();
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

        $list = DB::table("hoa_don")
            ->join('hoa_don_ct', 'hoa_don.id_invoice', '=', 'hoa_don_ct.invoice')
            ->where("hoa_don.id_invoice", $id_invoice)
            ->get();
        return view(
            'pages.account.detailinvoicehistory',
            [
                'category' => $category,
                'supplier' => $supplier,
                'list' => $list
            ]
        );
    }
}
