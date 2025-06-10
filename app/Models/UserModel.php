<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;

    protected $useSoftDeletes   = true;
    protected $deletedField     = 'deleted_at';

    protected $skipValidation   = false;
    protected $returnType       = 'array'; 

    protected $allowedFields = [
        'username',
        'fname',
        'lname',
        'role',
        'mail',
        'password',
        'deleted_at'
    ];

    // Validaciones
    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[255]',
        'fname'    => 'permit_empty|max_length[255]',
        'lname'    => 'permit_empty|max_length[255]',
        'role'     => 'required|max_length[50]',
        'mail'     => 'required|valid_email|max_length[255]|is_unique[user.mail]',
        'password' => 'required|min_length[6]|max_length[255]',
    ];

    protected $validationMessages = [
        'mail' => [
            'is_unique' => 'Este correo ya está registrado.',
        ]
    ];

    public function restore($id){
        return $this->update($id, ['deleted_at' => null]);
    }
}