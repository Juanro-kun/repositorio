<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\CartItemModel;
use App\Models\InvoiceModel;
use App\Models\InvoiceItemModel;

class CheckoutController extends BaseController
{
    public function index(){
        $model = new UserModel;
        $session = session();
        $user_id = $session->get('user_id');

        if ($model->where('user_id', $user_id)
              ->where('fname IS NOT NULL', null, false)
              ->where('lname IS NOT NULL', null, false)
              ->where('fname !=', '')
              ->where('lname !=', '')
              ->countAllResults() > 0)
        {
            return redirect()->to('checkout/revision');
        } else {
            return view('checkout/contacto');
        }
    }

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
    ];

    if (!$this->validate($rules)) {
        return view('checkout/contacto', [
            'validation' => $this->validator
        ]);
    }

    $user_id = session()->get('user_id');
    $userModel = new UserModel;
    $userModel->update($user_id, [
        'fname' => $data['nombre'],
        'lname' => $data['apellido']
    ]);

    // 🚀 Ahora cargar el carrito correctamente
    $cartModel = new CartItemModel;
    $productoModel = new ProductModel;
    $carrito = $cartModel->where('user_id', $user_id)->findAll();

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

    $envio = 1000;
    $impuestos = $subtotal * 0.10;
    $total = $subtotal + $envio + $impuestos;

    // Guardar en sesión para usar en la vista
    session()->set('checkout_productos', $productos);
    session()->set('checkout_subtotal', $subtotal);
    session()->set('checkout_envio_costo', $envio);
    session()->set('checkout_impuestos', $impuestos);
    session()->set('checkout_total', $total);

    return view('checkout/revision', compact('productos', 'subtotal', 'envio', 'impuestos', 'total'));
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
        $cartModel = new CartItemModel;
        if (!session()->has('user_id')) {
            return redirect()->to('login')->with('error', 'Debes iniciar sesión para continuar.');
        }

        $session = session();
        $user_id = $session->get('user_id');
        $carrito = $cartModel->where('user_id', $user_id)->findAll();
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
        $total = $subtotal;

        return view('checkout/revision', compact('productos', 'subtotal', 'total'));
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

    $envio = 1000;
    $impuestos = $subtotal * 0.10;
    $total = $subtotal + $envio + $impuestos;

    $invoiceModel = new InvoiceModel();
    $invoiceData = [
        'user_id'    => $user_id,
        'total'      => $total,
        'created_at' => date('Y-m-d H:i:s')
    ];
    $invoice_id = $invoiceModel->insert($invoiceData);

    $invoiceItemModel = new InvoiceItemModel();
    foreach ($productos as $prod) {
        $invoiceItemModel->insert([
            'invoice_id'        => $invoice_id,
            'product_id'        => $prod['product_id'],
            'quantity'          => $prod['cantidad'],
            'price_at_purchase' => $prod['price'],
            'subtotal'          => $prod['cantidad'] * $prod['price']
        ]);

        $productoModel->set('stock', 'stock - ' . (int)$prod['cantidad'], false)
                      ->where('product_id', $prod['product_id'])
                      ->update();
    }

    $carritoModel->where('user_id', $user_id)->delete();

    session()->set('invoice_id', $invoice_id);
    session()->set('checkout_productos', $productos);
    session()->set('checkout_subtotal', $subtotal);
    session()->set('checkout_envio_costo', $envio);
    session()->set('checkout_impuestos', $impuestos);
    session()->set('checkout_total', $total);

    return redirect()->to('/checkout/confirmado');
}

public function confirmado()
{
    $data = [
        'invoice_id'   => session('invoice_id'),
        'productos'    => session('checkout_productos'),
        'subtotal'     => session('checkout_subtotal'),
        'costoEnvio'   => session('checkout_envio_costo'),
        'impuestos'    => session('checkout_impuestos'),
        'total'        => session('checkout_total'),
    ];
    return view('checkout/confirmado', $data);
}

}
