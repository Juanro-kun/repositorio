<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<div class="container py-5 text-white">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold text-white">
      <i class="bi bi-receipt me-2"></i>Detalle del Pedido <span class="text-white">#<?= str_pad($factura['invoice_id'], 6, '0', STR_PAD_LEFT) ?></span>
    </h2>
    <a href="<?= base_url('perfil/pedidos') ?>" class="btn btn-outline-light">
      <i class="bi bi-arrow-left"></i> Volver a Mis Pedidos
    </a>
  </div>

  <?php
    $dt = new DateTime($factura['created_at']); // ✅ Sin convertir desde UTC

    $subtotal = 0;
    foreach ($productos as &$item) {
        $item['subtotal'] = $item['price_at_purchase'] * $item['quantity'];
        $subtotal += $item['subtotal'];
    }
    $impuestos = round($subtotal * 0.10, 2);
    $envio = $factura['total'] - $subtotal - $impuestos;
  ?>

  <p class="mb-4 text-white">
    <i class="bi bi-calendar me-1"></i> <?= $dt->format('d/m/Y') ?>
    <i class="bi bi-clock ms-3 me-1"></i> <?= $dt->format('H:i') ?>
  </p>

  <div class="row g-4">
    <!-- Productos -->
    <div class="col-lg-8">
      <div class="card bg-dark text-white shadow-sm border-0 rounded-4">
        <div class="card-header bg-secondary text-white fw-semibold rounded-top-4">
          Productos del Pedido
        </div>
        <div class="card-body">
          <?php foreach ($productos as $item): ?>
            <?php
              $desc = json_decode($item['description'], true);
              $descripcion = is_array($desc) && isset($desc['descripcion']) ? $desc['descripcion'] : $item['description'];
            ?>
            <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
              <div class="d-flex gap-3 align-items-center">
                <img src="<?= base_url('uploads/' . $item['image']) ?>" alt="<?= esc($item['name']) ?>" width="64" height="64" class="rounded border" onerror="this.src='<?= base_url('assets/img/default.png') ?>'">
                <div>
                  <h6 class="mb-0 text-white"><?= esc($item['name']) ?></h6>
                  <small class="text-white"><?= esc($descripcion) ?></small><br>
                  <small class="text-white"><?= $item['quantity'] ?> × $<?= number_format($item['price_at_purchase'], 2, ',', '.') ?></small>
                </div>
              </div>
              <div class="fw-bold text-white">
                $<?= number_format($item['subtotal'], 2, ',', '.') ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- Resumen -->
    <div class="col-lg-4">
      <div class="card bg-dark text-white shadow-sm border-0 rounded-4">
        <div class="card-header bg-secondary text-white fw-semibold rounded-top-4">Resumen</div>
        <div class="card-body">
          <div class="d-flex justify-content-between mb-2">
            <span class="text-white">Subtotal:</span>
            <span class="text-white">$<?= number_format($subtotal, 2, ',', '.') ?></span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span class="text-white">Envío:</span>
            <span class="text-white">$<?= number_format($envio, 2, ',', '.') ?></span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span class="text-white">Impuestos (10%):</span>
            <span class="text-white">$<?= number_format($impuestos, 2, ',', '.') ?></span>
          </div>
          <hr class="border-secondary">
          <div class="d-flex justify-content-between fw-bold fs-5">
            <span class="text-white">Total:</span>
            <span class="text-white">$<?= number_format($factura['total'], 2, ',', '.') ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
