<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class InventarioController extends BaseController
{
    public function index()
    {
        $model = new ProductModel();

        $productos = $model->getProductosConCategoria(); 
        $stockBajo = 0;
        $agotados = 0;
        
        foreach ($productos as &$prod) {
            $stock = (int) $prod['stock'];
            if ($stock == 0) {
                $prod['estado'] = 'Agotado';
                $agotados++;
            } elseif ($stock <= 10) {
                $prod['estado'] = 'Stock Bajo';
                $stockBajo++;
            } else {
                $prod['estado'] = 'En Stock';
            }
        }
        
        $data = [
            'productos' => $productos,
            'stockBajo' => $stockBajo,
            'agotados'  => $agotados,
            'total'     => count($productos)
        ];
        
        return view('admin/inventario', $data);
    }

    public function nuevoProducto()
    {
        $categorias = (new CategoryModel())->findAll();
        return view('admin/inventario_agregar', ['categorias' => $categorias]);
    }

    public function cargarProducto() 
    {
        $producto = new ProductModel();
        $imageName = 'default.png'; // Imagen por defecto ubicada en public/uploads

        $imagen = $this->request->getFile('image');
        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $imageName = $imagen->getRandomName();
            $imagen->move(ROOTPATH . 'public/uploads', $imageName);
        }

        // Armar JSON de descripción extendida
        $descripcionJson = json_encode([
            'descripcion' => $this->request->getPost('description'),
            'marca'       => $this->request->getPost('brand'),
            'edad'        => $this->request->getPost('age'),
            'jugadores'   => $this->request->getPost('players'),
            'formato'     => $this->request->getPost('format'),
        ]);

        $producto->insert([
            'name'        => $this->request->getPost('name'),
            'description' => $descripcionJson,
            'price'       => $this->request->getPost('price'),
            'discount'    => $this->request->getPost('discount'),
            'stock'       => $this->request->getPost('stock'),
            'category_id' => $this->request->getPost('category_id'),
            'image'       => $imageName
        ]);

        return redirect()->to(base_url('admin/inventario'))->with('success', 'Producto agregado correctamente.');
    }

    public function editarProducto($id)
    {
        $producto = (new ProductModel())->find($id);
        $categorias = (new CategoryModel())->findAll();

        if (!$producto) return redirect()->to('admin/inventario')->with('error', 'Producto no encontrado');

        return view('admin/inventario_editar', [
            'producto' => $producto,
            'categorias' => $categorias
        ]);
    }

    public function actualizarProducto($id)
    {
        $model = new ProductModel();
        $producto = $model->find($id);

        // Armar el JSON desde los campos individuales
        $descripcionJson = json_encode([
            'descripcion' => $this->request->getPost('descripcion'),
            'marca'       => $this->request->getPost('marca'),
            'edad'        => $this->request->getPost('edad'),
            'jugadores'   => $this->request->getPost('jugadores'),
            'formato'     => $this->request->getPost('formato'),
        ]);

        $data = [
            'name'        => $this->request->getPost('name'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'discount'    => $this->request->getPost('discount'),
            'description' => $descripcionJson,
            'category_id' => $this->request->getPost('category_id')
        ];

        // Imagen
        $imagen = $this->request->getFile('image');
        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $nombreImagen = $imagen->getRandomName();
            $imagen->move(ROOTPATH . 'public/uploads', $nombreImagen);

            // Eliminar anterior si existe
            if (!empty($producto['image']) && file_exists(ROOTPATH . 'public/uploads/' . $producto['image'])) {
                unlink(ROOTPATH . 'public/uploads/' . $producto['image']);
            }

            $data['image'] = $nombreImagen;
        }

        $model->update($id, $data);
        return redirect()->to('admin/inventario')->with('success', 'Producto actualizado correctamente.');
    }


    public function eliminar($id)
    {
        $productoModel = new \App\Models\ProductModel();
        $productoModel->delete($id); // Soft delete

        return redirect()->to('admin/inventario')->with('success', 'Producto eliminado correctamente.');
    }

    public function eliminados()
    {
        $productoModel = new \App\Models\ProductModel();
        $productosEliminados = $productoModel
        ->select('product.*, category.category_name as categoria')
        ->join('category', 'product.category_id = category.category_id')
        ->onlyDeleted()
        ->findAll();


        return view('admin/productos_eliminados', [
            'productos' => $productosEliminados
        ]);
    }

    public function restaurar($id)
    {
        $productoModel = new \App\Models\ProductModel();
        $productoModel->update($id, ['deleted_at' => null]);

        return redirect()->to('admin/inventario/eliminados')->with('success', 'Producto restaurado correctamente.');
    }

}