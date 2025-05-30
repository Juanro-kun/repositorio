<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<h2 class="fw-bold mb-3">Nuevo Usuario</h2>

<form action="<?= base_url('admin/usuarios/guardar') ?>" method="post">
  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="fname" class="form-label">Nombre *</label>
      <input type="text" class="form-control" id="fname" name="fname" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="lname" class="form-label">Apellido *</label>
      <input type="text" class="form-control" id="lname" name="lname" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="mail" class="form-label">Correo Electrónico *</label>
      <input type="email" class="form-control" id="mail" name="mail" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="role" class="form-label">Rol *</label>
      <select class="form-select" id="role" name="role" required>
        <option value="user">Cliente</option>
        <option value="admin">Administrador</option>
      </select>
    </div>
    <div class="col-md-6 mb-3">
      <label for="username" class="form-label">Usuario *</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="password" class="form-label">Contraseña *</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="col-12 text-end">
      <button type="submit" class="btn btn-danger"><i class="bi bi-save me-1"></i> Guardar Usuario</button>
    </div>
  </div>
</form>

<?= $this->endSection() ?>
