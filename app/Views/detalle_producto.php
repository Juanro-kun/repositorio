<?= $this->extend('layout') ?> 
<?= $this->section('contenido') ?>

<section class="section-dark py-5">
    <div class="container">
        <!-- Fila con botón de volver -->
        <div class="row mb-3">
            <div class="col">
                <a href="<?= base_url('catalogo') ?>" class="btn btn-secondary">
                    ← Volver al catálogo
                </a>
            </div>
        </div>

        <div class="row align-items-start">
            <div class="col-md-6">
                <img src="<?= base_url('uploads/' . $producto['image']) ?>" class="img-fluid rounded shadow" alt="<?= esc($producto['name']) ?>" onerror="this.src='<?= base_url('assets/img/default.png') ?>'">
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold"><?= esc($producto['name']) ?></h2>
                <h4 class="text-success mt-2">$<?= number_format($producto['price'], 0, ',', '.') ?></h4>

                <?php $extra = json_decode($producto['description'], true); ?>
                <p class="mt-3"><?= esc($extra['descripcion'] ?? $producto['description']) ?></p>

                <table class="table table-dark table-striped mt-4">
                    <tr><th>Stock</th><td><?= $producto['stock'] ?? "Consultar" ?></td></tr>
                    <tr><th>Descuento</th><td><?= $producto['discount'] ?? 0 ?>%</td></tr>
                    <?php if (!empty($extra['marca'])): ?><tr><th>Marca</th><td><?= esc($extra['marca']) ?></td></tr><?php endif; ?>
                    <?php if (!empty($extra['edad'])): ?><tr><th>Edad sugerida</th><td><?= esc($extra['edad']) ?></td></tr><?php endif; ?>
                    <?php if (!empty($extra['jugadores'])): ?><tr><th>Jugadores</th><td><?= esc($extra['jugadores']) ?></td></tr><?php endif; ?>
                    <?php if (!empty($extra['formato'])): ?><tr><th>Formato</th><td><?= esc($extra['formato']) ?></td></tr><?php endif; ?>
                </table>

                <?php if (session()->get('isLoggedIn')): ?>
                    <form method="POST" action="<?= base_url('agregar-al-carrito') ?>">
                        <input type="hidden" name="product_id" value="<?= $producto['product_id'] ?>">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-outline-light w-100 mt-2">
                            <i class="bi bi-cart-plus"></i> Agregar al carrito
                        </button>
                    </form>                   
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>


