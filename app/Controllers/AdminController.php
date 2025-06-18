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

        // Ventas Semanales
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

        // Ventas Mensuales
        $ventasMensualRaw = $facturas->select("DATE(created_at) as fecha, SUM(total) as total")
            ->where("created_at >=", date('Y-m-d', strtotime('-29 days')))
            ->groupBy("DATE(created_at)")
            ->orderBy("fecha", "ASC")
            ->get()
            ->getResultArray();

        $diasMes = [];
        for ($i = 29; $i >= 0; $i--) {
            $fecha = date('d/m', strtotime("-$i days"));
            $diasMes[$fecha] = 0;
        }
        foreach ($ventasMensualRaw as $row) {
            $fechaKey = date('d/m', strtotime($row['fecha']));
            $diasMes[$fechaKey] = (float) $row['total'];
        }
        $ventasMensual = [
            'dias' => array_keys($diasMes),
            'totales' => array_values($diasMes),
        ];

        // Ventas Anuales
        $ventasAnualRaw = $facturas->select("MONTH(created_at) as mes, SUM(total) as total")
            ->where("created_at >=", date('Y-01-01'))
            ->groupBy("MONTH(created_at)")
            ->orderBy("mes", "ASC")
            ->get()
            ->getResultArray();

        $meses = ['Ene'=>0, 'Feb'=>0, 'Mar'=>0, 'Abr'=>0, 'May'=>0, 'Jun'=>0, 'Jul'=>0, 'Ago'=>0, 'Sep'=>0, 'Oct'=>0, 'Nov'=>0, 'Dic'=>0];
        foreach ($ventasAnualRaw as $row) {
            $mesIndex = (int) $row['mes'];
            $mesTexto = ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'][$mesIndex - 1];
            $meses[$mesTexto] = (float) $row['total'];
        }

        $ventasAnual = [
            'meses' => array_keys($meses),
            'totales' => array_values($meses)
        ];

        // Últimos pedidos
        $db = \Config\Database::connect();
        $ultimosPedidos = $db->table('invoice i')
            ->select('i.*, u.fname as nombre, u.lname as apellido')
            ->join('user u', 'i.user_id = u.user_id')
            ->orderBy('i.created_at', 'DESC')
            ->limit(5)
            ->get()
            ->getResultArray();

        // Consultas pendientes
        $consultasPendientes = $consultas->where('deleted_at', null)->countAllResults()
            + $contactos->where('deleted_at', null)->countAllResults();

        $data = [
            'ingresosDelMes'   => $ingresosDelMes,
            'cantidadVentas'   => $cantidadVentas,
            'cantidadClientes' => $cantidadClientes,
            'consultasPendientes' => $consultasPendientes,
            'ventasSemanal'    => $ventasSemanal,
            'ventasMensual'    => $ventasMensual,
            'ventasAnual'      => $ventasAnual,
            'ultimosPedidos'   => $ultimosPedidos
        ];

        return view('admin/dashboard', $data);
    }
}
