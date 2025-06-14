<?php

namespace App\Models;

use CodeIgniter\Model;

class CartItemModel extends Model
{
    protected $table = 'cart_item';
    protected $primaryKey = 'cart_item_id';

    protected $allowedFields = [
        'user_id', 'product_id', 'quantity'
    ];

    protected $useTimestamps = false;
    protected $returnType = 'array';

    protected $useSoftDeletes = false;
}
