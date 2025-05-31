<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'product_id';
    protected $useAutoIncrement = true;

    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted_at';

    protected $useTimestamps = false;
    protected $returnType = 'array';

    protected $allowedFields = [
        'name',
        'description',
        'category_id',
        'discount',
        'price',
        'stock',
        'deleted_at',
        'image'
    ];

    public function getProductosConCategoria()
    {
        return $this->select('product.*, category.category_name as categoria')
                    ->join('category', 'product.category_id = category.category_id')
                    ->where('product.deleted_at', null)
                    ->findAll();
    }
}