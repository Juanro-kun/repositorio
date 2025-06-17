<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>
<div class="container py-5">
  <div class="bg-dark text-white p-4 rounded shadow">
    <h2 class="mb-4">📦 Paso 2: Dirección de Envío</h2>

    <?php if (isset($validation)): ?>
      <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('checkout/guardarEnvio') ?>" method="post" novalidate>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Nombre</label>
          <input type="text" class="form-control" name="nombre" required minlength="2" placeholder="Tu nombre">
        </div>
        <div class="col-md-6">
          <label class="form-label">Apellido</label>
          <input type="text" class="form-control" name="apellido" required minlength="2" placeholder="Tu apellido">
        </div>
        <div class="col-12">
          <label class="form-label">Dirección</label>
          <input type="text" class="form-control" name="direccion" required minlength="4" placeholder="Calle y número">
        </div>
        <div class="col-md-4">
          <label class="form-label">Ciudad</label>
          <input type="text" class="form-control" name="ciudad" required placeholder="Ej: Corrientes">
        </div>
        <div class="col-md-4">
          <label class="form-label">Provincia</label>
          <input type="text" class="form-control" name="provincia" required placeholder="Ej: Corrientes">
        </div>
        <div class="col-md-4">
          <label class="form-label">Código Postal</label>
          <input type="text" class="form-control" name="codigo_postal" required pattern="[0-9]{3,8}" title="Solo números entre 3 y 8 dígitos" placeholder="Ej: 3400">
        </div>
      </div>
      <div class="text-end mt-4">
        <button type="submit" class="btn btn-danger">Continuar a Pago <i class="bi bi-arrow-right"></i></button>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>
