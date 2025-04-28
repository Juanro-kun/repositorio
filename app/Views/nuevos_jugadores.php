<?= $this->extend('layout') ?>

<?= $this->section('contenido') ?>

<div class="nuevos-container">
  <div class="container text-center">

    <!-- Bienvenida -->
    <section class="mb-5">
      <h1 class="nuevos-section-title nuevos-title-decorado mb-4">
        ✨ ¡Bienvenido a <span class="text-warning">Calabozos & Dragones</span>! ✨
      </h1>
      <div class="nuevos-section-card">
        <p>
        Calabozos y Dragones, o Dungeons & Dragons (D&D), es un juego de rol en el que los jugadores crean personajes ficticios que viven aventuras en un mundo de fantasía. En D&D, no solo se lanzan dados, sino que se construyen historias, se toman decisiones, y se interactúa con otros jugadores. Si nunca has escuchado de D&D, ¡estás a punto de embarcarte en una experiencia única!
        </p>
      </div>
    </section>

    <div class="nuevos-divider"></div>

    <!-- ¿Qué es D&D? -->
    <section class="mb-5">
      <h2 class="nuevos-section-subtitle nuevos-title-decorado mb-4">
        🛡️ ¿Qué es <span class="text-warning">Dungeons & Dragons</span>?
      </h2>
      <div class="nuevos-section-card">
        <p>
          D&D es más que un juego. Es una experiencia narrativa donde cada jugador interpreta un héroe en un mundo de fantasía.
          Guiados por el "Dungeon Master", los jugadores enfrentan desafíos, exploran tierras misteriosas y forjan su propia leyenda.
        </p>
        <p>
          Solo necesitas dados, una hoja de personaje y mucha imaginación para comenzar tu travesía.
        </p>
      </div>
    </section>

    <div class="nuevos-divider"></div>

    <!-- Comienza tu aventura -->
    <section class="mb-5">
      <h2 class="nuevos-section-subtitle nuevos-title-decorado mb-4">
        🎲 ¡Comienza tu aventura!
      </h2>
      <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
        <a href="<?= base_url('home/proximamente') ?>" class="nuevos-btn-custom">📚 Player's Handbook</a>
        <a href="<?= base_url('home/proximamente') ?>" class="nuevos-btn-custom">📝 Hoja de Personaje</a>
        <a href="<?= base_url('home/comercializacion') ?>" class="nuevos-btn-custom">🛒 Productos Aventureros</a>
      </div>
    </section>

  </div>
</div>

<?= $this->endSection() ?>
