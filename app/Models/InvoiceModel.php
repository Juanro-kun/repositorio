<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceModel extends Model
{
    protected $table = 'invoice';
    protected $primaryKey = 'invoice_id';

    protected $allowedFields = [
        'user_id',
        'total',
        'created_at'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; 
    protected $returnType = 'array';

    public function getLastMonthInvoices()
    {
        $lastMonth = date('Y-m-d H:i:s', strtotime('-1 month'));// Calcula la fecha exacta de hace un mes desde ahora
        
        return $this->where('created_at >=', $lastMonth)->findAll();// Devuelve todas las facturas con created_at posterior a esa fecha
    }
}