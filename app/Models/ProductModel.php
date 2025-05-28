<?php

namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'product';
    protected $primaryKey       = 'product_id';
    protected $useSoftDeletes   = true;
    protected $deletedField     = 'deleted_at';
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'name', 'description', 'category_id', 'discount', 'price', 'stock', 'deleted_at', 'image'
    ];
}
