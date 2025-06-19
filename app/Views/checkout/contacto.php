<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>
<div class="container py-5">
  <div class="bg-dark text-white p-4 rounded shadow">
    <h2 class="mb-4">📨 Paso 1: Información de Contacto</h2>

    <!-- Mostrar errores de validación -->
    <?php if (isset($validation)): ?>
      <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('checkout/guardarContacto') ?>" method="post" novalidate>
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nombre" id="nombre" required minlength="2" placeholder="Tu nombre">
      </div>

      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" name="apellido" id="apellido" required minlength="2" placeholder="Tu apellido">
      </div>

      <div class="text-end">
        <button type="submit" class="btn btn-danger">Continuar a Dirección <i class="bi bi-arrow-right"></i></button>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>
