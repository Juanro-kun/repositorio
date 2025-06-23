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

    $usuarioActual = $userModel->find($id);
    if (!$usuarioActual) {
        return redirect()->back()->with('error', 'Usuario no encontrado.');
    }

    // Limpiar entradas
    $fname = trim($this->request->getPost('fname'));
    $lname = trim($this->request->getPost('lname'));
    $mailNuevo = strtolower(trim($this->request->getPost('mail')));
    $mailActual = strtolower(trim($usuarioActual['mail']));
    $pass1 = $this->request->getPost('password');
    $pass2 = $this->request->getPost('password2');

    // Reglas dinámicas
    $rules = [
        'fname' => 'required|max_length[255]',
        'lname' => 'required|max_length[255]',
        'mail'  => ($mailActual === $mailNuevo)
                    ? 'required|valid_email|max_length[255]'
                    : 'required|valid_email|max_length[255]|is_unique[user.mail]',
    ];

    if (!empty($pass1) || !empty($pass2)) {
        if ($pass1 !== $pass2) {
            return redirect()->back()->withInput()->with('error', 'Las contraseñas no coinciden.');
        }
        $rules['password'] = 'required|min_length[6]|max_length[255]';
    }

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('error', implode(' ', $this->validator->getErrors()));
    }

    // Armar datos a guardar
    $data = [
        'fname' => $fname,
        'lname' => $lname,
        'mail'  => $mailNuevo
    ];

    if (!empty($pass1)) {
        $data['password'] = password_hash($pass1, PASSWORD_DEFAULT);
    }

    // Aplicar reglas personalizadas al modelo
    $userModel->setValidationRules($rules);

    // Intentar actualizar
    if (!$userModel->update($id, $data)) {
        echo '<h2>Errores:</h2><pre>';
        print_r($userModel->errors());
        echo '</pre><h2>Datos enviados:</h2><pre>';
        print_r($data);
        echo '</pre>';
        exit;
    }

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
