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
        $productoModel = new \App\Models\ProductModel();

        // Verifica si hay productos asociados a esta categoría
        $productosAsociados = $productoModel->where('category_id', $id)->countAllResults();

        if ($productosAsociados > 0) {
            return redirect()->to('admin/categorias')->with('error', 'No se puede eliminar la categoría porque tiene productos asociados.');
        }

        // Si no tiene productos, se elimina normalmente
        $categoria->delete($id);

        return redirect()->to('admin/categorias')->with('success', 'Categoría eliminada correctamente.');
    }

}