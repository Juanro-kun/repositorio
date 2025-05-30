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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="<?= base_url('assets/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
</head>

<!-- Aseguramos altura y estructura flexbox -->
<body style="min-height: 100vh; display: flex; flex-direction: column;">

  <?= view('navbar') ?>

  <main style="flex: 1;">
    <?= $this->renderSection('contenido') ?>
  </main>

  <?= $this->include('footer') ?>

  <!-- Bootstrap JS Local -->
  <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>


