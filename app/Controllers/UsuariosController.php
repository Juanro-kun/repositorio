<?php

namespace App\Controllers;

use App\Models\UserModel;

class UsuariosController extends BaseController
{
    public function index()
    {
        $usuarioModel = new UserModel();

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
        $userModel = new UserModel();

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
        $usuarioModel = new UserModel();
        $usuario = $usuarioModel->find($id);

        if (!$usuario) {
            return redirect()->to('admin/usuarios')->with('error', 'Usuario no encontrado.');
        }

        return view('admin/usuario_editar', ['usuario' => $usuario]);
    }

    public function actualizarUsuario($id)
    {
    $usuarioModel = new UserModel();
    $usuarioActual = $usuarioModel->find($id);

    if (!$usuarioActual) {
        return redirect()->to('admin/usuarios')->with('error', 'Usuario no encontrado.');
    }

    $nuevoMail = $this->request->getPost('mail');

    $usuarioModel->setValidationRules([
        'fname' => 'required|max_length[255]',
        'lname' => 'required|max_length[255]',
        'mail'  => ($usuarioActual['mail'] === $nuevoMail)
                    ? 'required|valid_email|max_length[255]'
                    : 'required|valid_email|max_length[255]|is_unique[user.mail]',
        'role'  => 'required|in_list[user,admin]'
    ]);

    $data = [
        'fname' => $this->request->getPost('fname'),
        'lname' => $this->request->getPost('lname'),
        'mail'  => $nuevoMail,
        'role'  => $this->request->getPost('role')
    ];

    if (!$usuarioModel->update($id, $data)) {
        return redirect()->back()->withInput()->with('errors', $usuarioModel->errors());
    }

    return redirect()->to('admin/usuarios')->with('success', 'Usuario actualizado correctamente.');
    }


    public function eliminarUsuario($id)
    {
        $usuarioModel = new UserModel();
        $usuario = $usuarioModel->find($id);

        if ($usuario) {
            $usuarioModel->delete($id);
            return redirect()->to('admin/usuarios')->with('success', 'Usuario eliminado correctamente.');
        }

        return redirect()->to('admin/usuarios')->with('error', 'Usuario no encontrado.');
    }

    public function eliminados()
    {
        $usuarioModel = new UserModel();
        $usuarios = $usuarioModel->onlyDeleted()->findAll();

        return view('admin/usuarios_eliminados', ['usuarios' => $usuarios]);
    }

    public function restaurar($id)
    {
        $usuarioModel = new UserModel();
        $usuarioModel->update($id, ['deleted_at' => null]);

        return redirect()->to('admin/usuarios/eliminados')->with('success', 'Usuario restaurado correctamente.');
    }
}
