<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<!-- Hero principal -->
<section class="hero-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-9">
        <div class="overlay-box text-white text-center">
          <h1 class="fw-bold">Calabozos & Dragones</h1>
          <p class="lead mt-3">
            Échale un vistazo a este legendario juego de rol de fantasía y averiguá por qué hay millones de personas
            en todo el mundo que se ponen en la piel de poderosos héroes para crear sus propias historias.
          </p>
          <div class="mt-4">
            <a href="#" class="btn btn-danger px-4 me-2">Explorá los Reinos</a>
            <a href="#" class="btn btn-outline-light px-4">Creá tu Personaje</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Sección: Productos Destacados -->
<section class="section-light py-5">
  <div class="container">
    <h2 class="mb-4 fw-bold text-center">Productos Destacados</h2>
    <div class="row g-4 justify-content-center">

      <!-- Producto 1 -->
      <div class="col-md-4">
        <div class="card card-hover h-100 shadow-sm">
          <img src="<?= base_url('assets/img/img2.jpg') ?>" class="card-img-top" alt="Libro de Monstruos"
               style="height: 250px; object-fit: cover; object-position: top;">
          <div class="card-body">
            <h5 class="card-title">Manual de Monstruos</h5>
            <p class="card-text">Todo lo que necesitás para poblar tus campañas con criaturas épicas.</p>
          </div>
        </div>
      </div>

      <!-- Producto 2 -->
      <div class="col-md-4">
        <div class="card card-hover h-100 shadow-sm">
          <img src="<?= base_url('assets/img/img5.jpg') ?>" class="card-img-top" alt="Guía del Dungeon Master"
               style="height: 250px; object-fit: cover; object-position: center;">
          <div class="card-body">
            <h5 class="card-title">Guía del Dungeon Master</h5>
            <p class="card-text">Llevá el control de la aventura con esta guía completa para directores de juego.</p>
          </div>
        </div>
      </div>

      <!-- Producto 3 -->
      <div class="col-md-4">
        <div class="card card-hover h-100 shadow-sm">
          <img src="<?= base_url('assets/img/img4.jpg') ?>" class="card-img-top" alt="Manual del Jugador"
               style="height: 250px; object-fit: cover; object-position: center;">
          <div class="card-body">
            <h5 class="card-title">Manual del Jugador</h5>
            <p class="card-text">Reglas esenciales, hechizos y clases para crear tu personaje ideal.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Sección: Clases de Personaje -->
<section class="section-light py-5">
  <div class="container">
    <h2 class="mb-5 fw-bold text-center">Clases de Personaje</h2>
    <div class="row justify-content-center g-4">

      <div class="col-sm-6 col-md-3">
        <div class="card-personaje">
          <img src="<?= base_url('assets/img/guerrero.jpg') ?>" alt="Guerrero" class="img-fluid">
          <h5 class="fw-bold mt-3">Guerrero</h5>
          <p>Fuerza bruta y estrategia en combate cuerpo a cuerpo.</p>
        </div>
      </div>

      <div class="col-sm-6 col-md-3">
        <div class="card-personaje">
          <img src="<?= base_url('assets/img/mago.jpg') ?>" alt="Mago" class="img-fluid">
          <h5 class="fw-bold mt-3">Mago</h5>
          <p>Hechizos poderosos para dominar el campo de batalla.</p>
        </div>
      </div>

      <div class="col-sm-6 col-md-3">
        <div class="card-personaje">
          <img src="<?= base_url('assets/img/picaro.jpg') ?>" alt="Pícaro" class="img-fluid">
          <h5 class="fw-bold mt-3">Pícaro</h5>
          <p>Sigilo, agilidad y ataques sorpresivos letales.</p>
        </div>
      </div>

      <div class="col-sm-6 col-md-3">
        <div class="card-personaje">
          <img src="<?= base_url('assets/img/clerigo.jpg') ?>" alt="Clérigo" class="img-fluid">
          <h5 class="fw-bold mt-3">Clérigo</h5>
          <p>Sanador devoto con poderes divinos y protección.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Sección: Suscripción -->
<section class="section-dark py-5">
  <div class="container text-center">
    <h2 class="mb-4 fw-bold">¿Querés recibir noticias y novedades?</h2>
    <form class="row justify-content-center">
      <div class="col-md-6 col-lg-4">
        <input type="email" class="form-control mb-2" placeholder="Ingresá tu email">
      </div>
      <div class="col-md-2">
        <button class="btn btn-danger px-4" type="submit">Suscribirme</button>
      </div>
    </form>
  </div>
</section>

<?= $this->endSection() ?>

