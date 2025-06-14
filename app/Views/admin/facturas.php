<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<h2 class="fw-bold mb-2">Facturas</h2>
<p class="text-muted mb-4">Visualiza las facturas de la tienda.</p>

<!-- Tabla de pedidos -->
<div class="card shadow-sm border-0">
  <div class="card-header bg-white fw-bold">
    Todos las Facturas
  </div>
  <div class="table-responsive">
    <table class="table table-hover mb-0 align-middle">
      <thead>
        <tr>
          <th>ID</th>
          <th>Cliente</th>
          <th>Fecha</th>
          <th>Productos</th>
          <th>Total</th>
          <th>Detalle</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($facturas as $p): ?>
          <tr>
            <td>#<?= $p['invoice_id'] ?></td>
            <td><?= $p['fname'] . ' ' . $p['lname'] ?></td>
            <td><?= date('d/m/Y', strtotime($p['created_at'])) ?></td>
            <td><?= $p['cantidad_productos'] ?></td>
            <td>$<?= number_format($p['total'], 2, ',', '.') ?></td>
            <td>
              <a href="<?= base_url('admin/facturas/' . $p['invoice_id']) ?>" class="btn btn-sm btn-outline-secondary">Ver</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>
