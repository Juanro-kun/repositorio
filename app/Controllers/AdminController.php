<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\InvoiceModel;
use App\Models\InquiryModel;
use App\Models\ContactModel;

class AdminController extends BaseController
{
    public function index()
    {
        $usuarios = new UserModel();
        $facturas  = new InvoiceModel();
        $consultas = new InquiryModel();
        $contactos = new ContactModel();
    
        // Ingresos del mes actual
        $ingresosMesActual = $facturas
            ->where('created_at >=', date('Y-m-01'))
            ->selectSum('total')
            ->first();
        $ingresosDelMes = isset($ingresosMesActual['total']) ? $ingresosMesActual['total'] : 0;
    
        $cantidadClientes = $usuarios->where('role', 'user')->where('deleted_at', null)->countAllResults();
        $cantidadVentas = $facturas->countAllResults();
    
        $ventasRaw = $facturas->select("DATE(created_at) as fecha, SUM(total) as total")
            ->where("created_at >=", date('Y-m-d', strtotime('-6 days')))
            ->groupBy("DATE(created_at)")
            ->orderBy("fecha", "ASC")
            ->get()
            ->getResultArray();
    
        $dias = ['Lun' => 0, 'Mar' => 0, 'Mié' => 0, 'Jue' => 0, 'Vie' => 0, 'Sáb' => 0, 'Dom' => 0];
        foreach ($ventasRaw as $row) {
            $diaEn = date('D', strtotime($row['fecha']));
            $map = ['Mon' => 'Lun', 'Tue' => 'Mar', 'Wed' => 'Mié', 'Thu' => 'Jue', 'Fri' => 'Vie', 'Sat' => 'Sáb', 'Sun' => 'Dom'];
            $nombreDia = $map[$diaEn] ?? $diaEn;
            $dias[$nombreDia] = (float) $row['total'];
        }
    
        $ventasSemanal = [
            'dias'    => array_keys($dias),
            'totales' => array_values($dias),
        ];
    
        $db = \Config\Database::connect();
        $ultimosPedidos = $db->table('invoice i')
            ->select('i.*, u.fname as nombre, u.lname as apellido')
            ->join('user u', 'i.user_id = u.user_id')
            ->orderBy('i.created_at', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();
    
        // Suma de consultas registradas + no registradas (contactos)
        $consultasPendientes = $consultas->where('deleted_at', null)->countAllResults()
            + $contactos->where('deleted_at', null)->countAllResults();
    
        $data = [
            'ingresosDelMes'   => $ingresosDelMes,
            'cantidadVentas'   => $cantidadVentas,
            'cantidadClientes' => $cantidadClientes,
            'consultasPendientes' => $consultasPendientes,
            'ventasSemanal'    => $ventasSemanal,
            'ultimosPedidos'   => $ultimosPedidos,
            'totalUsuarios'    => $usuarios->where('deleted_at', null)->countAllResults(),
            'totalFacturas'    => $cantidadVentas,
        ];
    
        return view('admin/dashboard', $data);
    }


    public function informes()
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


