<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\InvoiceModel;

class PerfilController extends BaseController
{
    public function index()
    {
        if (!session()->has('user_id')) return redirect()->to('/login');
        $userModel = new UserModel();
        $usuario = $userModel->find(session('user_id'));
        return view('perfil/index', ['usuario' => $usuario]);
    }

    public function editar()
    {
        $userModel = new UserModel();
        $usuario = $userModel->find(session('user_id'));
        return view('perfil/editar', ['usuario' => $usuario]);
    }

    public function actualizar()
    {
        $userModel = new UserModel();
        $id = session('user_id');

        $fname = $this->request->getPost('fname');
        $lname = $this->request->getPost('lname');
        $mail = $this->request->getPost('mail');
        $pass1 = $this->request->getPost('contraseña');
        $pass2 = $this->request->getPost('contraseña2');

        // Datos básicos obligatorios
        $data = [
            'fname' => $fname,
            'lname' => $lname,
            'mail'  => $mail
        ];

        // Si el usuario escribió una nueva contraseña...
        if (!empty($pass1) || !empty($pass2)) {
            if ($pass1 !== $pass2) {
                return redirect()->back()->withInput()->with('error', 'Las contraseñas no coinciden.');
            }

            // Hasheamos la nueva contraseña
            $data['password'] = password_hash($pass1, PASSWORD_DEFAULT);
        }

        $userModel->update($id, $data);

        return redirect()->to('/perfil')->with('success', 'Datos actualizados correctamente.');
    }


    public function pedidos()
    {
        $db = \Config\Database::connect();
        $pedidos = $db->table('invoice')
            ->where('user_id', session('user_id'))
            ->orderBy('created_at', 'desc')
            ->get()->getResultArray();

        return view('perfil/pedidos', ['pedidos' => $pedidos]);
    }

    public function verPedido($id)
    {
        $db = \Config\Database::connect();
        $user_id = session('user_id');

        $factura = $db->table('invoice')
            ->where('invoice_id', $id)
            ->where('user_id', $user_id)
            ->get()->getRowArray();

        if (!$factura) {
            return redirect()->to('perfil/pedidos')->with('error', 'Pedido no encontrado.');
        }

        $productos = $db->table('invoice_item ii')
            ->select('ii.*, p.name, p.image, p.description')
            ->join('product p', 'ii.product_id = p.product_id')
            ->where('ii.invoice_id', $id)
            ->get()->getResultArray();

        return view('perfil/ver_pedido', [
            'factura' => $factura,
            'productos' => $productos
        ]);
    }
}
