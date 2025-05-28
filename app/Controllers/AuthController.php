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
            $errors = $userModel->errors();
    
            if (isset($errors['mail']) && str_contains($errors['mail'], 'registrado')) {
                return redirect()->back()->withInput()->with('error', $errors['mail']); 
            }
            return redirect()->back()->withInput()->with('error', 'Error al registrar el usuario.');
        }

        return redirect()->to('/login')->with('success', 'Registro exitoso. Ingresá al grimorio.');
    }

    public function process_login()
    {
        $session = session();
        $userModel = new \App\Models\UserModel();

        $email = $this->request->getPost('mail');
        $password = $this->request->getPost('password');

        $user = $userModel->where('mail', $email)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Correo o contraseña incorrectos');
        }

        $session->set([
            'user_id' => $user['user_id'],
            'username' => $user['username'],
            'role' => $user['role'],
            'isLoggedIn' => true,
        ]);

        if ($user['role'] == 1) {
            return redirect()->to('/');
        } elseif ($user['role'] == 2) {
            return redirect()->to('/pagina-admin');
        } else {
            return redirect()->to('/'); // por si tiene otro rol inesperado
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}