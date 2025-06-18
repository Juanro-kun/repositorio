<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<section class="section-dark py-5">
    <div class="container">
        <h2 class="fw-bold text-center mb-5">Catálogo de Productos</h2>

        <!-- Mensaje de éxito -->
        <?php if (session()->getFlashdata('mensaje')): ?>
            <div class="alert alert-success text-center">
                <?= session()->getFlashdata('mensaje') ?>
            </div>
        <?php endif; ?>

        <!-- Buscador -->
        <form method="GET" class="mb-5 text-center">
            <input type="text" name="busqueda" placeholder="Buscar producto..." class="form-control w-50 mx-auto" value="<?= esc($_GET['busqueda'] ?? '') ?>">
        </form>

        <div class="row">
            <!-- Filtros -->
            <div class="col-md-3 mb-4">
                <div class="p-3 bg-dark rounded-3 text-white">
                    <h5>Filtros</h5>

                    <h6 class="mt-3">Categorías</h6>
                    <?php foreach ($categorias as $cat): ?>
                        <a href="<?= base_url('catalogo?categoria=' . $cat['category_id']) ?>"><?= esc($cat['category_name']) ?></a><br>
                    <?php endforeach; ?>

                    <h6 class="mt-3">Precio</h6>
                    <a href="<?= base_url('catalogo?precio=menos10000') ?>">Menos de $10.000</a><br>
                    <a href="<?= base_url('catalogo?precio=entre10000y50000') ?>">Entre $10.000 y $50.000</a><br>
                    <a href="<?= base_url('catalogo?precio=mas50000') ?>">Más de $50.000</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row g-4">

                    <?php if (empty($productos)): ?>
                        <div class="col-12 text-center text-white">
                            <p>No se encontraron productos que coincidan con los filtros.</p>
                        </div>
                    <?php endif; ?>

                    <?php foreach ($productos as $producto): ?>
                        <div class="col-md-4">
                            <div class="card bg-dark text-white h-100">
                                <img src="<?= base_url('uploads/' . $producto['image']) ?>" class="card-img-top" alt="<?= esc($producto['name']) ?>" onerror="this.src='<?= base_url('assets/img/default.png') ?>'">
                                <div class="card-body">
                                    <h5><?= esc($producto['name']) ?></h5>
                                    <?php $desc = json_decode($producto['description'], true); ?>
                                    <p><?= esc($desc['descripcion'] ?? $producto['description']) ?></p>
                                    <p class="fw-bold <?= $producto['price'] < 50000 ? 'text-success' : 'text-danger' ?>">
                                        $<?= number_format($producto['price'], 0, ',', '.') ?>
                                    </p>

                                    <a href="<?= base_url('catalogo/' . $producto['product_id']) ?>" class="btn btn-primary w-100 mt-2">
                                        Ver Detalles
                                    </a>

                                    <?php if (session()->get('isLoggedIn')): ?>
                                        <?php
                                            $cartModel = new \App\Models\CartItemModel();
                                            $cartItem = $cartModel->where('user_id', session('user_id'))
                                                                  ->where('product_id', $producto['product_id'])
                                                                  ->first();
                                            $enCarrito = $cartItem['quantity'] ?? 0;
                                            $stockRestante = $producto['stock'] - $enCarrito;
                                        ?>

                                        <?php if ($stockRestante > 0): ?>
                                            <form method="POST" action="<?= base_url('agregar-al-carrito') ?>">
                                                <input type="hidden" name="product_id" value="<?= $producto['product_id'] ?>">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="btn btn-outline-light w-100 mt-2">
                                                    <i class="bi bi-cart-plus"></i> Agregar al carrito
                                                </button>
                                                <small class="text-muted d-block mt-1">Stock disponible: <?= $stockRestante ?></small>
                                            </form>
                                        <?php else: ?>
                                            <div class="alert alert-warning text-center py-2 mt-2 mb-0">
                                                📦 Límite de stock alcanzado
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
