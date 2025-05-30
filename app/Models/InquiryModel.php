<?php

namespace App\Models;
use CodeIgniter\Model;

class InquiryModel extends Model
{
    protected $table            = 'inquiry';
    protected $primaryKey       = 'inquiry_id';
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'user_id', 'subject', 'message', 'created_at', 'deleted_at'
    ];

    protected $useSoftDeletes   = true;
    protected $deletedField     = 'deleted_at';
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = '';
}
