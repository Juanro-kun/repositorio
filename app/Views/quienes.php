<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<section class="section-quienes text-center">
  <div class="container">
    <h2 class="fw-bold mb-4">¿Quiénes Somos?</h2>
    <p class="intro-text">
      Somos dos estudiantes apasionados por la tecnología, los juegos de rol y el desarrollo web.
      Estudiamos <strong>Licenciatura en Sistemas</strong> en la <strong>Facultad de Ciencias Exactas y Naturales y Agrimensura de la UNNE</strong>.
    </p>

    <div class="row justify-content-center g-5">
      <!-- TOBI -->
      <div class="col-md-5">
        <div class="perfil-card">
          <img src="<?= base_url('assets/img/tobias.png') ?>" alt="Tobias Naim Orban">
          <p class="nombre">Tobias Naim Orban</p>
          <p class="desc">20 años · Chaco</p>
          <p>Frontend enjoyer y narrador de campañas improvisadas.<br> Creador oficial de nombres facheros.</p>
        </div>
      </div>

      <!-- JUAN -->
      <div class="col-md-5">
        <div class="perfil-card">
          <img src="<?= base_url('assets/img/juan.png') ?>" alt="Juan Román Riquelme">
          <p class="nombre">Juan Román Riquelme</p>
          <p class="desc">Corrientes</p>
          <p>Jugador de rol serio, analítico y resolutivo.<br> Se asegura de que todo ande como tiene que andar.</p>
        </div>
      </div>
    </div>

    <p class="final-quote mt-5">
      Nuestro objetivo es crear experiencias épicas para todos los aventureros.<br>
      ¡Bienvenidos a Calabozos & Dragones versión UNNE! ⚔️🐉
    </p>
  </div>
</section>

<?= $this->endSection() ?>
