<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<h2 class="fw-bold mb-3">Usuarios Eliminados</h2>

<a href="<?= base_url('admin/usuarios') ?>" class="btn btn-outline-dark mb-4">
  <i class="bi bi-arrow-left"></i> Volver a Usuarios
</a>

<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
  </div>
<?php endif ?>

<div class="card shadow-sm border-0">
  <div class="card-header bg-white fw-bold">Lista de Usuarios Eliminados</div>
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
        <?php if (!empty($usuarios)): ?>
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
                <a href="<?= base_url('admin/usuarios/restaurar/' . $u['user_id']) ?>" class="btn btn-sm btn-success">
                  Restaurar
                </a>
              </td>
            </tr>
          <?php endforeach ?>
        <?php else: ?>
          <tr>
            <td colspan="4" class="text-center text-muted">No hay usuarios eliminados.</td>
          </tr>
        <?php endif ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>