<?php

namespace App\Controllers;

class DescargasController extends BaseController{

    public function hoja_de_personaje(){
        $ruta = FCPATH . '/character_sheet.pdf';

        if (file_exists($ruta)) {
            return $this->response->download($ruta, null);
        } else {
            return redirect()->back()->with('error', 'Archivo no encontrado');
        }

    }
}