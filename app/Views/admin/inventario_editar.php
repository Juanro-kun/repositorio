<?= $this->extend('admin/layout_admin') ?>
<?= $this->section('contenido') ?>

<h2 class="fw-bold mb-3">Editar Producto</h2>

<form action="<?= base_url('admin/inventario/actualizar/' . $producto['product_id']) ?>" method="post" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-12 mb-4">
        <label for="image" class="form-label">Imagen del producto</label>

        <?php if (!empty($producto['image'])): ?>
            <img src="<?= base_url('uploads/' . $producto['image']) ?>" class="img-thumbnail mb-2" style="max-height: 120px;">
        <?php endif ?>

        <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    <div class="col-md-6 mb-3">
      <label for="name" class="form-label">Nombre *</label>
      <input type="text" class="form-control" name="name" value="<?= esc($producto['name']) ?>" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="price" class="form-label">Precio *</label>
      <input type="number" step="0.01" class="form-control" name="price" value="<?= esc($producto['price']) ?>" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="stock" class="form-label">Stock *</label>
      <input type="number" class="form-control" name="stock" value="<?= esc($producto['stock']) ?>" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="discount" class="form-label">Descuento (%)</label>
      <input type="number" class="form-control" name="discount" value="<?= esc($producto['discount']) ?>">
    </div>
    <div class="col-md-12 mb-3">
      <label for="description" class="form-label">Descripción</label>
      <textarea name="description" class="form-control" rows="3"><?= esc($producto['description']) ?></textarea>
    </div>
    <div class="col-md-12 mb-4">
      <label for="category_id" class="form-label">Categoría *</label>
      <select name="category_id" class="form-select" required>
        <?php foreach ($categorias as $cat): ?>
          <option value="<?= $cat['category_id'] ?>" <?= $cat['category_id'] == $producto['category_id'] ? 'selected' : '' ?>>
            <?= $cat['category_name'] ?>
          </option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="col-12 text-end">
      <button type="submit" class="btn btn-danger"><i class="bi bi-save me-1"></i> Actualizar</button>
    </div>
  </div>
</form>

<?= $this->endSection() ?>
