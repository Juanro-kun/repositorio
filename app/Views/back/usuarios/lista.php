<h2>Lista de Usuarios</h2>
<a href="<?= base_url('usuarios/agregar') ?>">Agregar nuevo</a>
<table border="1">
    <tr>
        <th>ID</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>Acción</th>
    </tr>
    <?php foreach ($usuarios as $u): ?>
    <tr>
        <td><?= $u['id'] ?></td>
        <td><?= $u['nombre'] ?></td>
        <td><?= $u['apellido'] ?></td>
        <td><?= $u['email'] ?></td>
        <td>
            <a href="<?= base_url('usuarios/eliminar/'.$u['id']) ?>">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
