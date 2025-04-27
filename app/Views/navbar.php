<nav class="navbar navbar-expand-lg shadow-sm" style="background-color: var(--color-oscuro);">
  <div class="container d-flex justify-content-between align-items-center py-3 px-4">
    
    <!-- Logo -->
    <a class="navbar-brand" href="<?= base_url() ?>">
      <img src="<?= base_url('assets/img/logo.png') ?>" alt="Dungeons & Dragons" style="height: 80px;">
    </a>

    <!-- Botón hamburguesa -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Ítems de navegación -->
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav gap-4 text-uppercase fw-semibold">
        <li class="nav-item"><a class="nav-link text-light" href="<?= base_url() ?>">Principal</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="<?= base_url('home/quienes') ?>">Quiénes Somos</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="<?= base_url('home/comercializacion') ?>">Comercialización</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="<?= base_url('home/contacto') ?>">Contacto</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="<?= base_url('home/terminos') ?>">Términos y Usos</a></li>
      </ul>
    </div>
  </div>
</nav>
