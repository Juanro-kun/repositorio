<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Invocación de Acceso</title>
  <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" />

  <style>
    body {
      background: url("<?= base_url('assets/img/fondo_login.jpg') ?>") no-repeat center center fixed;
      background-size: cover;
      font-family: 'Cinzel', serif;
      color: #f5f5f0;
    }

    .login-container {
      background: rgba(10, 10, 10, 0.85);
      padding: 2.5rem;
      border: 2px solid #7e0000;
      border-radius: 1rem;
      box-shadow: 0 0 40px rgba(126, 0, 0, 0.6);
      max-width: 450px;
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
      color: #f0f0f0;
    }

    .form-control:focus {
      border-color: #7e0000;
      box-shadow: 0 0 8px rgba(126, 0, 0, 0.5);
      background-color: #2a2a2a;
    }

    .btn-invocar {
      background-color: #7e0000;
      border: none;
      color: #f5f5f0;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-top: 1rem;
      transition: all 0.3s ease;
    }

    .btn-invocar:hover {
      background-color: #a50000;
      box-shadow: 0 0 10px rgba(126, 0, 0, 0.6);
    }

    .register-link {
      display: block;
      margin-top: 1.5rem;
      text-align: center;
      font-style: italic;
      color: #ccc;
      transition: color 0.2s ease;
    }

    .register-link:hover {
      color: #ff9999;
    }

    .scroll-frame {
      position: absolute;
      top: 20px;
      left: 20px;
      width: 80px;
      opacity: 0.08;
    }

    .symbol {
      position: absolute;
      bottom: 15px;
      right: 20px;
      width: 60px;
      opacity: 0.05;
    }
  </style>
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100 position-relative">
    <a href="<?= base_url('/') ?>" style="position: absolute; top: 20px; left: 20px; z-index: 10;">
        <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo de la tienda" style="height: 60px;">
    </a>

  <!-- Decoración temática -->
  <img src="<?= base_url('assets/img/scroll_lateral.png') ?>" alt="pergamino decorativo" class="scroll-frame">
  <img src="<?= base_url('assets/img/sello_magico.png') ?>" alt="símbolo arcano" class="symbol">


  <div class="login-container">
    
    <h2>Invocación de Acceso</h2>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    

    <form action="<?= base_url('/login/process') ?>" method="post">
      <?= csrf_field() ?>

      <div class="mb-3">
        <label for="mail" class="form-label">Correo del hechicero</label>
        <input type="email" name="mail" id="mail" class="form-control" value="<?= old('mail')?>" required />
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Palabra secreta</label>
        <input type="password" name="password" id="password" class="form-control" required />
      </div>

      <button type="submit" class="btn btn-invocar w-100">Entrar al grimorio</button>

      <a href="<?= base_url('/register') ?>" class="register-link">¿No estás registrado en la orden? Jurá el pacto aquí.</a>
    </form>
  </div>

  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
