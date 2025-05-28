<?php

namespace App\Models;
use CodeIgniter\Model;

class InvoiceModel extends Model
{
    protected $table            = 'invoice';
    protected $primaryKey       = 'invoice_id';
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'user_id', 'total', 'created_at'
    ];
}
