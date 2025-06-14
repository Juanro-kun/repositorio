<?php

namespace App\Controllers;

use App\Models\CartItemModel;
use App\Models\ProductModel;

class CarritoController extends BaseController
{
    public function index()
    {
        $cartModel = new CartItemModel();
        $productModel = new ProductModel();

        $user_id = session()->get('user_id'); 

        $carrito = $cartModel->where('user_id', $user_id)->findAll();

        $items = [];
        $subtotal = 0;

        foreach ($carrito as $item) {
            $producto = $productModel->find($item['product_id']);
            if ($producto) {
                $producto['cantidad'] = $item['quantity'];
                $producto['total'] = $producto['price'] * $item['quantity'];
                $items[] = $producto;
                $subtotal += $producto['total'];
            }
        }

        $envio = 1000;
        $impuestos = round($subtotal * 0.1, 2);
        $total = $subtotal + $envio + $impuestos;

        return view('carrito', compact('items', 'subtotal', 'envio', 'impuestos', 'total'));
    }

    public function agregar()
    {
        $product_id = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity');

        $user_id = session()->get('user_id');

        $cartModel = new CartItemModel();

        // Si el producto ya está en el carrito, actualizar cantidad
        $item = $cartModel->where('user_id', $user_id)
                          ->where('product_id', $product_id)
                          ->first();

        if ($item) {
            $cartModel->update($item['cart_item_id'], [
                'quantity' => $item['quantity'] + $quantity
            ]);
        } else {
            $cartModel->insert([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => $quantity
            ]);
        }

        return redirect()->back()->with('mensaje', 'Producto agregado al carrito');
    }

    public function sumar()
    {
        $product_id = $this->request->getPost('product_id');
        $user_id = session()->get('user_id'); 
        $cartModel = new \App\Models\CartItemModel();

        $item = $cartModel->where('user_id', $user_id)
                        ->where('product_id', $product_id)
                        ->first();

        if ($item) {
            $cartModel->update($item['cart_item_id'], [
                'quantity' => $item['quantity'] + 1
            ]);
        }

        return redirect()->to('/carrito');
    }

    public function restar()
    {
        $product_id = $this->request->getPost('product_id');
        $user_id = session()->get('user_id');
        $cartModel = new \App\Models\CartItemModel();

        $item = $cartModel->where('user_id', $user_id)
                        ->where('product_id', $product_id)
                        ->first();

        if ($item && $item['quantity'] > 1) {
            $cartModel->update($item['cart_item_id'], [
                'quantity' => $item['quantity'] - 1
            ]);
        } elseif ($item) {
            // Si la cantidad es 1, lo eliminamos directamente
            $cartModel->delete($item['cart_item_id']);
        }

        return redirect()->to('/carrito');
    }

    public function eliminar()
    {
        $product_id = $this->request->getPost('product_id');
        $user_id = session()->get('user_id');
        $cartModel = new \App\Models\CartItemModel();

        $item = $cartModel->where('user_id', $user_id)
                        ->where('product_id', $product_id)
                        ->first();

        if ($item) {
            $cartModel->delete($item['cart_item_id']);
        }

        return redirect()->to('/carrito');
    }

}
