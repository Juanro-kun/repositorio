<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<h2 class="fw-bold mb-2">Inventario</h2>
<p class="text-muted mb-4">Gestiona el inventario y stock de productos.</p>

<!-- RESUMEN -->
<div class="row mb-4">
  <div class="col-md-3">
    <div class="bg-white border p-3 rounded shadow-sm text-center">
      <h4><?= $total ?></h4>
      <div class="text-muted">Total Productos</div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="bg-white border p-3 rounded shadow-sm text-center">
      <h4><?= $stockBajo ?></h4>
      <div class="text-warning">Stock Bajo</div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="bg-white border p-3 rounded shadow-sm text-center">
      <h4><?= $agotados ?></h4>
      <div class="text-danger">Agotados</div>
    </div>
  </div>
  <div class="col-md-3 d-flex flex-column gap-2">
    <a href="<?= base_url('admin/inventario/nuevo') ?>" class="btn btn-danger w-100">
      <i class="bi bi-plus-circle"></i> Añadir Producto
    </a>
    <a href="<?= base_url('admin/inventario/eliminados') ?>" class="btn btn-dark w-100">
      <i class="bi bi-archive"></i> Ver Productos Eliminados
    </a>
  </div>
</div>

<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
  </div>
<?php endif ?>

<!-- LISTADO -->
<div class="card shadow-sm border-0">
  <div class="card-header bg-white fw-bold">Todos los Productos</div>
  <div class="table-responsive">
    <table class="table align-middle mb-0">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Categoría</th>
          <th>Precio</th>
          <th>Stock</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($productos as $p): ?>
          <tr>
            <td><?= esc($p['name']) ?></td>
            <td><?= esc($p['categoria']) ?></td>
            <td>$<?= number_format($p['price'], 2, ',', '.') ?></td>
            <td><?= $p['stock'] ?></td>
            <td>
              <?php
              $estado = strtolower($p['estado']);
              $colores = [
                'en stock' => 'success',
                'stock bajo' => 'warning',
                'agotado' => 'danger'
              ];
              ?>
              <span class="badge bg-<?= $colores[$estado] ?? 'secondary' ?>"><?= $p['estado'] ?></span>
            </td>
            <td class="d-flex gap-1">
              <a href="<?= base_url('admin/inventario/editar/' . $p['product_id']) ?>" class="btn btn-sm btn-danger">Editar</a>
              <a href="<?= base_url('admin/inventario/eliminar/' . $p['product_id']) ?>" class="btn btn-sm btn-outline-secondary" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">
                Eliminar
              </a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>