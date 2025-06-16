<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<!-- Hero principal -->
<section class="hero-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-9">
        <div class="overlay-box text-white text-center">
          <h1 class="fw-bold">¡Bienvenidos, viajeros y aventureros, a La Taberna del Gnomo Errante!</h1>
          <p class="mt-3">
          En este rincón de la Tierra Media, encontrarán todo lo que necesiten para sus travesías. Desde espadas forjadas con magia ancestral, hasta pociones secretas que los salvarán de más de un apuro. No importa si buscan un pergamino de hechizos, dados encantados, figuras de héroes legendarios o manuales de aventuras épicas. También tenemos pociones curativas, amuletos que protegen de maleficios y armaduras impenetrables. ¡Todo lo que un aventurero podría desear en su viaje está aquí, al alcance de tu mano!
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Sección: Invitación para nuevos jugadores -->
<section class="section-dark py-5">
  <div class="container text-center">
    <div class="p-5 rounded-4" style="
      border: 4px double rgb(189, 189, 189);
      box-shadow: 0 0 15px rgb(184, 184, 184);
      background-color: rgba(0, 0, 0, 0.4);
      ">
      
      <h2 class="fw-bold mb-3 text-light">¿Aún no conoces D&D?</h2>
      <p class="mb-4 text-light">¡Visita nuestra sección para nuevos jugadores!</p>
      
      <a href="<?= base_url('/nuevos_jugadores') ?>" class="btn btn-danger px-4 py-2">
        ¡Descubrir ahora!
      </a>

    </div>
  </div>
</section>

<!-- Sección: Productos Destacados -->
<section class="section-dark py-5">
  <h2 class="text-center text-light mb-4">Productos destacados</h2>
  <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
      <?php foreach ($destacados as $producto): ?>
        <div class="col">
          <div class="card h-100 bg-dark text-light shadow-sm border-0">
<<<<<<< HEAD
            <img src="<?= base_url('assets/uploads/' . $producto['image']) ?>" class="card-img-top" alt="<?= esc($producto['name']) ?>">
=======
            <img src="<?= base_url('uploads/' . $producto['image']) ?>" class="card-img-top" alt="<?= esc($producto['name']) ?>" onerror="this.src='<?= base_url('assets/img/default.png') ?>'">
>>>>>>> prueba-catalogo
            <div class="card-body d-flex flex-column justify-content-between">
              <div>
                <h5 class="card-title"><?= esc($producto['name']) ?></h5>
                <p class="card-text mb-3">$<?= number_format($producto['price'], 0, ',', '.') ?></p>
              </div>
              <a href="<?= base_url('catalogo/' . $producto['product_id']) ?>" class="btn btn-outline-light w-100">
                <i class="bi bi-cart-plus"></i> Comprar
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>



<?= $this->endSection() ?>

