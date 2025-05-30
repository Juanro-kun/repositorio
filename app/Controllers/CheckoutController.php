<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CartItemModel;
use App\Models\InvoiceModel;
use App\Models\InvoiceItemModel;

class CheckoutController extends BaseController
{
    public function pasoContacto()
    {
        // Solo usuarios logueados pueden iniciar checkout
        if (!session()->has('user_id')) {
            return redirect()->to('login')->with('error', 'Debes iniciar sesión para continuar.');
        }

        return view('checkout/contacto');
    }

    public function guardarContacto()
    {
        session()->set('checkout_contacto', $this->request->getPost());
        return view('checkout/envio');
    }

    public function guardarEnvio()
    {
        session()->set('checkout_envio', $this->request->getPost());
        return view('checkout/pago');
    }

    public function guardarPago()
    {
        // Verificar login
        if (!session()->has('user_id')) {
            return redirect()->to('login')->with('error', 'Debes iniciar sesión para continuar.');
        }

        session()->set('checkout_pago', $this->request->getPost());

        $user_id = session('user_id');
        $carrito = (new CartItemModel())->where('user_id', $user_id)->findAll();
        $productos = [];
        $subtotal = 0;

        foreach ($carrito as $item) {
            $prod = (new ProductModel())->find($item['product_id']);
            if ($prod) {
                $prod['cantidad'] = $item['quantity'];
                $prod['total'] = $prod['price'] * $item['quantity'];
                $productos[] = $prod;
                $subtotal += $prod['total'];
            }
        }

        $pago = session('checkout_pago');
        $costoEnvio = ($pago['envio'] === 'express') ? 2500 : 1000;
        $impuestos = round($subtotal * 0.1, 2);
        $total = $subtotal + $costoEnvio + $impuestos;

        return view('checkout/revision', compact('productos', 'subtotal', 'costoEnvio', 'impuestos', 'total'));
    }

    public function confirmarPedido()
    {
        // Verificar login
        if (!session()->has('user_id')) {
            return redirect()->to('login')->with('error', 'Debes iniciar sesión para confirmar el pedido.');
        }

        $user_id = session('user_id');
        $carritoModel = new CartItemModel();
        $productoModel = new ProductModel();

        $carrito = $carritoModel->where('user_id', $user_id)->findAll();
        $productos = [];
        $subtotal = 0;

        foreach ($carrito as $item) {
            $prod = $productoModel->find($item['product_id']);
            if ($prod) {
                $prod['cantidad'] = $item['quantity'];
                $prod['total'] = $prod['price'] * $item['quantity'];
                $productos[] = $prod;
                $subtotal += $prod['total'];
            }
        }

        $envio = session('checkout_envio');
        $contacto = session('checkout_contacto');
        $pago = session('checkout_pago');

        $costoEnvio = ($pago['envio'] === 'express') ? 2500 : 1000;
        $impuestos = round($subtotal * 0.1, 2);
        $total = $subtotal + $costoEnvio + $impuestos;

        $invoiceModel = new InvoiceModel();
        $invoiceData = [
            'user_id' => $user_id,
            'total' => $total,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $invoice_id = $invoiceModel->insert($invoiceData);

        $invoiceItemModel = new InvoiceItemModel();
        foreach ($productos as $prod) {
            $invoiceItemModel->insert([
                'invoice_id' => $invoice_id,
                'product_id' => $prod['product_id'],
                'quantity' => $prod['cantidad'],
                'price_at_purchase' => $prod['price']
            ]);
        }

        // Vaciar el carrito
        $carritoModel->where('user_id', $user_id)->delete();

        // Redirigir al mensaje de éxito
        return redirect()->to('/checkout/confirmado');
    }

    public function confirmado()
    {
        return view('checkout/confirmado');
    }
}
