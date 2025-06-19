<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>
<div class="container py-5">
  <h2 class="mb-4 text-white">📋 Paso 4: Revisión del Pedido</h2>
  <div class="row g-4">
    <div class="col-lg-8">
      <div class="card shadow-sm">
        <div class="card-header bg-danger text-white fw-bold">Productos en tu Carrito</div>
        <div class="card-body p-0">
          <table class="table mb-0">
            <thead class="table-light">
              <tr>
                <th>Producto</th>
                <th class="text-center">Cantidad</th>
                <th class="text-end">Precio</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($productos)): ?>
                <?php foreach ($productos as $p): ?>
                <tr>
                  <td><?= esc($p['name']) ?></td>
                  <td class="text-center"><?= esc($p['cantidad']) ?></td>
                  <td class="text-end">$<?= number_format($p['price'], 2, ',', '.') ?></td>
                </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="3" class="text-center">No hay productos en el carrito.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card shadow-sm">
        <div class="card-header bg-light fw-bold">Resumen de Costos</div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
              <span>Subtotal</span><span>$<?= number_format($subtotal ?? 0, 2, ',', '.') ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between fw-bold text-danger">
              <span>Total</span><span>$<?= number_format($total ?? 0, 2, ',', '.') ?></span>
            </li>
          </ul>
          <a href="<?= base_url('checkout/confirmar') ?>" class="btn btn-success w-100 mt-4">
            <i class="bi bi-check-circle"></i> Confirmar Pedido
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
