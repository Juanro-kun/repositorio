<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<h2 class="fw-bold mb-3">Usuarios</h2>
<p class="text-muted">Gestiona los usuarios del sistema.</p>

<div class="row mb-4">
  <div class="col-md-4">
    <div class="bg-white border p-3 rounded shadow-sm text-center">
      <h4><?= $total_admins ?></h4>
      <div class="text-danger">Administradores</div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="bg-white border p-3 rounded shadow-sm text-center">
      <h4><?= $total_users ?></h4>
      <div class="text-success">Clientes</div>
    </div>
  </div>
  <div class="col-md-4 d-flex align-items-center justify-content-end">
    <a href="<?= base_url('admin/usuarios/nuevo') ?>" class="btn btn-danger">
      <i class="bi bi-plus-circle me-1"></i> Agregar Usuario
    </a>
  </div>
</div>

<div class="card shadow-sm border-0">
  <div class="card-header bg-white fw-bold">Todos los Usuarios</div>
  <div class="table-responsive">
    <table class="table align-middle mb-0">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Email</th>
          <th>Rol</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($usuarios as $u): ?>
          <tr>
            <td><?= esc($u['fname'] . ' ' . $u['lname']) ?></td>
            <td><?= esc($u['mail']) ?></td>
            <td>
              <?php if ($u['role'] === 'admin'): ?>
                <span class="badge bg-danger">Administrador</span>
              <?php else: ?>
                <span class="badge bg-success">Cliente</span>
              <?php endif ?>
            </td>
            <td>
              <a href="<?= base_url('admin/usuarios/editar/' . $u['user_id']) ?>" class="btn btn-sm btn-outline-dark">Editar</a>
              <form action="<?= base_url('admin/usuarios/eliminar/' . $u['user_id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('¿Estás seguro de que querés eliminar este usuario?')">
                  <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
              </form>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>
