<?php

namespace App\Controllers;

class AuthController extends BaseController{
    public function login()
    {
        return view('login_view');
    }

    public function register()
    {
        return view('register_view');
    }

    public function process_register(){

        $userModel = new \App\Models\UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'mail'     => $this->request->getPost('mail'),
            'password' => $this->request->getPost('password'),
            'password_confirm' => $this->request->getPost('password_confirm'),
        ];

        if ($data['password'] !== $data['password_confirm']) {
            return redirect()->back()->withInput()->with('error', 'Las contraseñas no coinciden.');
        }

        unset($data['password_confirm']);
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $data['role'] = 1;

        if (!$userModel->insert($data)) {
            return redirect()->back()->withInput()->with('error', 'Error al registrar el usuario.');
        }

        return redirect()->to('/login')->with('success', 'Registro exitoso. Ingresá al grimorio.');
    }
}