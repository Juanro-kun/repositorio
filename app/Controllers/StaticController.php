<?php

namespace App\Controllers;

class StaticController extends BaseController{

    public function quienes()
    {
        return view('quienes', ['title' => 'Quiénes Somos']);
    }

    public function nuevos_jugadores()
    {
        return view('nuevos_jugadores');
    }

    public function comercializacion()
    {
    return view('comercializacion', ['title' => 'Comercialización']);
    }

    public function terminos()
    {
        return view('terminos');
    }

    public function proximamente()
    {
        return view('proximamente');
    }
}