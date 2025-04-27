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

<!-- Sección: Productos Destacados -->
<section class="section-dark py-5">
  <h2 class="text-center">Productos destacados</h2>
  <div class="container mt-5">
    
    <div class="row justify-content-center g-4">
      <!-- Primera fila -->
      <div class="col-12 col-md-4 d-flex justify-content-center">
        <div class="product-card">
          <a href="<?= base_url('home/proximamente') ?>">
            <img src="<?= base_url('assets/img/guerrero.jpg') ?>" alt="Producto 1">
            <div class="product-description">
              <p class="m-0">Producto 1 increíble</p>
            </div>
          </a>
        </div>
      </div>

      <div class="col-12 col-md-4 d-flex justify-content-center">
        <div class="product-card">
          <a href="<?= base_url('home/proximamente') ?>">
            <img src="<?= base_url('assets/img/guerrero.jpg') ?>" alt="Producto 2">
            <div class="product-description">
              <p class="m-0">Producto 2 increíble</p>
            </div>
          </a>
        </div>
      </div>

      <div class="col-12 col-md-4 d-flex justify-content-center">
        <div class="product-card">
          <a href="<?= base_url('home/proximamente') ?>">
            <img src="<?= base_url('assets/img/guerrero.jpg') ?>" alt="Producto 3">
            <div class="product-description">
              <p class="m-0">Producto 3 increíble</p>
            </div>
          </a>
        </div>
      </div>

      <!-- Segunda fila -->
      <div class="col-12 col-md-4 d-flex justify-content-center">
        <div class="product-card">
          <a href="<?= base_url('home/proximamente') ?>">
            <img src="<?= base_url('assets/img/guerrero.jpg') ?>" alt="Producto 4">
            <div class="product-description">
              <p class="m-0">Producto 4 increíble</p>
            </div>
          </a>
        </div>
      </div>

      <div class="col-12 col-md-4 d-flex justify-content-center">
        <div class="product-card">
          <a href="<?= base_url('home/proximamente') ?>">
            <img src="<?= base_url('assets/img/guerrero.jpg') ?>" alt="Producto 5">
            <div class="product-description">
              <p class="m-0">Producto 5 increíble</p>
            </div>
          </a>
        </div>
      </div>

      <div class="col-12 col-md-4 d-flex justify-content-center">
        <div class="product-card">
          <a href="<?= base_url('home/proximamente') ?>">
            <img src="<?= base_url('assets/img/guerrero.jpg') ?>" alt="Producto 6">
            <div class="product-description">
              <p class="m-0">Producto 6 increíble</p>
            </div>
          </a>
        </div>
      </div>

    </div>

  </div>
</section>


<?= $this->endSection() ?>

