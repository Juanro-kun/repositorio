<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<div class="container py-5 text-white">
    <h2 class="mb-4 text-center"><i class="bi bi-person-circle me-2"></i>Checkout - Información de Contacto</h2>

    <form action="<?= base_url('checkout/contacto') ?>" method="post" class="mx-auto" style="max-width: 600px;">
        <div class="mb-4">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" name="email" id="email" required placeholder="tu@email.com">
        </div>

        <div class="mb-4">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" name="telefono" id="telefono" required placeholder="Ej: 3704000000">
            <div class="form-text text-light">Solo te contactaremos si hay un problema con tu pedido.</div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-danger">Continuar</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
