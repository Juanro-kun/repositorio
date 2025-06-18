<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<h2 class="fw-bold mb-3">Añadir Nuevo Producto</h2>

<form action="<?= base_url('admin/inventario/cargar') ?>" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-12 mb-4">
      <label for="image" class="form-label">Imagen del producto (opcional)</label>
      <input type="file" name="image" id="image" class="form-control" accept="image/*">
    </div>  

    <div class="col-md-6 mb-3">
      <label for="name" class="form-label">Nombre del Producto *</label>
      <input type="text" class="form-control" name="name" id="name" required>
    </div>

    <div class="col-md-6 mb-3">
      <label for="price" class="form-label">Precio *</label>
      <input type="number" step="0.01" class="form-control" name="price" id="price" required>
    </div>

    <div class="col-md-6 mb-3">
      <label for="stock" class="form-label">Stock *</label>
      <input type="number" class="form-control" name="stock" id="stock" required>
    </div>

    <div class="col-md-6 mb-3">
      <label for="discount" class="form-label">Descuento (%)</label>
      <input type="number" class="form-control" name="discount" id="discount" value="0">
    </div>

    <div class="col-md-12 mb-3">
      <label for="description" class="form-label">Descripción</label>
      <textarea name="description" class="form-control" rows="3"></textarea>
    </div>

    <!-- Nuevos campos -->
    <div class="col-md-6 mb-3">
      <label for="brand" class="form-label">Marca</label>
      <input type="text" class="form-control" name="brand" id="brand">
    </div>

    <div class="col-md-6 mb-3">
      <label for="age" class="form-label">Edad sugerida</label>
      <input type="text" class="form-control" name="age" id="age">
    </div>

    <div class="col-md-6 mb-3">
      <label for="players" class="form-label">Cantidad de jugadores</label>
      <input type="text" class="form-control" name="players" id="players">
    </div>

    <div class="col-md-6 mb-3">
      <label for="format" class="form-label">Formato</label>
      <input type="text" class="form-control" name="format" id="format">
    </div>

    <div class="col-md-12 mb-4">
      <label for="category_id" class="form-label">Categoría *</label>
      <select name="category_id" id="category_id" class="form-select" required>
        <option value="">Seleccionar</option>
        <?php foreach ($categorias as $cat): ?>
          <option value="<?= $cat['category_id'] ?>"><?= $cat['category_name'] ?></option>
        <?php endforeach ?>
      </select>
    </div>

    <div class="col-12 text-end">
      <button type="submit" class="btn btn-danger">
        <i class="bi bi-save me-1"></i> Guardar Producto
      </button>
    </div>
  </div>
</form>

<?= $this->endSection() ?>
