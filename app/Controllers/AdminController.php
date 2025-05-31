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

    public function usuarios()
    {
        $usuarioModel = new \App\Models\UserModel();

        $usuarios = $usuarioModel->where('deleted_at', null)->findAll();

        $total_admins = $usuarioModel->where('role', 'admin')->where('deleted_at', null)->countAllResults();
        $total_users = $usuarioModel->where('role', 'user')->where('deleted_at', null)->countAllResults();

        return view('admin/usuarios', [
            'usuarios' => $usuarios,
            'total_admins' => $total_admins,
            'total_users' => $total_users
        ]);
    }

    public function nuevoUsuario()
    {
        return view('admin/usuario_nuevo');
    }

    public function guardarUsuario()
    {
        $userModel = new \App\Models\UserModel();

        $data = [
            'fname'    => $this->request->getPost('fname'),
            'lname'    => $this->request->getPost('lname'),
            'mail'     => $this->request->getPost('mail'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role'),
        ];

        $userModel->save($data);

        return redirect()->to('admin/usuarios')->with('success', 'Usuario creado correctamente.');
    }

    public function editarUsuario($id)
    {
        $usuarioModel = new \App\Models\UserModel();
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            return redirect()->to('admin/usuarios')->with('error', 'Usuario no encontrado.');
        }

        return view('admin/usuario_editar', ['usuario' => $usuario]);
    }

    public function actualizarUsuario($id)
    {
        $usuarioModel = new \App\Models\UserModel();

        $data = [
            'fname'    => $this->request->getPost('fname'),
            'lname'    => $this->request->getPost('lname'),
            'mail'     => $this->request->getPost('mail'),
            'role'     => $this->request->getPost('role'),
        ];

        $usuarioModel->update($id, $data);

        return redirect()->to('admin/usuarios')->with('success', 'Usuario actualizado correctamente.');
    }

    public function eliminarUsuario($id)
    {
        $usuarioModel = new \App\Models\UserModel();
        $usuario = $usuarioModel->find($id);

        if ($usuario) {
            $usuarioModel->delete($id);
            return redirect()->to(base_url('admin/usuarios'))->with('success', 'Usuario eliminado correctamente.');
        } else {
            return redirect()->to(base_url('admin/usuarios'))->with('error', 'Usuario no encontrado.');
        }
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

    public function notificaciones()
    {
        $db = \Config\Database::connect();

        // Obtener los últimos usuarios que no están eliminados
        $notificaciones = $db->table('user')
            ->select('user_id, fname, lname, mail, role')
            ->where('deleted_at IS NULL')
            ->orderBy('user_id', 'DESC')
            ->limit(10)
            ->get()->getResultArray();

        // Simulación de categorías
        $noLeidas = count($notificaciones);
        $porTipo = [
            'pedido' => 3,
            'inventario' => 5,
            'sistema' => 2
        ];

        return view('admin/notificaciones', [
            'notificaciones' => $notificaciones,
            'noLeidas'       => $noLeidas,
            'porTipo'        => $porTipo,
        ]);
    }

}


