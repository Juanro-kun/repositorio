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
      <ul class="navbar-nav gap-2 text-uppercase fw-semibold">
        <li class="nav-item">
          <a class="nav-link nav-link-custom" href="<?= base_url() ?>">Principal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-custom" href="<?= base_url('/nuevos_jugadores') ?>">Nuevos Jugadores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-custom" href="<?= base_url('/quienes') ?>">Quiénes Somos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-custom" href="<?= base_url('/comercializacion') ?>">Comercialización</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-custom" href="<?= base_url('home/contacto') ?>">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-custom" href="<?= base_url('/terminos') ?>">Términos y Usos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-custom" href="<?= base_url('home/catalogo') ?>">Catalogo</a>
        </li>
      </ul>
    </div>


<!-- Carrito y Login alineados a la derecha -->
<div class="d-flex align-items-center gap-3">
  <!-- Carrito -->
  <a href="<?= base_url('carrito') ?>" class="text-white position-relative" title="Ver carrito" style="font-size: 1.4rem;">
    <i class="bi bi-cart-fill"></i>
  </a>

  <!-- Login -->
  <a href="<?= base_url('login') ?>" class="btn btn-outline-light rounded-pill d-flex align-items-center gap-1 px-3">
    <i class="bi bi-person-circle"></i> <span>Login</span>
  </a>
</div>

  </div>
</nav>
