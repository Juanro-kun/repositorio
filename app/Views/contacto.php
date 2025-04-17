<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<section class="section-light text-center">
  <div class="container">
    <h2 class="fw-bold mb-4">Contacto</h2>
    <p class="mb-4">¿Tenés dudas, sugerencias o querés unirte a la aventura? Escribinos:</p>

    <form class="row justify-content-center">
      <div class="col-md-6">
        <input type="text" class="form-control mb-3" placeholder="Nombre">
        <input type="email" class="form-control mb-3" placeholder="Correo electrónico">
        <textarea class="form-control mb-3" rows="4" placeholder="Mensaje"></textarea>
        <button type="submit" class="btn btn-danger px-4">Enviar</button>
      </div>
    </form>
  </div>
</section>

<?= $this->endSection() ?>
