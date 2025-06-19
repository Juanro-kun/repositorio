<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<?php
  $invoice_id   = session('invoice_id') ?? 0;
  $productos    = session('checkout_productos') ?? [];
  $subtotal     = session('checkout_subtotal') ?? 0;
  $costoEnvio   = session('checkout_envio_costo') ?? 0;
  $impuestos    = session('checkout_impuestos') ?? 0;
  $total        = session('checkout_total') ?? 0;
?>


<div class="container py-5 text-center">
  <div class="text-success display-4 mb-3">
    <i class="bi bi-check-circle-fill"></i>
  </div>
  <h2 class="fw-bold text-white mb-2">¡Pedido Confirmado!</h2>
  <p class="text-muted">Gracias por tu compra. Te enviaremos un correo con los detalles.</p>

  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="d-flex justify-content-between text-muted small mb-3">
            <span>Pedido N.º <strong>#<?= str_pad($invoice_id, 6, '0', STR_PAD_LEFT) ?></strong></span>
            <span>Fecha: <?= date('d/m/Y') ?></span>
          </div>

          <table class="table table-borderless align-middle mb-3">
            <thead class="border-bottom">
              <tr>
                <th>Producto</th>
                <th class="text-center">Cantidad</th>
                <th class="text-end">Precio</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($productos as $p): ?>
                <tr>
                  <td><?= esc($p['name']) ?></td>
                  <td class="text-center"><?= $p['cantidad'] ?></td>
                  <td class="text-end">$<?= number_format($p['price'], 2, ',', '.') ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>

          <ul class="list-group list-group-flush text-end mb-4">
            <li class="list-group-item d-flex justify-content-between">
              <span>Subtotal</span>
              <span>$<?= number_format($subtotal, 2, ',', '.') ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between fw-bold text-danger">
              <span>Total</span>
              <span>$<?= number_format($total, 2, ',', '.') ?></span>
            </li>
          </ul>

          <div class="d-flex justify-content-center gap-3 mt-3">
            <a href="<?= base_url('/catalogo') ?>" class="btn btn-danger">
              <i class="bi bi-shop"></i> Volver al Catálogo
            </a>
            <a href="<?= base_url('/perfil/pedidos') ?>" class="btn btn-outline-dark">
              <i class="bi bi-box-seam"></i> Ver Mis Pedidos
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
