<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\InvoiceModel;

class InformeController extends BaseController
{
    public function index()
        {
            $db = \Config\Database::connect();

            // Ingresos totales
            $ingresos = $db->table('invoice')->selectSum('total')->get()->getRow()->total;

            // Total de pedidos
            $pedidos = $db->table('invoice')->countAllResults();

            // Valor medio
            $valorMedio = $pedidos > 0 ? ($ingresos / $pedidos) : 0;

            // Tasa de conversión ficticia por ahora
            $conversion = 3.2;

            // Ventas por categoría
            $ventasPorCategoria = $db->query("
                SELECT c.category_name, SUM(ii.quantity) as ventas, SUM(ii.price_at_purchase * ii.quantity) as ingresos
                FROM invoice_item ii
                JOIN product p ON p.product_id = ii.product_id
                JOIN category c ON c.category_id = p.category_id
                GROUP BY c.category_name
            ")->getResultArray();

            // Productos más vendidos
            $productosTop = $db->query("
                SELECT p.name, p.image, c.category_name, SUM(ii.quantity) as ventas, SUM(ii.price_at_purchase * ii.quantity) as ingresos
                FROM invoice_item ii
                JOIN product p ON p.product_id = ii.product_id
                JOIN category c ON c.category_id = p.category_id
                GROUP BY p.product_id
                ORDER BY ventas DESC
                LIMIT 5
            ")->getResultArray();

            // Mejores clientes
            $mejoresClientes = $db->query("
                SELECT u.fname, u.lname, u.mail, COUNT(i.invoice_id) as pedidos, SUM(i.total) as total_gastado, MAX(i.created_at) as ultimo_pedido
                FROM invoice i
                JOIN user u ON u.user_id = i.user_id
                GROUP BY u.user_id
                ORDER BY total_gastado DESC
                LIMIT 10
            ")->getResultArray();

            return view('admin/informes', [
                'ingresos' => $ingresos,
                'pedidos' => $pedidos,
                'valorMedio' => $valorMedio,
                'conversion' => $conversion,
                'ventasPorCategoria' => $ventasPorCategoria,
                'productosTop' => $productosTop,
                'mejoresClientes' => $mejoresClientes
            ]);
        }
}