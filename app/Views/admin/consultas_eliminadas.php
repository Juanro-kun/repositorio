<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<h2 class="fw-bold mb-3">Consultas Eliminadas</h2>

<a href="<?= base_url('admin/consultas') ?>" class="btn btn-outline-dark mb-4">
  <i class="bi bi-arrow-left"></i> Volver a Consultas
</a>

<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
  </div>
<?php endif ?>

<div class="row g-4">
  <div class="col-12">
    <!-- Usuarios Registrados -->
    <div class="card shadow-sm border-0 mb-4">
      <div class="card-header bg-white fw-bold">Consultas de Usuarios Registrados</div>
      <div class="table-responsive">
        <table class="table align-middle mb-0">
          <thead>
            <tr>
              <th>Usuario</th>
              <th>Asunto</th>
              <th>Mensaje</th>
              <th>Fecha</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($inquiries)): ?>
              <?php foreach ($inquiries as $i): ?>
                <tr>
                  <td><?= esc($i['user_id']) ?></td>
                  <td><?= esc($i['subject']) ?></td>
                  <td><?= esc($i['message']) ?></td>
                  <td><?= date('d/m/Y H:i', strtotime($i['created_at'])) ?></td>
                  <td>
                    <a href="<?= base_url('admin/consultas/restaurar/inquiry/' . $i['inquiry_id']) ?>" class="btn btn-sm btn-success">
                      Restaurar
                    </a>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php else: ?>
              <tr>
                <td colspan="5" class="text-center text-muted">No hay consultas eliminadas de usuarios registrados.</td>
              </tr>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Contacto -->
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white fw-bold">Consultas desde Contacto</div>
      <div class="table-responsive">
        <table class="table align-middle mb-0">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Email</th>
              <th>Asunto</th>
              <th>Mensaje</th>
              <th>Fecha</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($contacts)): ?>
              <?php foreach ($contacts as $c): ?>
                <tr>
                  <td><?= esc($c['name']) ?></td>
                  <td><?= esc($c['mail']) ?></td>
                  <td><?= esc($c['subject']) ?></td>
                  <td><?= esc($c['message']) ?></td>
                  <td><?= date('d/m/Y H:i', strtotime($c['created_at'])) ?></td>
                  <td>
                    <a href="<?= base_url('admin/consultas/restaurar/contact/' . $c['contact_id']) ?>" class="btn btn-sm btn-success">
                      Restaurar
                    </a>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php else: ?>
              <tr>
                <td colspan="6" class="text-center text-muted">No hay consultas eliminadas desde contacto.</td>
              </tr>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
