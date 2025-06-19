<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<div class="container py-5 text-white">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><i class="bi bi-box-seam me-2"></i>Mis Pedidos</h2>
    <a href="<?= base_url('perfil') ?>" class="btn btn-outline-light">
      <i class="bi bi-arrow-left"></i> Volver al perfil
    </a>
  </div>

  <?php if (empty($pedidos)): ?>
    <p>No tenés pedidos aún.</p>
  <?php else: ?>
    <div class="table-responsive">
      <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th>#ID</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>Detalle</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($pedidos as $p): ?>
          <?php
            $dt = new DateTime($p['created_at']); // ✅ ya no se convierte desde UTC
          ?>
          <tr>
            <td>#<?= $p['invoice_id'] ?></td>
            <td><?= $dt->format('d/m/Y H:i') ?></td>
            <td>$<?= number_format($p['total'], 2, ',', '.') ?></td>
            <td>
              <a href="<?= base_url('perfil/pedidos/' . $p['invoice_id']) ?>" class="btn btn-sm btn-outline-primary">
                <i class="bi bi-receipt"></i> Detalle del pedido
              </a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>
