<?= $this->extend('layout') ?>

<?= $this->section('contenido') ?>

<section class="comercial-section py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4 text-light">Comercialización</h2>
        <p class="mb-5 text-light">Descubrí cómo recibir tus tesoros épicos y las facilidades que ofrecemos a cada aventurero.</p>

        <div class="row g-4 justify-content-center">

            <?php 
            $items = [
                ['icon' => 'fa-box', 'title' => 'Tipos de Entrega', 'details' => [
                    ['icon' => 'fa-map-marker-alt', 'text' => 'Retiro en sede UNNE'],
                    ['icon' => 'fa-home', 'text' => 'Entrega a domicilio'],
                    ['icon' => 'fa-bolt', 'text' => 'Servicio exprés']
                ]],
                ['icon' => 'fa-dragon', 'title' => 'Formas de Envío', 'details' => [
                    ['icon' => 'fa-dungeon', 'text' => 'Dragón Express (VIP)'],
                    ['icon' => 'fa-truck', 'text' => 'Correo Argentino / OCA'],
                    ['icon' => 'fa-location-arrow', 'text' => 'Teletransportacion']
                ]],
                ['icon' => 'fa-coins', 'title' => 'Formas de Pago', 'details' => [
                    ['icon' => 'fa-hand-holding-usd', 'text' => 'Efectivo / Transferencia'],
                    ['icon' => 'fa-credit-card', 'text' => 'Tarjeta de crédito/débito'],
                    ['icon' => 'fa-gem', 'text' => 'Oro de Dragón'] 
                ]],
                ['icon' => 'fa-scroll', 'title' => 'Información Útil', 'details' => [
                    ['icon' => 'fa-clock', 'text' => 'Entrega: 2-5 días hábiles'],
                    ['icon' => 'fa-shield-alt', 'text' => 'Garantía por defectos'],
                    ['icon' => 'fa-headset', 'text' => 'Soporte postventa']
                ]]
            ];

            foreach($items as $item): ?>
                <div class="col-md-3">
                    <div class="glass-card p-4">
                        <i class="fas <?= $item['icon'] ?> fa-3x mb-3 text-warning"></i>
                        <h5 class="fw-bold mb-3"><?= $item['title'] ?></h5>
                        <ul class="list-unstyled">
                            <?php foreach($item['details'] as $detail): ?>
                                <li><i class="fas <?= $detail['icon'] ?> me-2"></i><?= $detail['text'] ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>



<?= $this->endSection() ?>
