<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<h2 class="fw-bold mb-3">Informes</h2>
<p class="text-muted">Análisis detallado de ventas y rendimiento de la tienda.</p>

<div class="row mb-4">
  <div class="col-md-3">
    <div class="bg-white border p-3 rounded text-center shadow-sm">
      <h4>$<?= number_format($ingresos, 2, ',', '.') ?></h4>
      <div class="text-muted">Ingresos</div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="bg-white border p-3 rounded text-center shadow-sm">
      <h4><?= $pedidos ?></h4>
      <div class="text-muted">Pedidos</div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="bg-white border p-3 rounded text-center shadow-sm">
      <h4>$<?= number_format($valorMedio, 2, ',', '.') ?></h4>
      <div class="text-muted">Valor Medio</div>
    </div>
  </div>
</div>

<h5 class="fw-bold mt-4 mb-3">Ventas por Categoría</h5>
<?php foreach ($ventasPorCategoria as $cat): ?>
  <div class="mb-2">
    <div class="d-flex justify-content-between">
      <div><?= esc($cat['category_name']) ?></div>
      <div>$<?= number_format($cat['ingresos'], 2, ',', '.') ?></div>
    </div>
    <div class="progress">
      <div class="progress-bar bg-danger" style="width: <?= min(100, $cat['ingresos'] / $ingresos * 100) ?>%"></div>
    </div>
  </div>
<?php endforeach; ?>

<h5 class="fw-bold mt-5 mb-3">Productos Más Vendidos</h5>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Producto</th>
        <th>Categoría</th>
        <th>Ventas</th>
        <th>Ingresos</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($productosTop as $p): ?>
        <tr>
          <td><?= esc($p['name']) ?></td>
          <td><?= esc($p['category_name']) ?></td>
          <td><?= $p['ventas'] ?></td>
          <td>$<?= number_format($p['ingresos'], 2, ',', '.') ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

<h5 class="fw-bold mt-5 mb-3">Mejores Clientes</h5>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>Cliente</th>
        <th>Email</th>
        <th>Pedidos</th>
        <th>Total Gastado</th>
        <th>Último Pedido</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($mejoresClientes as $c): ?>
        <tr>
          <td><?= esc($c['fname'] . ' ' . $c['lname']) ?></td>
          <td><?= esc($c['mail']) ?></td>
          <td><?= $c['pedidos'] ?></td>
          <td>$<?= number_format($c['total_gastado'], 2, ',', '.') ?></td>
          <td><?= date('d/m/Y', strtotime($c['ultimo_pedido'])) ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

<?= $this->endSection() ?>
