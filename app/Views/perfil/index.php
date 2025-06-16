<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<div class="container py-5 text-white">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card bg-dark border-0 shadow-lg rounded-4">
        <div class="card-body text-center">
          <i class="bi bi-person-circle fs-1 text-danger mb-3"></i>
          <h3 class="fw-bold">¡Bienvenido, <?= esc($usuario['fname']) ?>!</h3>
          <p class="text-muted mb-4">
            Aquí podés consultar tu historial de pedidos y administrar tu cuenta.
          </p>

          <ul class="list-group list-group-flush text-start bg-dark">
            <li class="list-group-item bg-dark text-white border-secondary">
              <strong>Nombre:</strong> <?= esc($usuario['fname']) ?> <?= esc($usuario['lname']) ?>
            </li>
            <li class="list-group-item bg-dark text-white border-secondary">
              <strong>Email:</strong> <?= esc($usuario['mail']) ?>
            </li>
          </ul>

          <a href="<?= base_url('perfil/pedidos') ?>" class="btn btn-danger mt-4 px-4">
            <i class="bi bi-box-seam me-2"></i>Ver mis pedidos </a>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

