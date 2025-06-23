<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<div class="container-lg py-4">
  <a href="<?= base_url('perfil/pedidos') ?>" class="btn btn-outline-light mb-4">
    <i class="bi bi-arrow-left me-2"></i> Volver a Mis Pedidos
  </a>

  <div class="d-flex justify-content-between align-items-center mb-4 text-white">
    <div>
      <h2 class="fw-bold">Detalle del Pedido #<?= str_pad($factura['invoice_id'], 6, '0', STR_PAD_LEFT) ?></h2>
      <?php $dt = new DateTime($factura['created_at']); ?>
      <p class="text-light mb-0">
        <i class="bi bi-calendar me-1"></i> <?= $dt->format('d/m/Y') ?>
        <i class="bi bi-clock ms-3 me-1"></i> <?= $dt->format('H:i') ?>
      </p>
    </div>
  </div>

  <div class="row g-4">
    <!-- Productos del Pedido -->
    <div class="col-lg-8">
      <div class="card bg-dark text-white shadow-sm border-0">
        <div class="card-header bg-secondary text-white fw-bold">Productos del Pedido</div>
        <div class="card-body">
          <?php foreach ($productos as $item): ?>
            <?php
              $desc = json_decode($item['description'], true);
              $descripcion = is_array($desc) && isset($desc['descripcion']) ? $desc['descripcion'] : $item['description'];
            ?>
            <div class="d-flex justify-content-between border-bottom border-secondary pb-3 mb-3">
              <div class="d-flex gap-3">
                <img src="<?= base_url('uploads/' . $item['image']) ?>" alt="<?= esc($item['name']) ?>" width="64" height="64" class="rounded border" onerror="this.src='<?= base_url('assets/img/default.png') ?>'">
                <div>
                  <div class="fw-semibold"><?= esc($item['name']) ?></div>
                  <div class="text-light small"><?= esc($descripcion) ?></div>
                  <div class="small"><?= $item['quantity'] ?> × $<?= number_format($item['price_at_purchase'], 2, ',', '.') ?></div>
                </div>
              </div>
              <div class="fw-bold text-end">
                $<?= number_format($item['subtotal'], 2, ',', '.') ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- Resumen -->
    <div class="col-lg-4">
      <div class="card bg-dark text-white shadow-sm border-0">
        <div class="card-header bg-secondary text-white fw-bold">Resumen</div>
        <div class="card-body">
          <?php
            $subtotal = array_sum(array_column($productos, 'subtotal'));
            $impuestos = round($subtotal * 0.1, 2);
            $envio = $factura['total'] - $subtotal - $impuestos;
          ?>
          <div class="d-flex justify-content-between mb-2">
            <span>Subtotal:</span>
            <span>$<?= number_format($subtotal, 2, ',', '.') ?></span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span>Envío:</span>
            <span>$<?= number_format($envio, 2, ',', '.') ?></span>
          </div>
          <div class="d-flex justify-content-between mb-2">
            <span>Impuestos (10%):</span>
            <span>$<?= number_format($impuestos, 2, ',', '.') ?></span>
          </div>
          <div class="d-flex justify-content-between border-top pt-3 fw-bold fs-5">
            <span>Total:</span>
            <span>$<?= number_format($factura['total'], 2, ',', '.') ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
