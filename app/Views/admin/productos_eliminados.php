<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<h2 class="fw-bold mb-3">Productos Eliminados</h2>

<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
  </div>
<?php endif ?>

<div class="card shadow-sm border-0">
  <div class="card-header bg-white fw-bold">Listado de Productos Eliminados</div>
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
        <?php if (!empty($productos)): ?>
          <?php foreach ($productos as $p): ?>
            <tr>
              <td><?= esc($p['name']) ?></td>
              <td><?= esc($p['categoria']) ?></td>
              <td>$<?= number_format($p['price'], 2, ',', '.') ?></td>
              <td><?= $p['stock'] ?></td>
              <td>
                <?php if ($p['stock'] == 0): ?>
                  <span class="badge bg-danger">Sin Stock</span>
                <?php else: ?>
                  <span class="badge bg-secondary">Fuera de Vista</span>
                <?php endif ?>
              </td>
              <td>
                <a href="<?= base_url('admin/inventario/restaurar/' . $p['product_id']) ?>" class="btn btn-sm btn-success">
                  Restaurar
                </a>
              </td>
            </tr>
          <?php endforeach ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="text-center text-muted">No hay productos eliminados.</td>
          </tr>
        <?php endif ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>