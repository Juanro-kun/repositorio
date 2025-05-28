<?php

namespace App\Models;
use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table            = 'contact';
    protected $primaryKey       = 'contact_id';
    protected $useSoftDeletes   = true;
    protected $deletedField     = 'deleted_at';
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'name', 'mail', 'subject', 'message', 'created_at', 'deleted_at'
    ];
}
