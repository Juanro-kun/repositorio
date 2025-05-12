<h2>Agregar Usuario</h2>
<form method="post" action="<?= base_url('usuarios/guardar') ?>">
    <label>Nombre:</label><br>
    <input type="text" name="nombre"><br>
    <label>Apellido:</label><br>
    <input type="text" name="apellido"><br>
    <label>Email:</label><br>
    <input type="email" name="email"><br>
    <label>Usuario:</label><br>
    <input type="text" name="usuario"><br>
    <label>Contraseña:</label><br>
    <input type="password" name="pass"><br><br>
    <button type="submit">Guardar</button>
    <label>Perfil:</label><br>
<select name="perfil_id">
    <option value="1">Administrador</option>
    <option value="2">Cliente</option>
</select><br><br>

</form>
