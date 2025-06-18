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

    public function eliminadas()
    {
        $inquiryModel = new InquiryModel();
        $contactModel = new ContactModel();

        $inquiries = $inquiryModel->onlyDeleted()->findAll();
        $contacts  = $contactModel->onlyDeleted()->findAll();

        return view('admin/consultas_eliminadas', [
            'inquiries' => $inquiries,
            'contacts'  => $contacts,
        ]);
    }

    public function restaurar($tipo, $id)
    {
        $model = $tipo === 'inquiry' ? new \App\Models\InquiryModel() : new \App\Models\ContactModel();

        if ($model->onlyDeleted()->find($id)) {
            $model->update($id, ['deleted_at' => null]);
            return redirect()->to('admin/consultas/eliminadas')->with('success', 'Consulta restaurada correctamente.');
        }

        return redirect()->to('admin/consultas/eliminadas')->with('error', 'No se pudo restaurar la consulta.');
    }


}

