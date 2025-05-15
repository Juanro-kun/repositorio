<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white">📋 Lista de Usuarios</h2>
        <a href="<?= base_url('usuarios/agregar') ?>" class="btn btn-success">➕ Agregar nuevo</a>
    </div>

    <table class="table table-dark table-bordered table-hover shadow">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>👤 Nombre</th>
                <th>🧾 Apellido</th>
                <th>✉️ Email</th>
                <th>⚙️ Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $u): ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['nombre'] ?></td>
                <td><?= $u['apellido'] ?></td>
                <td><?= $u['email'] ?></td>
                <td>
                    <a href="<?= base_url('usuarios/eliminar/'.$u['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar usuario?')">🗑️ Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
