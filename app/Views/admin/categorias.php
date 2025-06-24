<?php?>

<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<?php if (session()->getFlashdata('error')): ?>
  <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif ?>

<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success"><?= session('success') ?></div>
<?php endif ?>

<h2 class="fw-bold mb-3">Categorías</h2>
<p class="text-muted">Gestiona las categorías de productos de la tienda.</p>

<div class="card shadow-sm border-0 mb-4">
  <div class="card-header bg-white fw-bold d-flex justify-content-between align-items-center">
    Todas las Categorías
    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalNuevaCategoria">
  <i class="bi bi-plus-circle me-1"></i> Nueva Categoría
</button>

  </div>
  <div class="table-responsive">
    <table class="table align-middle mb-0">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Productos</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($categorias as $cat): ?>
          <tr>
            <td><?= esc($cat['category_name']) ?></td>
            <td><?= $cat['total_productos'] ?></td>
            <td>
              <button class="btn btn-sm btn-outline-dark editarCategoriaBtn"
                      data-id="<?= $cat['category_id'] ?>"
                      data-nombre="<?= esc($cat['category_name']) ?>">
                <i class="bi bi-pencil"></i> Editar
              </button>
              <form action="<?= base_url('admin/categorias/eliminar/' . $cat['category_id']) ?>" method="post" class="d-inline" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">
                  <button type="submit" class="btn btn-sm btn-outline-danger">
                      <i class="bi bi-trash"></i> Eliminar
                  </button>
              </form>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal para editar categoria -->
<div class="modal fade" id="modalEditarCategoria" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" action="<?= base_url('admin/categorias/actualizar') ?>">
        <div class="modal-header">
          <h5 class="modal-title">Editar Categoría</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="category_id" id="categoriaIdInput">
          <div class="mb-3">
            <label for="categoriaNombreInput" class="form-label">Nombre</label>
            <input type="text" name="category_name" id="categoriaNombreInput" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.querySelectorAll('.editarCategoriaBtn').forEach(btn => {
    btn.addEventListener('click', function () {
      document.getElementById('categoriaIdInput').value = this.dataset.id;
      document.getElementById('categoriaNombreInput').value = this.dataset.nombre;
      new bootstrap.Modal(document.getElementById('modalEditarCategoria')).show();
    });
  });
</script>

<!-- Modal Nueva Categoría -->
<div class="modal fade" id="modalNuevaCategoria" tabindex="-1" aria-labelledby="modalNuevaCategoriaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= base_url('admin/categorias/cargar') ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Nueva Categoría</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="category_name" class="form-label">Nombre</label>
            <input type="text" name="category_name" id="category_name" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Guardar</button>
        </div>
      </div>
    </form>
  </div>
</div>


<?= $this->endSection() ?>
