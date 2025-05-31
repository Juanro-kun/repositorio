<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<a href="<?= base_url('admin/facturas') ?>" class="text-muted small d-inline-flex align-items-center mb-3">
  <i class="bi bi-arrow-left me-2"></i> Volver a facturas
</a>

<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h2 class="fw-bold">Factura #<?= $factura['invoice_id'] ?></h2>
    <p class="text-muted mb-1">
      <i class="bi bi-calendar me-1"></i> <?= date('d/m/Y', strtotime($factura['created_at'])) ?>
      <i class="bi bi-clock ms-3 me-1"></i> <?= date('H:i', strtotime($factura['created_at'])) ?>
    </p>
  </div>
</div>

<div class="row g-4">
  <!-- Detalles del pedido -->
  <div class="col-lg-8">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white fw-bold">Detalles de la Factura</div>
      <div class="card-body">
        <?php foreach ($productos as $item): ?>
          <div class="d-flex justify-content-between border-bottom pb-3 mb-3">
            <div class="d-flex gap-3">
              <div class="bg-light rounded border" style="width: 64px; height: 64px;"></div>
              <div>
                <div class="fw-semibold"><?= $item['name'] ?></div>
                <div class="text-muted small"><?= $item['categoria'] ?? 'Producto' ?></div>
                <div class="small"><?= $item['quantity'] ?> x $<?= number_format($item['price_at_purchase'], 2, ',', '.') ?></div>
              </div>
            </div>
            <div class="d-flex flex-column">
              <?php if ($item['discount'] > 0): ?>
                  <div class="text-muted text-decoration-line-through">
                      $<?= number_format(($item['price_at_purchase'] * $item['quantity']), 2, ',', '.') ?>
                  </div>
                  <div class="text-success">
                      <?= $item['discount'] ?>% de descuento
                  </div>
                  <div class="fw-bold">
                      $<?= number_format(
                          $item['subtotal'],
                          2, ',', '.'
                      ) ?>
                  </div>
              <?php else: ?>
                  <div class="fw-bold">
                      $<?= number_format($item['subtotal'], 2, ',', '.') ?>
                  </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach ?>

        <div class="pt-3 text-end">
          <div class="d-flex justify-content-between fw-bold fs-5"><span>Total</span><span>$<?= number_format($factura['total'], 2, ',', '.') ?></span></div>
        </div>
      </div>
    </div>
  </div>

  <!--info cliente -->
  <div class="col-lg-4">

    <div class="card shadow-sm border-0 mb-4">
      <div class="card-header bg-white fw-bold">Información del Cliente</div>
      <div class="card-body">
        <p class="mb-1"><i class="bi bi-person me-2"></i><?= $factura['nombre'] . ' ' . $factura['apellido'] ?></p>
        <p class="mb-1"><i class="bi bi-envelope me-2"></i><?= $factura['mail'] ?></p>
    </div>
  </div>
</div>

<?= $this->endSection() ?>