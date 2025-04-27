<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<section class="section-light text-center">
  <div class="container">
    <h2 class="fw-bold mb-4">Comercialización</h2>
    <p class="mb-4">
      Productos épicos para tu aventura: dados, tableros y miniaturas listas para la batalla.
    </p>

    <div class="row justify-content-center g-4">
      <!-- Producto 1 -->
      <div class="col-md-4">
        <div class="card card-hover h-100 shadow-sm">
          <img src="<?= base_url('assets/img/dados.jpg') ?>" class="card-img-top" alt="Dados" style="height: 250px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">Set de Dados</h5>
            <p class="card-text">Incluye D4, D6, D8, D10, D12 y D20. Ideal para cualquier campaña.</p>
          </div>
        </div>
      </div>

      <!-- Producto 2 -->
      <div class="col-md-4">
        <div class="card card-hover h-100 shadow-sm">
          <img src="<?= base_url('assets/img/tablero.jpg') ?>" class="card-img-top" alt="Tablero" style="height: 250px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">Tablero Plegable</h5>
            <p class="card-text">Perfecto para mapas, misiones y encuentros épicos.</p>
          </div>
        </div>
      </div>

      <!-- Producto 3 -->
      <div class="col-md-4">
        <div class="card card-hover h-100 shadow-sm">
          <img src="<?= base_url('assets/img/miniaturas.jpg') ?>" class="card-img-top" alt="Miniaturas" style="height: 250px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">Miniaturas</h5>
            <p class="card-text">Héroes, monstruos y más para ambientar tus partidas.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
