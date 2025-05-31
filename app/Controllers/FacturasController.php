<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\InvoiceModel;
use App\Models\InquiryModel;
use App\Models\ContactModel;

class FacturasController extends BaseController
{    
    public function index()
    {
        $db = \Config\Database::connect();
        $facturas = $db->table('invoice i')
            ->select('i.*, u.fname, u.lname, COUNT(ii.invoice_item_id) as cantidad_productos')
            ->join('user u', 'i.user_id = u.user_id')
            ->join('invoice_item ii', 'i.invoice_id = ii.invoice_id')
            ->groupBy('i.invoice_id')
            ->orderBy('i.created_at', 'DESC')
            ->get()->getResultArray();

        return view('admin/facturas', ['facturas' => $facturas]);
    }

    public function verFactura($id)
    {
        $db = \Config\Database::connect();
        $factura = $db->table('invoice i')
            ->select('i.*, u.fname as nombre, u.lname as apellido, u.mail')
            ->join('user u', 'i.user_id = u.user_id')
            ->where('i.invoice_id', $id)
            ->get()
            ->getRowArray();

        $productos = $db->table('invoice_item ii')
            ->select('ii.*, p.name, p.image, p.description')
            ->join('product p', 'ii.product_id = p.product_id')
            ->where('ii.invoice_id', $id)
            ->get()
            ->getResultArray();

        if (!$factura) {
            return redirect()->to('admin/facturas')->with('error', 'Factura no encontrado.');
        }

        return view('admin/ver_factura', [
            'factura' => $factura,
            'productos' => $productos
        ]);
    }
}