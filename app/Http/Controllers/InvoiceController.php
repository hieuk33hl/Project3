<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class InvoiceController extends Controller
{
    public function all_invoice()
    {
        $list = DB::table("hoa_don")
            ->join("khach_hang", 'hoa_don.customer', '=', 'khach_hang.id_customer')
            ->orderBy('id_invoice', 'desc')
            ->get();
        return view('admin.invoice.all', [
            "list" => $list
        ]);
    }
    public function detail_invoice($id_invoice)
    {
        $list = DB::table("hoa_don_ct")
            ->join("san_pham", 'san_pham.id_product', '=', 'hoa_don_ct.product')
            ->join("hoa_don", 'hoa_don.id_invoice', '=', 'hoa_don_ct.invoice')
            ->where("hoa_don.id_invoice", $id_invoice)
            ->get();

        $list2 = DB::table("hoa_don")
            ->join("khach_hang", 'hoa_don.customer', '=', 'khach_hang.id_customer')
            ->join("shipping", 'hoa_don.shipping_id', '=', 'shipping.shipping_id')
            ->join("payment", 'hoa_don.payment_id', '=', 'payment.payment_id')
            ->Where('id_invoice', $id_invoice)
            ->get();
        return view('admin.invoice.detail', [
            "list" => $list,
            "list2" => $list2
        ]);
    }

    public function update_invoice(Request $request, $id_invoice)
    {
        $data = array();
        $data['status_order'] = $request->status;
        DB::table('hoa_don')->Where('id_invoice', $id_invoice)->update($data);

        return redirect('/detail-invoice/' . $id_invoice);
    }
}
