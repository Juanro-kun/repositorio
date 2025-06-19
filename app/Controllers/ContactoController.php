<?php

namespace App\Controllers;

use App\Models\InquiryModel;
use App\Models\ContactModel;

class ContactoController extends BaseController
{
    public function index()
    {
        return view('contacto');
    }

    public function enviarContacto()
    {
        $rules = [
            'fname'   => 'required|trim|min_length[2]',
            'lname'   => 'required|trim|min_length[2]',
            'mail'    => 'required|valid_email',
            'subject' => 'required|trim|min_length[2]',
            'message' => 'required|trim|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name'       => trim($this->request->getPost('fname') . ' ' . $this->request->getPost('lname')),
            'mail'       => $this->request->getPost('mail'),
            'subject'    => $this->request->getPost('subject'),
            'message'    => $this->request->getPost('message'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $contactModel = new ContactModel();
        $contactModel->insert($data);

        return redirect()->to('contacto/confirmacion')->with('success', 'Mensaje enviado correctamente');
    }

    public function enviarInquiry()
    {
        $rules = [
            'subject' => 'required|trim|min_length[2]',
            'message' => 'required|trim|min_length[5]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'user_id'    => session()->get('user_id'),
            'subject'    => $this->request->getPost('subject'),
            'message'    => $this->request->getPost('message'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $inquiryModel = new \App\Models\InquiryModel();
        $inquiryModel->insert($data);

        return redirect()->to('contacto/confirmacion')->with('success', 'Mensaje enviado correctamente');
    }

    public function confirmacion()
    {
        return view('confirmacion'); // Está en views/
    }
}
