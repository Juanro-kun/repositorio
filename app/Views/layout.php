<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= esc($title ?? 'Calabozos & Dragones') ?></title>

  <!-- Bootstrap CSS Local -->
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

  <!-- Estilo Personalizado -->
  <link rel="stylesheet" href="<?= base_url('assets/css/estilo.css') ?>">

  <!-- Font Awesome Local -->
  <link rel="stylesheet" href="assets/css/all.min.css">
</head>
<body>
  <?= view('navbar') ?>

  <?= $this->renderSection('contenido') ?>

  <?= view('footer') ?>

  <!-- Bootstrap JS Local -->
  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>


