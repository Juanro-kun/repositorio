<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<div class="container py-5 text-white">
  <h2 class="mb-4"><i class="bi bi-pencil-square me-2"></i>Editar Perfil</h2>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
      <?= esc(session('error')) ?>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
      <?= esc(session('success')) ?>
    </div>
  <?php endif; ?>

  <form action="<?= base_url('perfil/actualizar') ?>" method="post" class="bg-dark p-4 rounded shadow-sm">
    <div class="mb-3">
      <label>Nombre</label>
      <input type="text" name="fname" value="<?= esc($usuario['fname']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Apellido</label>
      <input type="text" name="lname" value="<?= esc($usuario['lname']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="mail" value="<?= esc($usuario['mail']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Contraseña (solo si querés cambiarla)</label>
      <input type="password" name="password" class="form-control">
    </div>
    <div class="mb-3">
      <label>Confirmar contraseña</label>
      <input type="password" name="password2" class="form-control">
    </div>
    <div class="text-end">
      <button type="submit" class="btn btn-warning">Guardar cambios</button>
      <a href="<?= base_url('perfil') ?>" class="btn btn-outline-light">Cancelar</a>
    </div>
  </form>
</div>

<?= $this->endSection() ?>
