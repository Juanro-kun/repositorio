<?php

namespace App\Controllers;

use App\Models\InvoiceModel;
use App\Models\InvoiceItemModel;
use App\Models\ProductModel;

class PerfilController extends BaseController
{
    public function index()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('login')->with('error', 'Debes iniciar sesión para acceder al perfil.');
        }

        $userModel = new \App\Models\UserModel();
        $usuario = $userModel->find(session('user_id'));

        return view('perfil/index', ['usuario' => $usuario]);
    }


    public function pedidos()
    {
        $user_id = session('user_id');

        $facturaModel = new InvoiceModel();
        $itemModel = new InvoiceItemModel();
        $productoModel = new ProductModel();

        $facturas = $facturaModel->where('user_id', $user_id)->orderBy('created_at', 'DESC')->findAll();

        foreach ($facturas as &$factura) {
            $items = $itemModel->where('invoice_id', $factura['invoice_id'])->findAll();
            foreach ($items as &$item) {
                $producto = $productoModel->find($item['product_id']);
                $item['producto'] = $producto['name'] ?? 'Producto eliminado';
            }
            $factura['items'] = $items;
        }

        return view('perfil/pedidos', compact('facturas'));
    }
}
