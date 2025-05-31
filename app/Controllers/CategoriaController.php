<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoriaController extends BaseController
{
    public function index()
    {
        $model = new CategoryModel();
        $categorias = $model->getCategoriasConConteo();

        return view('admin/categorias', ['categorias' => $categorias]);
    }

    public function actualizarCategoria()
    {
        $model = new CategoryModel();
        $id = $this->request->getPost('category_id');
        $data = [
            'category_name' => $this->request->getPost('category_name'),
            
        ];
        $model->update($id, $data);
        return redirect()->to('admin/categorias')->with('success', 'Categoría actualizada.');
    }

    public function cargarCategoria()
    {
        $categoria = new CategoryModel();

        $data = [
            'category_name' => $this->request->getPost('category_name'),
        ];

        $categoria->insert($data);

        return redirect()->to(base_url('admin/categorias'))->with('success', 'Categoría agregada correctamente.');
    }

    public function eliminarCategoria($id)
    {
        $categoria = new CategoryModel();

        $categoria->delete($id);

        return redirect()->to('admin/categorias')->with('success', 'Categoría eliminada correctamente.');
    }
}