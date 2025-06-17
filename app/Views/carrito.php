<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<div class="container py-5 text-white">
    <h2 class="mb-4"><i class="bi bi-cart-fill me-2"></i>Tu carrito de compras</h2>

    <?php if (empty($items)): ?>
        <p>No hay productos en el carrito.</p>
    <?php else: ?>
    <div class="row">
        <div class="col-md-8">
            <div class="list-group">
                <?php foreach ($items as $item): ?>
                    <?php
                        $desc = json_decode($item['description'], true);
                        $descripcion = is_array($desc) && isset($desc['descripcion']) ? $desc['descripcion'] : $item['description'];
                        $cantidad = (int)$item['cantidad'];
                        $stock = (int)$item['stock']; // Asegurate de que esta clave exista
                    ?>
                    <div class="list-group-item d-flex justify-content-between align-items-center bg-dark text-white mb-2 rounded">
                        <div class="d-flex align-items-center">
                            <img src="<?= base_url('uploads/' . $item['image']) ?>" class="me-3 rounded" width="64" height="64" alt="<?= esc($item['name']) ?>" onerror="this.src='<?= base_url('assets/img/default.png') ?>'">
                            <div>
                                <strong><?= esc($item['name']) ?></strong><br>
                                <small><?= esc($descripcion) ?></small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <span>$<?= number_format($item['price'], 2, ',', '.') ?></span>
                            
                            <?php if ($cantidad > 1): ?>
                                <form method="POST" action="<?= base_url('carrito/restar') ?>" class="d-inline">
                                    <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                                    <button class="btn btn-sm btn-outline-light" type="submit">−</button>
                                </form>
                            <?php else: ?>
                                <div style="width: 34px;"></div> <!-- Para que no se mueva el diseño -->
                            <?php endif; ?>

                            <span><?= $cantidad ?></span>

                            <?php if ($cantidad < $stock): ?>
                                <form method="POST" action="<?= base_url('carrito/sumar') ?>" class="d-inline">
                                    <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                                    <button class="btn btn-sm btn-outline-light" type="submit">+</button>
                                </form>
                            <?php else: ?>
                                <div style="width: 34px;"></div>
                            <?php endif; ?>

                            <span>= $<?= number_format($item['total'], 2, ',', '.') ?></span>

                            <form method="POST" action="<?= base_url('carrito/eliminar') ?>" class="d-inline">
                                <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                                <button class="btn btn-sm btn-outline-danger" type="submit">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-md-4">
            <div class="bg-dark p-4 rounded shadow">
                <h5 class="mb-3">Resumen del Pedido</h5>
                <p>Subtotal: $<?= number_format($subtotal, 2, ',', '.') ?></p>
                <p>Envío: $<?= number_format($envio, 2, ',', '.') ?></p>
                <p>Impuestos: $<?= number_format($impuestos, 2, ',', '.') ?></p>
                <hr>
                <h5>Total: $<?= number_format($total, 2, ',', '.') ?></h5>
                <a href="<?= base_url('checkout/contacto') ?>" class="btn btn-danger w-100 mt-3">Proceder al Pago</a>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
