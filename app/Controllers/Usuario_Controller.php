<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Usuario_Controller extends Controller
{
    public function index()
    {
        $model = new UsuarioModel();
        $data['usuarios'] = $model->findAll();
        return view('back/usuarios/lista', $data);
    }

    public function agregar()
    {
        return view('back/usuarios/agregausuario_view');
    }

    public function guardar()
    {
        $model = new UsuarioModel();

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'usuario' => $this->request->getPost('usuario'),
            'pass' => password_hash($this->request->getPost('pass'), PASSWORD_DEFAULT),
            'perfil_id' => $this->request->getPost('perfil_id'),
            'baja' => 'No',
        ];

        $model->insert($data);
        return redirect()->to('/usuarios');
    }

    public function eliminar($id)
    {
        $model = new UsuarioModel();
        $model->delete($id);
        return redirect()->to('/usuarios');
    }
}
