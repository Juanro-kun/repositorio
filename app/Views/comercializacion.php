<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<section class="section-light text-center py-5">
  <div class="container">
    <h2 class="fw-bold mb-4">Comercialización</h2>
    <p class="mb-5">
      Descubrí cómo recibir tus productos épicos y las facilidades que ofrecemos para cada aventurero.
    </p>

    <div class="row justify-content-center g-4">
      <!-- Tipos de Entrega -->
      <div class="col-md-5 col-lg-3">
        <div class="info-card p-4 card-entrega">
          <h5 class="fw-bold mb-3">Tipos de Entrega</h5>
          <ul class="list-unstyled text-start">
            <li>✅ Retiro en sede UNNE</li>
            <li>📦 Entrega a domicilio</li>
            <li>⚡ Servicio exprés</li>
          </ul>
        </div>
      </div>

      <!-- Formas de Envío -->
      <div class="col-md-5 col-lg-3">
        <div class="info-card p-4 card-envio">
          <h5 class="fw-bold mb-3">Formas de Envío</h5>
          <ul class="list-unstyled text-start">
            <li>📬 Correo Argentino / OCA</li>
            <li>🐉 Dragón Express (VIP)</li>
          </ul>
        </div>
      </div>

      <!-- Formas de Pago -->
      <div class="col-md-5 col-lg-3">
        <div class="info-card p-4 card-pago">
          <h5 class="fw-bold mb-3">Formas de Pago</h5>
          <ul class="list-unstyled text-start">
            <li>💵 Efectivo / Transferencia</li>
            <li>💳 Tarjeta de crédito/débito</li>
            <li>🪙 Oro de Dragón</li>
          </ul>
        </div>
      </div>

      <!-- Información Útil -->
      <div class="col-md-5 col-lg-3">
        <div class="info-card p-4 card-info">
          <h5 class="fw-bold mb-3">Información Útil</h5>
          <ul class="list-unstyled text-start">
            <li>⏱️ Entrega: 2-5 días hábiles</li>
            <li>🛡️ Garantía por defectos</li>
            <li>📞 Soporte postventa</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>

