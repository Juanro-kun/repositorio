<?= $this->extend('layout') ?>

<?= $this->section('contenido') ?>

<div class="nuevos-container py-5">
  <div class="container">

    <section class="nuevos-section mb-5 text-center">
      <h1 class="nuevos-section-title nuevos-title-decorado mb-5">
        ✨ ¡Bienvenido a <span class="nuevos-highlight">Calabozos & Dragones</span>! ✨
      </h1>
      <div class="nuevos-section-card nuevos-section-content p-4">
        <p class="nuevos-section-text">
          Calabozos y Dragones, o Dungeons & Dragons (D&D), es un juego de rol en el que los jugadores crean personajes ficticios que viven aventuras en un mundo de fantasía. En D&D, no solo se lanzan dados, sino que se construyen historias, se toman decisiones, y se interactúa con otros jugadores. Si nunca has escuchado de D&D, ¡estás a punto de embarcarte en una experiencia única!
        </p>
      </div>
    </section>

    <div class="nuevos-divider"></div>

    <section class="nuevos-section mb-5">
      <h2 class="nuevos-section-subtitle nuevos-title-decorado mb-5 text-center">
        🛡️ ¿Qué es <span class="nuevos-highlight">Dungeons & Dragons</span>?
      </h2>
      <div class="nuevos-section-card nuevos-section-content p-4">
        <p class="nuevos-section-text">
          En D&D, cada jugador crea un personaje que puede ser un valiente guerrero, un sabio mago, o un astuto ladrón, entre muchas otras opciones. Los jugadores viven sus aventuras en un mundo imaginario, controlado por un "Dungeon Master" (DM), quien describe lo que está sucediendo en el mundo y guía a los jugadores a través de sus misiones. El DM también es el encargado de interpretar a todos los personajes no jugables y gestionar las situaciones complejas que los jugadores puedan enfrentar.
        </p>
        <p class="nuevos-section-text">
          A lo largo de las aventuras, los jugadores interactúan entre ellos, resuelven problemas, luchan contra monstruos y se embarcan en misiones épicas. Las reglas del juego son simples, pero permiten una gran flexibilidad, lo que hace que cada partida sea única. Además, D&D no es solo un juego de estrategia y acción, sino también una forma de contar historias donde la creatividad es clave.
        </p>
        <p class="nuevos-section-text">
          Para comenzar, todo lo que necesitas es una hoja de personaje, dados, y un grupo de amigos con los que compartir este viaje. ¿Estás listo para crear tu propio héroe y ser parte de una leyenda?
        </p>
      </div>
    </section>

    <div class="nuevos-divider"></div>

    <section class="nuevos-section mb-5 text-center">
      <h2 class="nuevos-section-subtitle nuevos-title-decorado mb-5">
        🎲 ¡Comienza tu aventura!
      </h2>
      <div class="nuevos-buttons d-flex flex-column flex-md-row justify-content-center align-items-center gap-4">
        <a href="<?= base_url('home/proximamente') ?>" class="btn nuevos-btn-custom">
          📚 Descargar Player's Handbook
        </a>
        <a href="<?= base_url('home/proximamente') ?>" class="btn nuevos-btn-custom">
          📝 Descargar Hoja de Personaje
        </a>
        <a href="<?= base_url('home/proximamente') ?>" class="btn nuevos-btn-custom">
          🛒 Ver Productos para Aventureros
        </a>
      </div>
    </section>

  </div>
</div>

<?= $this->endSection() ?>
