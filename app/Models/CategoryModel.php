<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'category_id';

    protected $allowedFields = ['category_name'];

    protected $useTimestamps = false;
    protected $returnType = 'array';

    public function getCategoriasConConteo()
    {
        return $this->select('category.*, COUNT(product.product_id) as total_productos')
                    ->join('product', 'product.category_id = category.category_id', 'left')
                    ->groupBy('category.category_id')
                    ->findAll();
    }
}