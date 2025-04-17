<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('nueva_plantilla');
    }

    public function quienes()
    {
        return view('quienes', ['title' => 'Quiénes Somos']);
    }

    public function comercializacion()
    {
    return view('comercializacion', ['title' => 'Comercialización']);
    }

    public function contacto()
    {
    return view('contacto');
    }

    public function terminos()
    {
        return view('terminos');
    }
    

}


