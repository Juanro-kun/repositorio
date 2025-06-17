<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Juramento de Ingreso</title>
  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" />

  <style>
    body {
      background: url("<?= base_url('assets/img/login_fondo.png') ?>") no-repeat center center fixed;
      background-size: cover;
      font-family: 'Cinzel', serif;
      color: #f5f5f0;
    }

    .register-ritual {
      background: rgba(20, 20, 20, 0.85);
      padding: 2.5rem;
      border: 2px solid #7e0000;
      border-radius: 1rem;
      box-shadow: 0 0 40px rgba(126, 0, 0, 0.6);
      max-width: 600px;
      width: 100%;
      margin: auto;
    }

    h2 {
      text-align: center;
      font-size: 2rem;
      margin-bottom: 1.5rem;
      color: #ffdddd;
      text-shadow: 1px 1px 3px black;
    }

    .form-label {
      font-weight: bold;
      color: #ffcccc;
      text-shadow: 0 0 4px black;
    }

    .form-control {
      background-color: #1e1e1e;
      border: 1px solid #555;
            color: #ffffff;
    }

    .form-control::placeholder {
      color: #e8e8e8;
    }

    .form-control:focus {
      border-color: #7e0000;
      box-shadow: 0 0 8px rgba(126, 0, 0, 0.5);
      background-color: #2a2a2a;
    }

    .btn-pacto {
      background-color: #7e0000;
      border: none;
      color: #f5f5f0;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-top: 1rem;
      transition: all 0.3s ease;
    }

    .btn-pacto:hover {
      background-color: #a30000;
      box-shadow: 0 0 10px rgba(126, 0, 0, 0.6);
    }

    .login-link {
      display: block;
      margin-top: 1.5rem;
      text-align: center;
      font-style: italic;
      color: #ccc;
      transition: color 0.2s ease;
    }

    .login-link:hover {
      color: #ff9999;
    }
  </style>
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100">
    <a href="<?= base_url('/') ?>" style="position: absolute; top: 20px; left: 20px; z-index: 10;">
        <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo de la tienda" style="height: 60px;">
    </a>

  <div class="register-ritual">
    <h2>Juramento de Ingreso</h2>

    <?php if (session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
    <?php endif; ?>

    <form action="<?= base_url('/register/process') ?>" method="post">
      <?= csrf_field() ?>

      <div class="mb-3">
        <label for="username" class="form-label">Nombre de aventurero</label>
        <input type="text" name="username" id="username" class="form-control" value="<?= old('username')?>" required />
      </div>

      <div class="mb-3">
        <label for="mail" class="form-label">Correo arcano</label>
        <input type="email" name="mail" id="mail" class="form-control" value="<?= old('mail')?>" required />
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Contraseña mágica</label>
        <input type="password" name="password" id="password" class="form-control" required />
      </div>

      <div class="mb-3">
        <label for="password_confirm" class="form-label">Repetir conjuro</label>
        <input type="password" name="password_confirm" id="password_confirm" class="form-control" required />
      </div>

      <button type="submit" class="btn btn-pacto w-100">Jurar el pacto</button>

      <a href="<?= base_url('/login') ?>" class="login-link">¿Ya juraste? Ingresá al grimorio</a>
    </form>
  </div>

  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> prueba-catalogo
