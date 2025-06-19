<?= $this->extend('layout') ?>

<?= $this->section('contenido') ?>
<section class="section-dark py-5">
  <div class="container d-flex justify-content-center align-items-center">
    <div class="card shadow-lg p-5 text-white bg-dark" style="max-width: 600px; width: 100%; border-radius: 20px; border: 1px solid rgba(0,255,0,0.2);">
      <div class="text-center">
        <i class="fas fa-circle-check fa-3x text-success mb-4"></i>
        <h2 class="fw-bold mb-3 text-success">¡Mensaje Enviado!</h2>

        <?php if (session()->getFlashdata('success')): ?>
          <div class="alert alert-success bg-success bg-opacity-10 text-light border-success rounded-3 px-4 py-2">
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>

        <p class="mb-3 fs-5">
          Gracias por comunicarte con <strong>La Taberna del Gnomo Errante</strong>.<br>
          Tu mensaje fue recibido correctamente.
        </p>

        <a href="<?= base_url('/') ?>" class="btn btn-success rounded-pill px-4 mt-2">
          <i class="fas fa-arrow-left me-2"></i> Volver al Inicio
        </a>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>
