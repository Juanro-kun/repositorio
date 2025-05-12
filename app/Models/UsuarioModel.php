<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table      = 'usuarios';         // Nombre de la tabla
    protected $primaryKey = 'id';               // Clave primaria

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';      // También puede ser 'object'
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'nombre', 'apellido', 'email', 'usuario', 'pass', 'perfil_id', 'baja'
    ];

    protected $useTimestamps = false;          // O true si usás created_at y updated_at

    public function agregarUsuario($data)
    {
        return $this->insert($data);
    }

    public function obtenerUsuario($id)
    {
        return $this->find($id);
    }

    public function actualizarUsuario($id, $data)
    {
        return $this->update($id, $data);
    }

    public function eliminarUsuario($id)
    {
        return $this->delete($id);
    }
}

