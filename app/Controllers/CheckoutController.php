<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CartItemModel;
use App\Models\InvoiceModel;
use App\Models\InvoiceItemModel;

class CheckoutController extends BaseController
{
<<<<<<< HEAD
    public function pasoContacto()
=======
    public function envio()
>>>>>>> prueba-catalogo
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
<<<<<<< HEAD
            'user_id' => $user_id,
            'total' => $total,
=======
            'user_id'    => $user_id,
            'total'      => $total,
>>>>>>> prueba-catalogo
            'created_at' => date('Y-m-d H:i:s')
        ];
        $invoice_id = $invoiceModel->insert($invoiceData);

        $invoiceItemModel = new InvoiceItemModel();
        foreach ($productos as $prod) {
<<<<<<< HEAD
            $invoiceItemModel->insert([
                'invoice_id' => $invoice_id,
                'product_id' => $prod['product_id'],
                'quantity' => $prod['cantidad'],
                'price_at_purchase' => $prod['price']
            ]);
=======
            // Insertar ítem en la factura
            $invoiceItemModel->insert([
                'invoice_id' => $invoice_id,
                'product_id' => $prod['product_id'],
                'quantity'   => $prod['cantidad'],
                'price_at_purchase' => $prod['price']
            ]);

            // Descontar stock
            if ($prod['stock'] >= $prod['cantidad']) {
                $productoModel->update($prod['product_id'], [
                    'stock' => $prod['stock'] - $prod['cantidad']
                ]);
            }
>>>>>>> prueba-catalogo
        }

        // Vaciar el carrito
        $carritoModel->where('user_id', $user_id)->delete();

<<<<<<< HEAD
        // Redirigir al mensaje de éxito
        return redirect()->to('/checkout/confirmado');
=======
        // Limpiar sesiones de checkout
        session()->remove(['checkout_contacto', 'checkout_envio', 'checkout_pago']);

        // Redirigir al mensaje de éxito
        return view('checkout/confirmado', [
        'invoice_id'  => $invoice_id,
        'productos'   => $productos,
        'subtotal'    => $subtotal,
        'costoEnvio'  => $costoEnvio,
        'impuestos'   => $impuestos,
        'total'       => $total
    ]);
>>>>>>> prueba-catalogo
    }

    public function confirmado()
    {
        return view('checkout/confirmado');
    }
}
