<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<a href="<?= base_url('admin/facturas') ?>" class="text-muted small d-inline-flex align-items-center mb-3">
  <i class="bi bi-arrow-left me-2"></i> Volver a facturas
</a>

<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h2 class="fw-bold">Factura #<?= $factura['invoice_id'] ?></h2>
    <?php
          $dt = new DateTime($factura['created_at']);
        ?>
    <p class="text-muted mb-1">
      <i class="bi bi-calendar me-1"></i> <?= $dt->format('d/m/Y') ?>
      <i class="bi bi-clock ms-3 me-1"></i> <?= $dt->format('H:i') ?>
    </p>
  </div>
</div>

<div class="row g-4">
  <!-- Detalles de la factura -->
  <div class="col-lg-8">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white fw-bold">Detalles de la Factura</div>
      <div class="card-body">

        <?php foreach ($productos as $item): ?>
          <?php
            $desc = json_decode($item['description'], true);
            $descripcion = is_array($desc) && isset($desc['descripcion']) ? $desc['descripcion'] : $item['description'];
          ?>
          <div class="d-flex justify-content-between border-bottom pb-3 mb-3">
            <div class="d-flex gap-3">
              <img src="<?= base_url('uploads/' . $item['image']) ?>" alt="<?= esc($item['name']) ?>" width="64" height="64" class="rounded border" onerror="this.src='<?= base_url('assets/img/default.png') ?>'">
              <div>
                <div class="fw-semibold"><?= esc($item['name']) ?></div>
                <div class="text-muted small"><?= esc($descripcion) ?></div>
                <div class="small"><?= $item['quantity'] ?> x $<?= number_format($item['price_at_purchase'], 2, ',', '.') ?></div>
              </div>
            </div>
            <div class="fw-bold">
              $<?= number_format($item['subtotal'], 2, ',', '.') ?>
            </div>
          </div>
        <?php endforeach; ?>

        <?php
          $subtotal = array_sum(array_column($productos, 'subtotal'));
          $impuestos = round($subtotal * 0.1, 2);
          $envio = ($factura['total'] - $subtotal - $impuestos);
        ?>

        <div class="pt-3 text-end">
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Subtotal</span>
            <span>$<?= number_format($subtotal, 2, ',', '.') ?></span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Envío</span>
            <span>$<?= number_format($envio, 2, ',', '.') ?></span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span class="text-muted">Impuestos (10%)</span>
            <span>$<?= number_format($impuestos, 2, ',', '.') ?></span>
          </div>
          <div class="d-flex justify-content-between fw-bold fs-5 border-top pt-3">
            <span>Total</span>
            <span>$<?= number_format($factura['total'], 2, ',', '.') ?></span>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Información del Cliente -->
  <div class="col-lg-4">
    <div class="card shadow-sm border-0 mb-4">
      <div class="card-header bg-white fw-bold">Información del Cliente</div>
      <div class="card-body">
        <p class="mb-1"><i class="bi bi-person me-2"></i><?= $factura['nombre'] . ' ' . $factura['apellido'] ?></p>
        <p class="mb-1"><i class="bi bi-envelope me-2"></i><?= $factura['mail'] ?></p>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
