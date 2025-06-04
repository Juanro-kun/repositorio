<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\InvoiceModel;

class NotificacionesController extends BaseController
{
    public function index()
    {
        $userModel     = new UserModel();
        $productModel  = new ProductModel();
        $categoryModel = new CategoryModel();
        $invoiceModel  = new InvoiceModel();

        $usuarios      = $userModel->findAll();
        $productos     = $productModel->findAll();
        $categorias    = $categoryModel->findAll();
        $pedidos       = $invoiceModel->findAll();

        // Contadores para mostrar arriba
        $notificaciones = [
            'usuarios'   => count($usuarios),
            'productos'  => count($productos),
            'categorias' => count($categorias),
            'pedidos'    => count($pedidos),
        ];

        // Mensajes de notificaciones
        $mensajes = [];

        foreach ($usuarios as $u) {
            $mensajes[] = "👤 Usuario activo: {$u['fname']} {$u['lname']} ({$u['mail']})";
        }

        foreach ($productos as $p) {
            if ((int)$p['stock'] === 0) {
                $mensajes[] = "❌ Producto sin stock: {$p['name']}";
            } elseif ((int)$p['stock'] < 10) {
                $mensajes[] = "⚠️ Stock bajo: {$p['name']} ({$p['stock']} unidades)";
            }
        }

        foreach ($categorias as $c) {
            $mensajes[] = "🏷️ Categoría activa: {$c['category_name']}";
        }

        foreach ($pedidos as $p) {
            $mensajes[] = "🧾 Pedido recibido - ID: {$p['invoice_id']}, Total: $" . number_format($p['total'], 2, ',', '.');
        }

        return view('admin/notificaciones', [
            'notificaciones' => $notificaciones,
            'mensajes' => $mensajes
        ]);
    }
}
