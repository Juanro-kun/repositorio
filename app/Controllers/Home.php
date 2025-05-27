<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('nueva_plantilla');
    }

    public function contacto()
    {
    return view('contacto');
    }
}


