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
        $quantity = (int) $this->request->getPost('quantity');

        $user_id = session()->get('user_id');
        $cartModel = new \App\Models\CartItemModel();
        $productModel = new \App\Models\ProductModel();

        $producto = $productModel->find($product_id);

        if (!$producto) {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }

        // Consultar si ya hay ese producto en el carrito
        $item = $cartModel->where('user_id', $user_id)
                        ->where('product_id', $product_id)
                        ->first();

        $enCarrito = $item ? $item['quantity'] : 0;
        $totalSolicitado = $enCarrito + $quantity;

        // Validar stock disponible
        if ($totalSolicitado > $producto['stock']) {
            return redirect()->back()->with('error', 'No hay suficiente stock disponible');
        }

        if ($item) {
            $cartModel->update($item['cart_item_id'], [
                'quantity' => $totalSolicitado
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
    $productModel = new \App\Models\ProductModel();

    // Traer el item del carrito
    $item = $cartModel->where('user_id', $user_id)
                      ->where('product_id', $product_id)
                      ->first();

    // Traer el producto para conocer el stock
    $producto = $productModel->find($product_id);

    if ($item && $producto) {
        $cantidadActual = $item['quantity'];
        $stockDisponible = $producto['stock'];

        // Si la cantidad en carrito es menor al stock, se permite sumar
        if ($cantidadActual < $stockDisponible) {
            $cartModel->update($item['cart_item_id'], [
                'quantity' => $cantidadActual + 1
            ]);
        }
        // Si no, simplemente no se hace nada (mantiene el valor)
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
            $cartModel->update($item['cart_item_id'], [
                'quantity' => $item['quantity'] 
            ]);
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
