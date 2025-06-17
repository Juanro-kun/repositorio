<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<h2 class="fw-bold mb-3">Consultas</h2>
<p class="text-muted mb-4">Listado de consultas realizadas por los usuarios.</p>

<div class="row g-4">
  <div class="col-12">
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
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($inquiries as $i): ?>
              <tr>
                <td><?= esc($i['user_id']) ?></td>
                <td><?= esc($i['subject']) ?></td>
                <td><?= esc($i['message']) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($i['created_at'])) ?></td>
                <td>
                  <a href="<?= base_url('admin/consultas/eliminar/inquiry/' . $i['inquiry_id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar consulta?')">Eliminar</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>

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
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($contacts as $c): ?>
              <tr>
                <td><?= esc($c['name']) ?></td>
                <td><?= esc($c['mail']) ?></td>
                <td><?= esc($c['subject']) ?></td>
                <td><?= esc($c['message']) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($c['created_at'])) ?></td>
                <td>
                  <a href="<?= base_url('admin/consultas/eliminar/contact/' . $c['contact_id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar consulta?')">Eliminar</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

<?= $this->endSection() ?>

