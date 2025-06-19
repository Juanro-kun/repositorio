<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<h2 class="mb-3 fw-bold">Dashboard</h2>
<p class="text-muted mb-4">Resumen general de la tienda y actividad reciente.</p>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 g-4 mb-4">
  <div class="col-md-3">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h6 class="text-muted">Ingresos del mes</h6>
        <h4 class="fw-bold text-success">$<?= number_format($ingresosDelMes, 2, ',', '.') ?></h4>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h6 class="text-muted">Ventas</h6>
        <h4 class="fw-bold"><?= $cantidadVentas ?></h4>
        <small class="text-muted">Total registradas</small>
      </div>
    </div> 
  </div>

  <div class="col-md-3">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h6 class="text-muted">Clientes</h6>
        <h4 class="fw-bold"><?= $cantidadClientes ?></h4>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card shadow-sm border-0">
      <div class="card-body">
        <h6 class="text-muted">Consultas sin responder</h6>
        <h4 class="fw-bold"><?= $consultasPendientes ?></h4>
      </div>
    </div>
  </div>
</div>

<div class="row g-4 mb-4">
  <div class="col-lg-6 d-none d-lg-block">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <span class="fw-bold">Gráfico de Ventas</span>
        <div>
          <button class="btn btn-sm btn-outline-secondary me-1" onclick="cargarGrafico('semanal')">Semanales</button>
          <button class="btn btn-sm btn-outline-secondary me-1" onclick="cargarGrafico('mensual')">Mensuales</button>
          <button class="btn btn-sm btn-outline-secondary" onclick="cargarGrafico('anual')">Anuales</button>
        </div>
      </div>
      <div class="card-body">
        <canvas id="ventasChart" height="130"></canvas>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white fw-bold">
        Ventas Recientes
                <!-- ✅ CORREGIDO -->
        <?php if ($ventasHoy > 0): ?>
          <div class="small text-muted">Has recibido <?= $ventasHoy ?> ventas hoy.</div>
        <?php else: ?>
          <div class="small text-danger">No se registraron ventas hoy.</div>
        <?php endif; ?>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const datosVentas = {
    semanal: {
      labels: <?= json_encode($ventasSemanal['dias']) ?>,
      data: <?= json_encode($ventasSemanal['totales']) ?>
    },
    mensual: {
      labels: <?= json_encode($ventasMensual['dias']) ?>,
      data: <?= json_encode($ventasMensual['totales']) ?>
    },
    anual: {
      labels: <?= json_encode($ventasAnual['meses']) ?>,
      data: <?= json_encode($ventasAnual['totales']) ?>
    }
  };

  const ctx = document.getElementById('ventasChart').getContext('2d');
  const chart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: datosVentas.semanal.labels,
      datasets: [{
        label: 'Ventas ($)',
        data: datosVentas.semanal.data,
        backgroundColor: '#dc3545'
      }]
    },
    options: {
      scales: {
        y: { beginAtZero: true }
      }
    }
  });

  function cargarGrafico(rango) {
    chart.data.labels = datosVentas[rango].labels;
    chart.data.datasets[0].data = datosVentas[rango].data;
    chart.update();
  }
</script>

<?= $this->endSection() ?>

