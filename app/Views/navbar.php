<nav class="navbar navbar-expand-lg shadow-sm" style="background-color: var(--color-oscuro);">
  <div class="container-fluid d-flex justify-content-between align-items-center py-3 px-4">
    
    <!-- Logo -->
    <a class="navbar-brand" href="<?= base_url() ?>">
      <img src="<?= base_url('assets/img/logo.png') ?>" alt="Dungeons & Dragons" style="height: 80px;">
    </a>

    <!-- Botón hamburguesa -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Ítems de navegación -->
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      <ul class="navbar-nav gap-1 text-uppercase fw-semibold" style="font-size: 0.85rem;">
        <li class="nav-item">
          <a class="nav-link nav-link-custom" style="color: white;" href="<?= base_url() ?>">Principal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-custom" style="color: white;" href="<?= base_url('/nuevos_jugadores') ?>">Nuevos Jugadores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-custom" style="color: white;" href="<?= base_url('/quienes') ?>">Quiénes Somos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-custom" style="color: white;" href="<?= base_url('/comercializacion') ?>">Comercialización</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-custom" style="color: white;" href="<?= base_url('/contacto') ?>">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-custom" style="color: white;" href="<?= base_url('/terminos') ?>">Términos y Usos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-custom" style="color: white;" href="<?= base_url('/catalogo') ?>">Catálogo</a>
        </li>
      </ul>

      <!-- Mostrar según sesión -->
      <?php if (!session()->get('isLoggedIn')): ?>
        <!-- Botones para visitantes -->
        <div class="d-flex gap-2">
          <a href="<?= base_url('login') ?>" class="btn btn-success btn-sm text-white">Iniciar sesión</a>
          <a href="<?= base_url('register') ?>" class="btn btn-danger btn-sm text-white">Registrarse</a>
        </div>

      <?php else: ?>
        <!-- Íconos para usuario logueado -->
        <div class="d-flex gap-3 align-items-center me-4">
          <?php if (session()->get('role') === 'admin'): ?>
            <a href="<?= base_url('admin') ?>" class="btn btn-warning btn-sm text-dark">Admin</a>
          <?php endif; ?>

          <!-- Ícono carrito -->
          <a href="<?= base_url('carrito') ?>" class="text-white" title="Carrito">
            <i class="bi bi-cart-fill fs-5"></i>
          </a>

          <!-- Ícono perfil -->
          <a href="<?= base_url('profile') ?>" class="text-white" title="Perfil">
            <i class="bi bi-person-circle fs-5"></i>
          </a>

          <!-- Ícono cerrar sesión -->
          <form id="logout-form" action="<?= base_url('logout') ?>" method="post" class="d-inline">
            <button type="submit" class="btn p-0 text-white" title="Cerrar sesión">
              <i class="bi bi-box-arrow-right fs-5"></i>
            </button>
          </form>
        </div>
      <?php endif; ?>
    </div>
  </div>
</nav>