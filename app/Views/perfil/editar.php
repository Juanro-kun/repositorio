<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<div class="container py-5 text-white">
  <h2 class="mb-4"><i class="bi bi-pencil-square me-2"></i>Editar Perfil</h2>

  <form action="<?= base_url('perfil/actualizar') ?>" method="post" enctype="multipart/form-data" class="bg-dark p-4 rounded shadow-sm">
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
    <button type="submit" class="btn btn-warning">Guardar cambios</button>
    <a href="<?= base_url('perfil') ?>" class="btn btn-outline-light">Cancelar</a>
  </form>
</div>

<?= $this->endSection() ?>
