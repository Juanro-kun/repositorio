<?php

namespace App\Models;
use CodeIgniter\Model;

class WishItemModel extends Model
{
    protected $table            = 'wish_item';
    protected $primaryKey       = 'wish_item_id';
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'user_id', 'product_id', 'quantity'
    ];
}

