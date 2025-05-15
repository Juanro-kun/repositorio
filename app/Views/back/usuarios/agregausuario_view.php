<?= $this->extend('layout') ?>
<?= $this->section('contenido') ?>

<div class="container py-5">
    <div class="card shadow bg-dark text-white">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">➕ Agregar Usuario</h4>
            <a href="<?= base_url('usuarios') ?>" class="btn btn-secondary btn-sm">← Volver</a>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('usuarios/guardar') ?>">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="usuario" class="form-label">Nombre de Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="pass" class="form-label">Contraseña</label>
                    <input type="password" name="pass" id="pass" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label for="perfil_id" class="form-label">Perfil</label>
                    <select name="perfil_id" id="perfil_id" class="form-select" required>
                        <option value="1">Administrador</option>
                        <option value="2">Cliente</option>
                    </select>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">✅ Guardar Usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
