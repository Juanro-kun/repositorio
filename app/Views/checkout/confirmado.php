<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<div class="container text-center py-5 text-white">
    <h2 class="mb-4"><i class="bi bi-check-circle-fill text-success me-2"></i>¡Gracias por tu compra!</h2>
    <p>Tu pedido fue recibido correctamente y será procesado en breve.</p>
    <a href="<?= base_url('/') ?>" class="btn btn-primary mt-4">Volver al inicio</a>
</div>

<?= $this->endSection() ?>
