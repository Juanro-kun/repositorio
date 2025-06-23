<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<h2 class="fw-bold mb-3">Editar Usuario</h2>

<?php if (session()->getFlashdata('errors')): ?>
  <div class="alert alert-danger">
    <ul class="mb-0">
      <?php foreach (session()->getFlashdata('errors') as $error): ?>
        <li><?= esc($error) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>

<form action="<?= base_url('admin/usuarios/actualizar/' . $usuario['user_id']) ?>" method="post">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label class="form-label">Nombre</label>
      <input type="text" class="form-control" name="fname" value="<?= esc($usuario['fname']) ?>" required>
    </div>
    <div class="col-md-6 mb-3">
      <label class="form-label">Apellido</label>
      <input type="text" class="form-control" name="lname" value="<?= esc($usuario['lname']) ?>" required>
    </div>
    <div class="col-md-6 mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" name="mail" value="<?= esc($usuario['mail']) ?>" required>
    </div>
    <div class="col-md-6 mb-3">
      <label class="form-label">Rol</label>
      <select name="role" class="form-select" required>
        <option value="admin" <?= $usuario['role'] == 'admin' ? 'selected' : '' ?>>Administrador</option>
        <option value="user" <?= $usuario['role'] == 'user' ? 'selected' : '' ?>>Cliente</option>
      </select>
    </div>
    <div class="col-12 text-end">
      <button type="submit" class="btn btn-danger"><i class="bi bi-save me-1"></i> Actualizar</button>
    </div>
  </div>
</form>

<?= $this->endSection() ?>
