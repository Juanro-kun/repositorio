<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
{
    $productModel = new \App\Models\ProductModel();
    $destacados = $productModel->getMasVendidos();

    return view('nueva_plantilla', ['destacados' => $destacados]);
}


}


