<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<h2 class="mb-3 fw-bold">Dashboard</h2>
<p class="text-muted mb-4">Resumen general de la tienda y actividad reciente.</p>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-4 mb-4">

  <!-- Ingresos del mes -->
  <div class="col-md-3">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h6 class="text-muted">Ingresos del mes</h6>
        <h4 class="fw-bold text-success">$<?= number_format($ingresosDelMes, 2, ',', '.') ?></h4>
      </div>
    </div>
  </div>

  <!-- Ingresos totales -->
  <div class="col-md-3">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h6 class="text-muted">Ingresos totales</h6>
        <h4 class="fw-bold text-primary">$<?= number_format($ingresosTotales, 2, ',', '.') ?></h4>
      </div>
    </div>
  </div>

  <!-- Ventas -->
  <div class="col-md-3">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h6 class="text-muted">Ventas</h6>
        <h4 class="fw-bold"><?= $cantidadPedidos ?></h4>
        <small class="text-muted">Total registradas</small>
      </div>
    </div>
  </div>

  <!-- Clientes -->
  <div class="col-md-3">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h6 class="text-muted">Clientes</h6>
        <h4 class="fw-bold"><?= $cantidadClientes ?></h4>
        <small class="text-muted">+18.2% desde el mes pasado</small>
      </div>
    </div>
  </div>

</div>

<div class="row row-cols-1 row-cols-md-2 g-4 mb-4">

  <!-- Consultas sin responder -->
  <div class="col-md-3">
    <div class="card shadow-sm border-0 h-100">
      <div class="card-body">
        <h6 class="text-muted">Consultas sin responder</h6>
        <h4 class="fw-bold"><?= $consultasPendientes ?? 0 ?></h4>
      </div>
    </div>
  </div>

</div>

<div class="row g-4 mb-4">

  <!-- Gráfico -->
  <div class="col-lg-6">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white fw-bold">Ventas Semanales</div>
      <div class="card-body">
        <canvas id="ventasChart" height="130"></canvas>
      </div>
    </div>
  </div>

  <!-- Ventas recientes -->
  <div class="col-lg-6">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white fw-bold">
        Ventas Recientes
        <div class="small text-muted">Has recibido <?= count($ultimosPedidos) ?> ventas hoy.</div>
      </div>
      <div class="card-body p-0">
        <table class="table table-sm table-hover mb-0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Cliente</th>
              <th>Fecha</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($ultimosPedidos as $pedido): ?>
              <tr>
                <td>#<?= $pedido['invoice_id'] ?></td>
                <td><?= $pedido['nombre'] . ' ' . $pedido['apellido'] ?></td>
                <td><?= date('d/m/Y', strtotime($pedido['created_at'])) ?></td>
                <td>$<?= number_format($pedido['total'], 2, ',', '.') ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div class="card-footer text-end">
        <a href="<?= base_url('admin/facturas') ?>"><i class="bi bi-cart"></i> Ver Todas las Ventas</a>
      </div>
    </div>
  </div>

</div>

<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('ventasChart')?.getContext('2d');
  if (ctx) {
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?= json_encode($ventasSemanal['dias'] ?? []) ?>,
        datasets: [{
          label: 'Ventas ($)',
          data: <?= json_encode($ventasSemanal['totales'] ?? []) ?>,
          backgroundColor: '#dc3545'
        }]
      },
      options: {
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  }
</script>

<?= $this->endSection() ?>
