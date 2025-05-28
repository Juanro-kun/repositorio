<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificacionModel extends Model
{
    protected $table            = 'notification'; // nombre real de tu tabla
    protected $primaryKey       = 'notification_id'; // ajustá al campo clave primaria real
    protected $allowedFields    = ['titulo', 'mensaje', 'tipo', 'leida', 'fecha'];
    protected $useTimestamps    = false;
}
