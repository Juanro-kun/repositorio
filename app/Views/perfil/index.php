<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<div class="container py-5">
  <h2 class="mb-4 text-white">
    <i class="bi bi-person-circle me-2"></i> Mi Perfil
  </h2>
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
      <?= session('success') ?>
    </div>
  <?php endif; ?>

  <div class="card bg-dark text-white shadow-lg rounded-4 border-light p-4">
    <div class="row g-4 align-items-center">

      <div class="col-md-9">
        <h4 class="mb-2"><?= esc($usuario['fname']) . ' ' . esc($usuario['lname']) ?></h4>
        <p class="mb-3"><i class="bi bi-envelope me-2"></i><?= esc($usuario['mail']) ?></p>

        <div class="d-flex gap-2">
          <a href="<?= base_url('perfil/editar') ?>" class="btn btn-outline-warning">
            <i class="bi bi-pencil-square me-1"></i> Editar datos
          </a>
          <a href="<?= base_url('perfil/pedidos') ?>" class="btn btn-outline-light">
            <i class="bi bi-box-seam me-1"></i> Mis pedidos
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

