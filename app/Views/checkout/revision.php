<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<div class="container py-5 text-white">
    <h2 class="text-center mb-5"><i class="bi bi-clipboard-check me-2"></i>Revisión Final del Pedido</h2>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="row g-4">
                <!-- Datos del envío y contacto -->
                <div class="col-md-6">
                    <div class="bg-dark p-4 rounded shadow-sm mb-4">
                        <h5><i class="bi bi-geo-alt-fill me-2"></i>Datos del Envío</h5>
                        <?php $envio = session('checkout_envio'); ?>
                        <p class="mb-1"><?= esc($envio['nombre']) . ' ' . esc($envio['apellido']) ?></p>
                        <p class="mb-1"><?= esc($envio['direccion']) ?> <?= esc($envio['extra']) ?></p>
                        <p class="mb-1"><?= esc($envio['ciudad']) ?>, <?= esc($envio['provincia']) ?></p>
                        <p class="mb-0">CP <?= esc($envio['cp']) ?> - <?= esc($envio['pais']) ?></p>
                    </div>

                    <div class="bg-dark p-4 rounded shadow-sm mb-4">
                        <h5><i class="bi bi-telephone-fill me-2"></i>Contacto</h5>
                        <?php $contacto = session('checkout_contacto'); ?>
                        <p class="mb-1">Email: <?= esc($contacto['email']) ?></p>
                        <p class="mb-0">Teléfono: <?= esc($contacto['telefono']) ?></p>
                    </div>

                    <div class="bg-dark p-4 rounded shadow-sm">
                        <h5><i class="bi bi-credit-card-2-front-fill me-2"></i>Método de Pago</h5>
                        <?php $pago = session('checkout_pago'); ?>
                        <p class="mb-1">Titular: <?= esc($pago['titular']) ?></p>
                        <p class="mb-1">Tarjeta terminada en **** <?= substr($pago['numero'], -4) ?></p>
                        <?php if (isset($pago['vencimiento'])): ?>
                            <p class="mb-1">Expira: <?= esc($pago['vencimiento']) ?></p>
                        <?php endif; ?>
                        <p class="mb-0">Envío: <?= esc($pago['envio'] === 'express' ? 'Express ($2500)' : 'Estándar ($1000)') ?></p>
                    </div>
                </div>

                <!-- Productos y resumen -->
                <div class="col-md-6">
                    <div class="bg-dark p-4 rounded shadow-sm mb-4">
                        <h5><i class="bi bi-cart-fill me-2"></i>Productos en tu carrito</h5>
                        <ul class="list-group bg-dark">
                            <?php foreach ($productos as $item): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white border-secondary">
                                    <span><?= esc($item['name']) ?> x <?= $item['cantidad'] ?></span>
                                    <span>$<?= number_format($item['total'], 2, ',', '.') ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="bg-dark p-4 rounded shadow-sm text-end">
                        <p>Subtotal: $<?= number_format($subtotal, 2, ',', '.') ?></p>
                        <p>Envío: $<?= number_format($costoEnvio, 2, ',', '.') ?></p>
                        <p>Impuestos (10%): $<?= number_format($impuestos, 2, ',', '.') ?></p>
                        <hr>
                        <h4>Total: $<?= number_format($total, 2, ',', '.') ?></h4>

                        <form action="<?= base_url('checkout/confirmar') ?>" method="post" class="mt-3">
                            <button type="submit" class="btn btn-success w-100 btn-lg">
                                <i class="bi bi-check-circle-fill me-1"></i> Confirmar Pedido
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
