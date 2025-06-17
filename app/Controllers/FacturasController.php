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
        $orden = $this->request->getGet('orden'); // capturar filtro del select
        $db = \Config\Database::connect();

        // Determinar columna y dirección de ordenamiento
        switch ($orden) {
            case 'reciente':
                $orderBy = ['i.created_at', 'DESC'];
                break;
            case 'antiguo':
                $orderBy = ['i.created_at', 'ASC'];
                break;
            case 'mayor':
                $orderBy = ['i.total', 'DESC'];
                break;
            case 'menor':
                $orderBy = ['i.total', 'ASC'];
                break;
            default:
                $orderBy = ['i.created_at', 'DESC']; // por defecto más reciente
        }

        $facturas = $db->table('invoice i')
            ->select('i.*, u.fname, u.lname, SUM(ii.quantity) as cantidad_productos')
            ->join('user u', 'i.user_id = u.user_id')
            ->join('invoice_item ii', 'i.invoice_id = ii.invoice_id')
            ->groupBy('i.invoice_id')
            ->orderBy($orderBy[0], $orderBy[1])
            ->get()
            ->getResultArray();

        return view('admin/facturas', [
            'facturas' => $facturas,
            'orden' => $orden // lo pasás para marcar el filtro actual en el select
        ]);
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

        if (!$factura) {
            return redirect()->to('admin/facturas')->with('error', 'Factura no encontrada.');
        }

        $productos = $db->table('invoice_item ii')
            ->select('ii.*, p.name, p.image, p.description')
            ->join('product p', 'ii.product_id = p.product_id')
            ->where('ii.invoice_id', $id)
            ->get()
            ->getResultArray();

        // Calcular subtotales por producto
        foreach ($productos as &$prod) {
            $prod['subtotal'] = $prod['price_at_purchase'] * $prod['quantity'];
            $prod['image'] = $prod['image'] ?? 'default.png';
        }

        return view('admin/ver_factura', [
            'factura' => $factura,
            'productos' => $productos
        ]);
    }
}
