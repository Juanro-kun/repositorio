<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<h2 class="fw-bold mb-3">Notificaciones</h2>
<p class="text-muted">Gestión de eventos, alertas y acciones recientes del sistema.</p>

<!-- Resumen -->
<div class="row mb-4 text-center">
  <div class="col-md-3">
    <div class="bg-white border rounded p-3 shadow-sm">
      <div class="text-danger fs-2 mb-2"><i class="bi bi-people-fill"></i></div>
      <h4><?= $notificaciones['usuarios'] ?></h4>
      <div class="text-muted small">Usuarios</div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="bg-white border rounded p-3 shadow-sm">
      <div class="text-warning fs-2 mb-2"><i class="bi bi-box-seam"></i></div>
      <h4><?= $notificaciones['productos'] ?></h4>
      <div class="text-muted small">Productos</div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="bg-white border rounded p-3 shadow-sm">
      <div class="text-primary fs-2 mb-2"><i class="bi bi-tags-fill"></i></div>
      <h4><?= $notificaciones['categorias'] ?></h4>
      <div class="text-muted small">Categorías</div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="bg-white border rounded p-3 shadow-sm">
      <div class="text-success fs-2 mb-2"><i class="bi bi-receipt"></i></div>
      <h4><?= $notificaciones['pedidos'] ?></h4>
      <div class="text-muted small">Pedidos</div>
    </div>
  </div>
</div>

<!-- Lista de Notificaciones -->
<h5 class="fw-bold mb-3">Todas las Notificaciones</h5>

<?php if (!empty($mensajes)): ?>
  <ul class="list-group shadow-sm">
    <?php foreach ($mensajes as $m): ?>
      <li class="list-group-item d-flex align-items-center">
        <i class="bi bi-bell-fill me-2 text-secondary"></i>
        <span><?= esc($m) ?></span>
      </li>
    <?php endforeach ?>
  </ul>
<?php else: ?>
  <div class="alert alert-secondary text-center">
    No hay notificaciones recientes.
  </div>
<?php endif ?>

<?= $this->endSection() ?>
