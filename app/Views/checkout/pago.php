<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<div class="container py-5 text-white">
    <h2 class="mb-4 text-center"><i class="bi bi-credit-card-2-back me-2"></i>Checkout - Información de Pago</h2>

    <form action="<?= base_url('checkout/pago') ?>" method="post" class="mx-auto" style="max-width: 700px;">
        <!-- Método de envío -->
        <div class="mb-4">
            <h5>Método de Envío</h5>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="envio" id="envio1" value="estandar" checked>
                <label class="form-check-label" for="envio1">
                    Envío Estándar (3-5 días hábiles) - $1000
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="envio" id="envio2" value="express">
                <label class="form-check-label" for="envio2">
                    Envío Express (1-2 días hábiles) - $2500
                </label>
            </div>
        </div>

        <!-- Información de tarjeta -->
        <div class="mb-4">
            <h5>Información de la Tarjeta</h5>
            <div class="mb-3">
                <label for="titular" class="form-label">Nombre en la Tarjeta</label>
                <input type="text" class="form-control" name="titular" id="titular" required placeholder="Ej: Tobias Orban">
            </div>
            <div class="mb-3">
                <label for="numero" class="form-label">Número de Tarjeta</label>
                <input type="text" class="form-control" name="numero" id="numero" required placeholder="1234 5678 9012 3456">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="exp" class="form-label">Fecha de Expiración</label>
                    <input type="text" class="form-control" name="exp" id="exp" required placeholder="MM/AA">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cvv" class="form-label">CVV</label>
                    <input type="text" class="form-control" name="cvv" id="cvv" required placeholder="123">
                </div>
            </div>
        </div>

        <!-- Botón continuar -->
        <div class="d-flex justify-content-between">
            <a href="<?= base_url('checkout') ?>" class="btn btn-secondary">Atrás</a>
            <button type="submit" class="btn btn-danger">Continuar</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
