<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<section class="section-dark py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="<?= base_url('assets/img/'.$producto['imagen']) ?>" class="img-fluid rounded shadow" alt="<?= $producto['nombre'] ?>">
            </div>
            <div class="col-md-6">
                <h2 class="fw-bold"><?= $producto['nombre'] ?></h2>
                <h4 class="text-success mt-2">$<?= number_format($producto['precio'], 0, ',', '.') ?></h4>
                <p class="mt-3"><?= $producto['descripcion_larga'] ?? $producto['descripcion'] ?></p>

                <table class="table table-dark table-striped mt-4">
                    <tr>
                        <th>Rareza</th>
                        <td><?= $producto['rareza'] ?? "Épica" ?></td>
                    </tr>
                    <tr>
                        <th>Uso recomendado</th>
                        <td><?= $producto['uso'] ?? "Ideal para aventureros" ?></td>
                    </tr>
                    <tr>
                        <th>Marca</th>
                        <td><?= $producto['marca'] ?? "Wizards of the Coast" ?></td>
                    </tr>
                    <tr>
                        <th>Edad sugerida</th>
                        <td><?= $producto['edad'] ?? "+12 años" ?></td>
                    </tr>
                    <tr>
                        <th>Jugadores</th>
                        <td><?= $producto['jugadores'] ?? "2 a 6" ?></td>
                    </tr>
                    <tr>
                        <th>Formato</th>
                        <td><?= $producto['formato'] ?? "Hardcover / Tapa dura" ?></td>
                    </tr>
                </table>

                <a href="<?= base_url('catalogo') ?>" class="btn btn-secondary mt-3">← Volver al catálogo</a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>




