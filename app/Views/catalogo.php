<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<section class="section-dark py-5">
    <div class="container">
        <h2 class="fw-bold text-center mb-5">Catálogo de Productos</h2>

        <!-- Buscador -->
        <form method="GET" class="mb-5 text-center">
            <input type="text" name="busqueda" placeholder="Buscar producto..." class="form-control w-50 mx-auto">
        </form>

        <div class="row">
            <!-- Filtros -->
            <div class="col-md-3 mb-4">
                <div class="p-3 bg-dark rounded-3 text-white">
                    <h5>Filtros</h5>

                    <h6 class="mt-3">Categorías</h6>
                    <a href="<?= base_url('catalogo?categoria=armas') ?>">Armas</a><br>
                    <a href="<?= base_url('catalogo?categoria=pociones') ?>">Pociones</a><br>
                    <a href="<?= base_url('catalogo?categoria=armaduras') ?>">Armaduras</a>

                    <h6 class="mt-3">Precio</h6>
                    <a href="<?= base_url('catalogo?precio=menos10000') ?>">Menos de $10.000</a><br>
                    <a href="<?= base_url('catalogo?precio=entre10000y50000') ?>">Entre $10.000 y $50.000</a><br>
                    <a href="<?= base_url('catalogo?precio=mas50000') ?>">Más de $50.000</a>

                    <h6 class="mt-3">Rareza</h6>
                    <a href="<?= base_url('catalogo?rareza=comun') ?>">Común</a><br>
                    <a href="<?= base_url('catalogo?rareza=epico') ?>">Épico</a><br>
                    <a href="<?= base_url('catalogo?rareza=legendario') ?>">Legendario</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row g-4">

                <?php
                // Productos
                $productos = [
                    [
                        'slug' => 'espada-magica',
                        'nombre' => 'Espada Mágica',
                        'categoria' => 'armas',
                        'rareza' => 'epico',
                        'descripcion' => 'Una espada imbuida con magia arcana. +10 ataque.',
                        'precio' => 120000,
                        'imagen' => 'guia1.jpg'
                    ],
                    [
                        'slug' => 'pocion-curativa',
                        'nombre' => 'Poción Curativa',
                        'categoria' => 'pociones',
                        'rareza' => 'comun',
                        'descripcion' => 'Recupera 50HP al instante.',
                        'precio' => 2500,
                        'imagen' => 'pocion.png'
                    ],
                    [
                        'slug' => 'escudo-legendario',
                        'nombre' => 'Escudo Legendario',
                        'categoria' => 'armas',
                        'rareza' => 'legendario',
                        'descripcion' => 'Protección impenetrable ante ataques físicos.',
                        'precio' => 80000,
                        'imagen' => 'escudo.png'
                    ],
                    [
                        'slug' => 'armadura-dragon',
                        'nombre' => 'Armadura de Dragón',
                        'categoria' => 'armaduras',
                        'rareza' => 'legendario',
                        'descripcion' => 'Hecha con escamas de dragón. Reduce daño en 75%.',
                        'precio' => 250000,
                        'imagen' => 'armadura.png'
                    ]
                ];

                // Filtros
                $busqueda = $_GET['busqueda'] ?? '';
                $categoriaFiltro = $_GET['categoria'] ?? '';
                $precioFiltro = $_GET['precio'] ?? '';
                $rarezaFiltro = $_GET['rareza'] ?? '';

                foreach ($productos as $producto) {

                    // Filtrar categoría
                    if ($categoriaFiltro && strtolower($producto['categoria']) != strtolower($categoriaFiltro)) continue;

                    // Filtrar precio
                    if ($precioFiltro) {
                        if ($precioFiltro == 'menos10000' && $producto['precio'] >= 10000) continue;
                        if ($precioFiltro == 'entre10000y50000' && ($producto['precio'] < 10000 || $producto['precio'] > 50000)) continue;
                        if ($precioFiltro == 'mas50000' && $producto['precio'] <= 50000) continue;
                    }

                    // Filtrar rareza
                    if ($rarezaFiltro && strtolower($producto['rareza']) != strtolower($rarezaFiltro)) continue;
                ?>
                    <div class="col-md-4">
                        <div class="card bg-dark text-white h-100">
                            <img src="<?= base_url('assets/img/'.$producto['imagen']) ?>" class="card-img-top" alt="<?= $producto['nombre'] ?>">
                            <div class="card-body">
                                <h5><?= $producto['nombre'] ?></h5>
                                <p><?= $producto['descripcion'] ?></p>
                                <p class="fw-bold <?= $producto['precio'] < 50000 ? 'text-success' : 'text-danger' ?>">$<?= number_format($producto['precio'], 0, ',', '.') ?></p>
                                <a href="<?= base_url('catalogo/'.$producto['slug']) ?>" class="btn btn-primary w-100 mt-2">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

