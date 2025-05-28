<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceItemModel extends Model
{
    protected $table = 'invoice_item';
    protected $primaryKey = 'invoice_item_id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'invoice_id',
        'product_id',
        'quantity',
        'price_at_purchase',
        'discount',
        'subtotal'
    ];
}
