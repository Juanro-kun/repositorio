<?php

namespace App\Controllers;

use App\Models\InquiryModel;
use App\Models\ContactModel;

class ContactoController extends BaseController
{
    public function index(){
        return view('contacto');
    }


    public function enviarContacto()
    {
        $data = [
            'name' => $this->request->getPost('fname') . ' ' . $this->request->getPost('lname'),
            'mail' => $this->request->getPost('mail'),
            'subject' => $this->request->getPost('subject'),
            'message' => $this->request->getPost('message'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $contactModel = new \App\Models\ContactModel();
        $contactModel->insert($data);

        return redirect()->to(base_url('contacto/confirmacion'))->with('success', 'Mensaje enviado correctamente');
    }

    public function enviarInquiry()
<<<<<<< HEAD
{
    $inquiryModel = new \App\Models\InquiryModel();

    $data = [
        'user_id' => session()->get('user_id'),
        'subject' => $this->request->getPost('subject'),
        'message' => $this->request->getPost('message'),
        'created_at' => date('Y-m-d H:i:s')
    ];

    $inquiryModel->insert($data);
    return redirect()->back()->with('success', 'Consulta enviada correctamente.');
}
=======
    {
        $inquiryModel = new \App\Models\InquiryModel();
    
        $data = [
            'user_id' => session()->get('user_id'),
            'subject' => $this->request->getPost('subject'),
            'message' => $this->request->getPost('message'),
            'created_at' => date('Y-m-d H:i:s')
        ];
    
        $inquiryModel->insert($data);
    
        return redirect()->to(base_url('contacto/confirmacion'))->with('success', 'Consulta enviada correctamente');
    }
    public function confirmacion()
    {
        return view('confirmacion');
    }
>>>>>>> prueba-catalogo
}