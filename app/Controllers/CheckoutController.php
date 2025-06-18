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
        if (!session()->has('user_id')) {
            return redirect()->to('login')->with('error', 'Debes iniciar sesión para continuar.');
        }

        return view('checkout/contacto');
    }

    public function guardarContacto()
    {
        $data = $this->request->getPost();

        $rules = [
            'nombre'   => 'required|min_length[2]',
            'apellido' => 'required|min_length[2]',
            'telefono' => 'required|numeric',
            'email'    => 'required|valid_email'
        ];

        if (!$this->validate($rules)) {
            return view('checkout/contacto', [
                'validation' => $this->validator
            ]);
        }

        session()->set('checkout_contacto', $data);
        return view('checkout/envio');
    }


    public function guardarEnvio()
    {
        $data = $this->request->getPost();

        $rules = [
            'nombre'        => 'required|min_length[2]',
            'apellido'      => 'required|min_length[2]',
            'direccion'     => 'required|min_length[4]',
            'ciudad'        => 'required',
            'provincia'     => 'required',
            'codigo_postal' => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return view('checkout/envio', [
                'validation' => $this->validator
            ]);
        }

        session()->set('checkout_envio', $data);
        return view('checkout/pago');
    }


    public function guardarPago()
    {
        if (!session()->has('user_id')) {
            return redirect()->to('login')->with('error', 'Debes iniciar sesión para continuar.');
        }

        // Saneamos los datos ANTES de validar
        $data = $this->request->getPost();
        $data['numero_tarjeta']  = preg_replace('/\D/', '', $data['numero_tarjeta']);
        $data['cvv']             = preg_replace('/\D/', '', $data['cvv']);
        $data['vencimiento']     = trim($data['vencimiento']);
        $data['nombre_tarjeta'] = trim($data['nombre_tarjeta']);

        // Validaciones
        $rules = [
            'envio'           => 'required|in_list[standard,express]',
            'nombre_tarjeta'  => 'required|min_length[3]',
            'numero_tarjeta'  => 'required|regex_match[/^[0-9]{13,16}$/]',
            'vencimiento'     => 'required|regex_match[/^(0[1-9]|1[0-2])\/[0-9]{2}$/]',
            'cvv'             => 'required|regex_match[/^[0-9]{3}$/]'
        ];

        // Usamos validateData para validar los datos saneados
        if (!$this->validateData($data, $rules)) {
            return view('checkout/pago', [
                'validation' => $this->validator
            ]);
        }

        session()->set('checkout_pago', $data);

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
            if ($prod['stock'] < $item['quantity']) {
                return redirect()->to('/carrito')->with('error', 'No hay suficiente stock para el producto: ' . $prod['name']);
            }

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
            'price_at_purchase' => $prod['price'],
            'subtotal' => $prod['cantidad'] * $prod['price'] // ✅ Campo agregado correctamente
        ]);

        $productoModel->set('stock', 'stock - ' . (int)$prod['cantidad'], false)
                      ->where('product_id', $prod['product_id'])
                      ->update();
    }

    $carritoModel->where('user_id', $user_id)->delete();

    // Guardar todo en sesión para mostrar en la vista confirmada
    session()->set('invoice_id', $invoice_id);
    session()->set('checkout_productos', $productos);
    session()->set('checkout_subtotal', $subtotal);
    session()->set('checkout_envio_costo', $costoEnvio);
    session()->set('checkout_impuestos', $impuestos);
    session()->set('checkout_total', $total);

    return redirect()->to('/checkout/confirmado');
}

    public function confirmado()
    {
        return view('checkout/confirmado');
    }
}
