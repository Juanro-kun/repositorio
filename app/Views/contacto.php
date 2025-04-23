<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<section class="section-light py-5">
  <div class="container">
    <h2 class="fw-bold text-center mb-4">Contacto</h2>
    <p class="text-center mb-5">¿Tenés dudas, sugerencias o querés unirte a la aventura? ¡Estamos para ayudarte!</p>

    <div class="card shadow-lg p-4">
      <div class="row">
        <!-- Datos de la Empresa -->
        <div class="col-md-6 border-end">
          <h5 class="fw-bold mb-3"><i class="fas fa-dragon text-danger me-2"></i>Datos de la Empresa</h5>
          <ul class="list-unstyled">
            <li><i class="fas fa-user-tie me-2 text-dark"></i><strong>Titulares:</strong> Tobias Naim Orban & Juan Román Riquelme</li>
            <li><i class="fas fa-building me-2 text-dark"></i><strong>Razón Social:</strong> Calabozos & Dragones S.R.L.</li>
            <li><i class="fas fa-map-marker-alt me-2 text-dark"></i><strong>Domicilio:</strong> Av. 9 de Julio 2830, Chaco, Argentina</li>
            <li><i class="fas fa-phone me-2 text-dark"></i><strong>Tel:</strong> +54 362 462-5954</li>
            <li><i class="fas fa-envelope me-2 text-dark"></i><strong>Email:</strong> contacto@calabozosydragones.com</li>
          </ul>
        </div>

        <!-- Formulario -->
        <div class="col-md-6">
          <h5 class="fw-bold mb-3"><i class="fas fa-paper-plane text-danger me-2"></i>Envíanos tu Consulta</h5>
          <form>
            <input type="text" class="form-control mb-3" placeholder="Nombre Completo" required>
            <input type="email" class="form-control mb-3" placeholder="Correo Electrónico" required>
            <input type="text" class="form-control mb-3" placeholder="Asunto" required>
            <textarea class="form-control mb-3" rows="4" placeholder="Escribí tu mensaje..." required></textarea>
            <button type="submit" class="btn btn-danger w-100">Enviar Mensaje</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
