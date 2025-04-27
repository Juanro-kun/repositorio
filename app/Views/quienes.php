<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<!-- Sección principal: Quiénes Somos, Objetivos y Trayectoria -->
<section class="section-quienes text-center">
  <div class="container">
    <h2 class="fw-bold mb-4">¿Quiénes Somos?</h2>
    <p class="intro-text mb-4">
      En Calabozos & Dragones somos una startup tecnológica fundada con el objetivo de acercar la magia de los juegos de rol a nuevos públicos, combinando pasión, estrategia y desarrollo digital.
    </p>
    <p class="mb-0">
      Nuestro enfoque se basa en la innovación constante, el trabajo en equipo y el compromiso académico. Llevamos adelante este proyecto como parte del trayecto formativo en la carrera de <strong>Licenciatura en Sistemas</strong>, impulsado desde la Facultad de Ciencias Exactas y Naturales y Agrimensura – UNNE.
    </p>
  </div>

  <!-- Misiones, visión, objetivo -->
  <div class="objetivos-container mt-5">
    <div class="objetivo-box">
      <i class="fas fa-bullseye"></i>
      <h5 class="fw-bold mt-2">Misión</h5>
      <p>Brindar una experiencia digital intuitiva, divertida y académicamente significativa.</p>
    </div>
    <div class="objetivo-box">
      <i class="fas fa-eye"></i>
      <h5 class="fw-bold mt-2">Visión</h5>
      <p>Ser un referente en el desarrollo de soluciones educativas aplicadas al mundo del rol y la fantasía.</p>
    </div>
    <div class="objetivo-box">
      <i class="fas fa-compass-drafting"></i>
      <h5 class="fw-bold mt-2">Objetivo</h5>
      <p>Integrar conocimientos de programación y diseño con creatividad temática.</p>
    </div>
  </div>

  <!-- Trayectoria -->
  <div class="container text-white my-5">
    <h4 class="fw-bold text-center mb-4">Nuestra Trayectoria</h4>
    <ul class="list-unstyled small">
      <li>📌 <strong>Marzo 2025:</strong> Inicio de planificación en Taller de Programación I.</li>
      <li>🛠️ <strong>Abril 2025:</strong> Diseño visual, estructura y navegación del sitio.</li>
      <li>🚀 <strong>Mayo 2025:</strong> Secciones, funcionalidad y responsividad.</li>
      <li>📬 <strong>Junio 2025:</strong> Presentación final ante la cátedra.</li>
    </ul>
  </div>
</section>

<!-- Sección: Nuestro Staff -->
<section class="section-dark">
  <div class="container text-center">
    <h3 class="fw-bold mb-5">Nuestro Equipo</h3>
    <div class="row justify-content-center g-5">
      <!-- TOBIAS -->
      <div class="col-md-5">
        <div class="perfil-card">
          <img src="<?= base_url('assets/img/tobias.png') ?>" alt="Tobias Naim Orban">
          <p class="nombre">Tobias Naim Orban</p>
          <p class="desc">20 años · Chaco</p>
          <p>Líder de Frontend y arquitectura visual.<br> Diseña, maqueta y le da magia a cada vista del sitio.</p>
        </div>
      </div>

      <!-- JUAN -->
      <div class="col-md-5">
        <div class="perfil-card">
          <img src="<?= base_url('assets/img/juan.png') ?>" alt="Juan Román Riquelme">
          <p class="nombre">Juan Román Riquelme</p>
          <p class="desc">Corrientes</p>
          <p>Especialista en backend y lógica.<br> Garantiza que todo funcione como una tirada perfecta de D20.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>

