<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<h2 class="fw-bold mb-3">Notificaciones</h2>
<p class="text-muted">Gestiona las notificaciones y alertas del sistema.</p>

<div class="row mb-4">
  <div class="col-md-3"><div class="bg-white border p-3 rounded text-center shadow-sm"><h4><?= $noLeidas ?></h4><div class="text-muted">No Leídas</div></div></div>
  <div class="col-md-3"><div class="bg-white border p-3 rounded text-center shadow-sm"><h4><?= $porTipo['pedido'] ?></h4><div class="text-muted">Pedidos</div></div></div>
  <div class="col-md-3"><div class="bg-white border p-3 rounded text-center shadow-sm"><h4><?= $porTipo['inventario'] ?></h4><div class="text-muted">Inventario</div></div></div>
  <div class="col-md-3"><div class="bg-white border p-3 rounded text-center shadow-sm"><h4><?= $porTipo['sistema'] ?></h4><div class="text-muted">Sistema</div></div></div>
</div>

<h5 class="fw-bold mb-3">Todas las Notificaciones</h5>
<div class="list-group">
  <?php foreach ($notificaciones as $n): ?>
    <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
      <div>
        <div class="fw-bold"><?= esc($n['fname']) ?> <?= esc($n['lname']) ?></div>
        <div class="text-muted">Usuario con rol <strong><?= esc($n['role']) ?></strong> registrado con email <?= esc($n['mail']) ?></div>
      </div>
      <small class="text-muted">Usuario ID #<?= $n['user_id'] ?></small>
    </div>
  <?php endforeach ?>
</div>

<?= $this->endSection() ?>
