<!DOCTYPE html> 
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>D&D Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .sidebar a {
      color: #495057;
      padding: 12px 20px;
      display: flex;
      align-items: center;
      gap: 8px;
      border-radius: 6px;
      transition: background 0.2s;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #f1f3f5;
    }
    .sidebar .active {
      background-color: #e9ecef;
      font-weight: 500;
    }
    .content {
      padding: 2rem;
    }
    @media (min-width: 768px) {
      .offcanvas-md {
        position: static;
        transform: none;
        visibility: visible !important;
        border-right: 1px solid #dee2e6;
      }
    }
  </style>
</head>
<body>

<!-- Header -->
<header class="bg-white border-bottom shadow-sm sticky-top">
  <div class="container-fluid py-2 px-4 d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center gap-2">
      <!-- Botón hamburguesa en mobile -->
      <button class="btn btn-outline-secondary d-lg-none me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu">
        <i class="bi bi-list"></i>
      </button>
      <i class="bi bi-box-fill text-danger fs-4 d-none d-md-inline"></i>
      <h5 class="mb-0 fw-bold">D&D Admin</h5>
    </div>
    <div class="d-flex align-items-center gap-3">
      <a href="<?= base_url('admin/notificaciones') ?>" class="text-dark">
        <i class="bi bi-bell fs-5"></i>
      </a>
      <a href="<?= base_url('/') ?>" class="text-dark"><i class="bi bi-house fs-5"></i></a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar como offcanvas -->
    <nav id="sidebarMenu" class="col-lg-2 offcanvas-lg offcanvas-start sidebar p-3 bg-white" tabindex="-1">
      <div class="offcanvas-header d-md-none">
        <h5 class="offcanvas-title">Menú</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="nav flex-column">
        <a href="<?= base_url('admin') ?>"><i class="bi bi-bar-chart"></i> Dashboard</a>
        <a href="<?= base_url('admin/facturas') ?>"><i class="bi bi-cart"></i> Facturas</a>
        <a href="<?= base_url('admin/inventario') ?>"><i class="bi bi-box-seam"></i> Inventario</a>
        <a href="<?= base_url('admin/categorias') ?>"><i class="bi bi-layers"></i> Categorías</a>
        <a href="<?= base_url('admin/informes') ?>"><i class="bi bi-file-earmark-text"></i> Informes</a>
<<<<<<< HEAD
=======
        <a href="<?= base_url('admin/consultas') ?>"><i class="bi bi-question-circle"></i> Consultas</a>
>>>>>>> prueba-catalogo
        <a href="<?= base_url('admin/usuarios') ?>"><i class="bi bi-people"></i> Usuarios</a>
      </div>
    </nav>

    <!-- Contenido principal -->
    <main class="col-12 col-lg-10 content">
      <?= $this->renderSection('contenido') ?>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
