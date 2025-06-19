<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<section class="section-dark py-5">
  <div class="container">
    <h2 class="fw-bold text-center mb-4">Contacto</h2>
    <p class="text-center mb-5">¿Tenés dudas, sugerencias o querés unirte a la aventura? ¡Estamos para ayudarte!</p>

    <div class="card shadow-lg p-4 section-dark">
      <div class="row">
        <!-- Datos de la Empresa -->
        <div class="col-md-6 border-end">
          <h5 class="fw-bold mb-3"><i class="fas fa-dragon text-danger me-2"></i>Datos de la Empresa</h5>
          <ul class="list-unstyled">
            <li><i class="fas fa-user-tie me-2 text-dark"></i><strong>Titulares:</strong> Tobias Naim Orban & Juan Román Zacarias</li>
            <li><i class="fas fa-building me-2 text-dark"></i><strong>Razón Social:</strong> La Taberna del Gnomo Errante S.R.L.</li>
            <li><i class="fas fa-map-marker-alt me-2 text-dark"></i><strong>Domicilio:</strong> Av. 9 de Julio 2830, Chaco, Argentina</li>
            <li><i class="fas fa-phone me-2 text-dark"></i><strong>Tel:</strong> +54 362 462-5954</li>
            <li><i class="fas fa-envelope me-2 text-dark"></i><strong>Email:</strong> contacto@gnomo.com</li>
          </ul>
        </div>

        <!-- Formulario -->
        <?php $isLoggedIn = session()->get('isLoggedIn'); ?>
        <div class="col-md-6">
          <h5 class="fw-bold mb-3">
            <i class="fas fa-paper-plane text-danger me-2"></i>
            <?= $isLoggedIn ? 'Realizá tu Consulta' : 'Envíanos tu Consulta' ?>
          </h5>

          <?php if (session('errors')): ?>
            <div class="alert alert-danger">
              Por favor corregí los errores marcados abajo.
            </div>
          <?php endif; ?>

          <form method="POST" action="<?= base_url($isLoggedIn ? 'inquiry/enviar' : 'contacto/enviar') ?>">
            <?php if (!$isLoggedIn): ?>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <input type="text" name="fname" class="form-control" placeholder="Nombre" value="<?= old('fname') ?>">
                  <?php if (isset(session('errors')['fname'])): ?>
                    <small class="text-danger"><?= session('errors')['fname'] ?></small>
                  <?php endif; ?>
                </div>
                <div class="col-md-6 mb-3">
                  <input type="text" name="lname" class="form-control" placeholder="Apellido" value="<?= old('lname') ?>">
                  <?php if (isset(session('errors')['lname'])): ?>
                    <small class="text-danger"><?= session('errors')['lname'] ?></small>
                  <?php endif; ?>
                </div>
              </div>

              <div class="mb-3">
                <input type="email" name="mail" class="form-control" placeholder="Correo Electrónico" value="<?= old('mail') ?>">
                <?php if (isset(session('errors')['mail'])): ?>
                  <small class="text-danger"><?= session('errors')['mail'] ?></small>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <div class="mb-3">
              <input type="text" name="subject" class="form-control" placeholder="Asunto" value="<?= old('subject') ?>">
              <?php if (isset(session('errors')['subject'])): ?>
                <small class="text-danger"><?= session('errors')['subject'] ?></small>
              <?php endif; ?>
            </div>

            <div class="mb-3">
              <textarea name="message" class="form-control" rows="4" placeholder="Escribí tu mensaje..."><?= old('message') ?></textarea>
              <?php if (isset(session('errors')['message'])): ?>
                <small class="text-danger"><?= session('errors')['message'] ?></small>
              <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">Enviar mensaje</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
