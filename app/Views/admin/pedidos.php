<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<h2 class="fw-bold mb-2">Pedidos</h2>
<p class="text-muted mb-4">Gestiona y procesa los pedidos de la tienda.</p>

<!-- Barra superior: búsqueda, filtro, exportar -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
  <!-- Búsqueda -->
  <div class="flex-grow-1">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Buscar por ID, cliente o producto...">
      <button class="btn btn-outline-secondary" type="submit">
        <i class="bi bi-search"></i>
      </button>
    </div>
  </div>

  <!-- Filtros y acciones -->
  <div class="d-flex gap-2 flex-wrap">
    <select class="form-select" style="min-width: 120px;">
      <option>Todos</option>
      <option>Pendiente</option>
      <option>Procesando</option>
      <option>Enviado</option>
      <option>Entregado</option>
      <option>Cancelado</option>
    </select>

    <button class="btn btn-outline-dark d-flex align-items-center gap-1">
      <i class="bi bi-download"></i> Exportar
    </button>

    <button class="btn btn-danger d-flex align-items-center gap-1">
      <i class="bi bi-plus-circle"></i> Nuevo Pedido
    </button>
  </div>
</div>


<!-- Tabla de pedidos -->
<div class="card shadow-sm border-0">
  <div class="card-header bg-white fw-bold">
    Todos los Pedidos
    <span class="text-muted small ms-2">Mostrando <?= count($pedidos) ?> pedidos.</span>
  </div>
  <div class="table-responsive">
    <table class="table table-hover mb-0 align-middle">
      <thead>
        <tr>
          <th>ID</th>
          <th>Cliente</th>
          <th>Fecha</th>
          <th>Productos</th>
          <th>Total</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($pedidos as $p): ?>
          <tr>
            <td>#<?= $p['invoice_id'] ?></td>
            <td><?= $p['fname'] . ' ' . $p['lname'] ?></td>
            <td><?= date('d/m/Y', strtotime($p['created_at'])) ?></td>
            <td><?= $p['cantidad_productos'] ?></td>
            <td>$<?= number_format($p['total'], 2, ',', '.') ?></td>
            <td>
              <?php
                $estado = $p['estado'] ?? 'pendiente'; // Simulado, podés usar tabla si tenés
                $colores = [
                  'pendiente' => 'secondary',
                  'procesando' => 'warning',
                  'enviado' => 'primary',
                  'entregado' => 'success',
                  'cancelado' => 'danger',
                ];
              ?>
              <span class="badge bg-<?= $colores[$estado] ?? 'secondary' ?> text-capitalize"><?= $estado ?></span>
            </td>
            <td>
              <a href="<?= base_url('admin/pedidos/' . $p['invoice_id']) ?>" class="btn btn-sm btn-outline-secondary">Ver</a>
              <a href="#" class="btn btn-sm btn-danger">Editar</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>
