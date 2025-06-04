<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;


class CatalogoController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $categoriaModel = new CategoryModel();

        $busqueda = $this->request->getGet('busqueda');
        $categoria = $this->request->getGet('categoria');
        $precio = $this->request->getGet('precio');

        $builder = $productModel->where('deleted_at', null);

        if ($busqueda) {
            $builder->like('name', $busqueda);
        }

        if ($categoria) {
            $builder->where('category_id', $categoria);
        }

        if ($precio == 'menos10000') {
            $builder->where('price <', 10000);
        } elseif ($precio == 'entre10000y50000') {
            $builder->where('price >=', 10000)->where('price <=', 50000);
        } elseif ($precio == 'mas50000') {
            $builder->where('price >', 50000);
        }

        $productos = $builder->findAll();
        $categorias = $categoriaModel->findAll();

        return view('catalogo', ['productos' => $productos, 'categorias' => $categorias]);
    }

    public function catalogoDetalle($id)
    {
        $productoModel = new ProductModel();
        $producto = $productoModel->find($id);

        if (!$producto) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Producto no encontrado.");
        }

        return view('detalle_producto', ['producto' => $producto]);
    }
}
