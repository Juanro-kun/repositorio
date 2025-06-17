<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>
<div class="container py-5">
  <div class="bg-dark text-white p-4 rounded shadow">
    <h2 class="mb-4">💳 Paso 3: Método de Envío y Pago</h2>

    <?php if (isset($validation)): ?>
      <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('checkout/guardarPago') ?>" method="post" novalidate>
      <h5>Método de Envío</h5>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="envio" value="standard" id="envio1" checked required>
        <label class="form-check-label" for="envio1">Envío Estándar - $1000</label>
      </div>
      <div class="form-check mb-4">
        <input class="form-check-input" type="radio" name="envio" value="express" id="envio2" required>
        <label class="form-check-label" for="envio2">Envío Express - $2500</label>
      </div>

      <h5>Datos de Tarjeta</h5>
      <div class="row g-3">
        <div class="col-12">
          <label class="form-label">Nombre en la Tarjeta</label>
          <input type="text" class="form-control" name="nombre_tarjeta" required minlength="3" placeholder="Ej: Tobias Orban">
        </div>
        <div class="col-12">
          <label class="form-label">Número de Tarjeta</label>
          <input type="text" class="form-control" name="numero_tarjeta"
            placeholder="1234 5678 9012 3456"
            required pattern="^[0-9]{13,16}$"
            title="Debe contener entre 13 y 16 dígitos"
            oninput="this.value = this.value.replace(/\D/g, '').slice(0, 16)">
        </div>
        <div class="col-md-6">
          <label class="form-label">Vencimiento</label>
          <input type="text" class="form-control" name="vencimiento" id="vencimiento"
            placeholder="MM/AA"
            required pattern="^(0[1-9]|1[0-2])\/[0-9]{2}$"
            title="Formato válido: MM/AA (ej. 09/25)">
        </div>
        <div class="col-md-6">
          <label class="form-label">CVV</label>
          <input type="text" class="form-control" name="cvv"
            placeholder="123"
            required pattern="^[0-9]{3}$"
            title="Debe ser un número de 3 dígitos"
            oninput="this.value = this.value.replace(/\D/g, '').slice(0, 3)">
        </div>
      </div>

      <div class="text-end mt-4">
        <button type="submit" class="btn btn-danger">Continuar a Revisión <i class="bi bi-arrow-right"></i></button>
      </div>
    </form>
  </div>
</div>

<!-- Script para formatear MM/AA con autocompletado -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  const vencimiento = document.getElementById("vencimiento");

  vencimiento.addEventListener("input", (e) => {
    let value = e.target.value.replace(/\D/g, ''); // solo números

    if (value.length === 1 && parseInt(value) > 1) {
      // Si el primer dígito es 2-9 => agregar 0 adelante
      value = '0' + value;
    }

    if (value.length >= 2) {
      let mes = value.slice(0, 2);
      if (parseInt(mes) > 12) mes = '12';
      value = mes + (value.length > 2 ? '/' + value.slice(2, 4) : '/');
    }

    e.target.value = value.slice(0, 5); // máximo MM/AA
  });
});
</script>
<?= $this->endSection() ?>
