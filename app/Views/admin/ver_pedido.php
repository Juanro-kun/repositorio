<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<a href="<?= base_url('admin/pedidos') ?>" class="text-muted small d-inline-flex align-items-center mb-3">
  <i class="bi bi-arrow-left me-2"></i> Volver a pedidos
</a>

<div class="d-flex justify-content-between align-items-center mb-4">
  <div>
    <h2 class="fw-bold">Pedido #<?= $pedido['invoice_id'] ?></h2>
    <p class="text-muted mb-1">
      <i class="bi bi-calendar me-1"></i> <?= date('d/m/Y', strtotime($pedido['created_at'])) ?>
      <i class="bi bi-clock ms-3 me-1"></i> <?= date('H:i', strtotime($pedido['created_at'])) ?>
    </p>
  </div>
  <div>
    <button class="btn btn-outline-secondary me-2"><i class="bi bi-printer"></i> Imprimir</button>
    <button class="btn btn-outline-secondary me-2"><i class="bi bi-download"></i> Descargar Factura</button>
    <button class="btn btn-danger"><i class="bi bi-pencil-square"></i> Editar Pedido</button>
  </div>
</div>

<div class="row g-4">
  <!-- Detalles del pedido -->
  <div class="col-lg-8">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white fw-bold">Detalles del Pedido</div>
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
            <div class="fw-medium">$<?= number_format($item['subtotal'], 2, ',', '.') ?></div>
          </div>
        <?php endforeach ?>

        <div class="border-top pt-3 text-end">
          <div class="d-flex justify-content-between"><span class="text-muted">Subtotal</span><span>$<?= number_format($pedido['total'] - 16, 2, ',', '.') ?></span></div>
          <div class="d-flex justify-content-between"><span class="text-muted">Envío</span><span>$5,00</span></div>
          <div class="d-flex justify-content-between"><span class="text-muted">Impuestos</span><span>$11,00</span></div>
          <hr>
          <div class="d-flex justify-content-between fw-bold fs-5"><span>Total</span><span>$<?= number_format($pedido['total'], 2, ',', '.') ?></span></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Estado e info cliente -->
  <div class="col-lg-4">
    <div class="card shadow-sm border-0 mb-4">
      <div class="card-header bg-white fw-bold">Estado del Pedido</div>
      <div class="card-body">
        <select class="form-select mb-3">
          <option selected>Pendiente</option>
          <option>Procesando</option>
          <option>Enviado</option>
          <option>Entregado</option>
          <option>Cancelado</option>
        </select>
        <button class="btn btn-danger w-100">Actualizar Estado</button>
      </div>
    </div>

    <div class="card shadow-sm border-0 mb-4">
      <div class="card-header bg-white fw-bold">Información del Cliente</div>
      <div class="card-body">
        <p class="mb-1"><i class="bi bi-person me-2"></i><?= $pedido['nombre'] . ' ' . $pedido['apellido'] ?></p>
        <p class="mb-1"><i class="bi bi-envelope me-2"></i><?= $pedido['mail'] ?></p>
        <p class="mb-1"><i class="bi bi-geo-alt me-2"></i>Corrientes, Argentina</p>
        <button class="btn btn-outline-secondary w-100 mt-3">Ver Perfil del Cliente</button>
      </div>
    </div>

    <div class="card shadow-sm border-0">
      <div class="card-header bg-white fw-bold">Notas</div>
      <div class="card-body">
        <textarea class="form-control mb-3" placeholder="Anotar algo..." rows="4"></textarea>
        <button class="btn btn-dark w-100">Guardar Notas</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>