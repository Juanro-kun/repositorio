<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<div class="container text-center mt-5">
    <div class="alert alert-success d-flex align-items-center justify-content-center" role="alert">
        <i class="bi bi-check-circle-fill me-2 fs-3"></i>
        <div>
            <h3 class="fw-bold mb-1">¡Mensaje enviado!</h3>
            <p class="mb-0">Gracias por contactarnos. Te responderemos a la brevedad.</p>
        </div>
    </div>

    <a href="<?= base_url('/') ?>" class="btn btn-primary mt-3">
        <i class="bi bi-arrow-left"></i> Volver al inicio
    </a>
</div>

<?= $this->endSection() ?>
