<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<div class="container py-5 text-white">
    <h2 class="mb-4 text-center"><i class="bi bi-truck me-2"></i>Checkout - Dirección de Envío</h2>

    <form action="<?= base_url('checkout/envio') ?>" method="post" class="mx-auto" style="max-width: 700px;">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="apellido" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellido" id="apellido" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" name="direccion" id="direccion" required>
        </div>

        <div class="mb-3">
            <label for="extra" class="form-label">Apartamento, piso, etc. (opcional)</label>
            <input type="text" class="form-control" name="extra" id="extra">
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" id="ciudad" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="provincia" class="form-label">Provincia</label>
                <input type="text" class="form-control" name="provincia" id="provincia" required>
            </div>
            <div class="col-md-2 mb-3">
                <label for="cp" class="form-label">C.P.</label>
                <input type="text" class="form-control" name="cp" id="cp" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="pais" class="form-label">País</label>
            <input type="text" class="form-control" name="pais" id="pais" value="Argentina" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="<?= base_url('checkout') ?>" class="btn btn-secondary">Atrás</a>
            <button type="submit" class="btn btn-danger">Continuar</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
