<?php

namespace App\Controllers;

use App\Models\InquiryModel;
use App\Models\ContactModel;

class ConsultasController extends BaseController
{
    public function index()
    {
        $inquiryModel = new InquiryModel();
        $contactModel = new ContactModel();

        $inquiries = $inquiryModel->where('deleted_at', null)->findAll();
        $contacts  = $contactModel->where('deleted_at', null)->findAll();

        return view('admin/consultas', [
            'inquiries' => $inquiries,
            'contacts'  => $contacts,
        ]);
    }

    public function eliminar($tipo, $id)
    {
        $model = $tipo === 'inquiry' ? new InquiryModel() : new ContactModel();

        if ($model->find($id)) {
            $model->delete($id);
            return redirect()->to('admin/consultas')->with('success', 'Consulta eliminada correctamente.');
        }

        return redirect()->to('admin/consultas')->with('error', 'Consulta no encontrada.');
    }
}

