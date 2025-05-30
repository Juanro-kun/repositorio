<?php

namespace App\Models;

use CodeIgniter\Model;

class WishItemModel extends Model
{
    protected $table = 'wish_item';
    protected $primaryKey = 'wish_item_id';

    protected $allowedFields = [
        'user_id',
        'product_id',
        'quantity' // si permitís desear varias unidades
    ];

    protected $useTimestamps = false;
    protected $returnType = 'array';
}


