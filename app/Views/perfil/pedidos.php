<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<div class="container py-5 text-white">
  <h2 class="mb-4">
    <i class="bi bi-box2-heart-fill me-2 text-danger"></i>Mis Pedidos
  </h2>

  <?php if (empty($facturas)): ?>
    <div class="alert alert-warning text-center">No tenés pedidos todavía.</div>
  <?php else: ?>
    <div class="row g-4">
      <?php foreach ($facturas as $factura): ?>
        <div class="col-12">
          <div class="card border-0 shadow-lg rounded-3 bg-dark-subtle">
            <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
              <span><strong>Pedido N.º #<?= str_pad($factura['invoice_id'], 6, '0', STR_PAD_LEFT) ?></strong></span>
              <small>
                <?= date('d/m/Y', strtotime($factura['created_at'])) ?> |
                Total: $<?= number_format($factura['total'], 2, ',', '.') ?>
              </small>
            </div>
            <ul class="list-group list-group-flush">
              <?php foreach ($factura['items'] as $item): ?>
                <li class="list-group-item bg-dark text-white d-flex justify-content-between align-items-center">
                  <div><i class="bi bi-caret-right-fill text-danger me-1"></i> <?= esc($item['producto']) ?></div>
                  <span class="badge bg-secondary rounded-pill">
                    <?= $item['quantity'] ?> x $<?= number_format($item['price_at_purchase'], 2, ',', '.') ?>
                  </span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>

<?= $this->endSection() ?>
