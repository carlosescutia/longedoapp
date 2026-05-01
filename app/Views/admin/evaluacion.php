<div class="ui pink segment">
    <h4 class="ui header">Próxima evaluación</h4>
    <?php
        $fmt = datefmt_create(
            'es_MX',
            IntlDateFormatter::NONE,
            IntlDateFormatter::NONE,
            null,
            IntlDateFormatter::GREGORIAN,
            'EEEE dd/MMM/yy'
        );
        $fecha = strtotime($info_evaluacion['fecha']);
    ?>

    <p>Tienes una evaluación registrada en el <strong><?= $info_evaluacion['nom_evento'] ?></strong> el próximo <strong><?= datefmt_format($fmt, $fecha) ?></strong> para el grado <strong><?= $info_evaluacion['nom_grado'] ?></strong></p>
    <h4 class="ui header">Aspectos a evaluar:</h4>
    <div class="ui yellow segment">
        <h5 class="ui header">
            <i class="music icon"></i>
            <div class="content">
                Música
            </div>
        </h5>
        <?php
        $musica_renglones = explode('.', $info_evaluacion['musica']);
        ?>
        <div class='ui bulleted list'>
            <?php foreach ($musica_renglones as $musica_renglon): ?>
                <?php if ($musica_renglon): ?>
                    <div class="item"><?= trim($musica_renglon) . '.' ?></div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    </div>
    <div class="ui brown segment">
        <h5 class="ui header">
            <i class="glasses icon"></i>
            <div class="content">
                Cultura
            </div>
        </h5>
        <?php
        $cultura_renglones = explode('.', $info_evaluacion['cultura']);
        ?>
        <div class='ui bulleted list'>
            <?php foreach ($cultura_renglones as $cultura_renglon): ?>
                <?php if ($cultura_renglon): ?>
                    <div class="item"><?= trim($cultura_renglon) . '.' ?></div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    </div>
    <div class="ui blue segment">
        <h5 class="ui header">
            <i class="running icon"></i>
            <div class="content">
                Jogo
            </div>
        </h5>
        <?php
        $jogo_renglones = explode('.', $info_evaluacion['jogo']);
        ?>
        <div class='ui bulleted list'>
            <?php foreach ($jogo_renglones as $jogo_renglon): ?>
                <?php if ($jogo_renglon): ?>
                    <div class="item"><?= trim($jogo_renglon) . '.' ?></div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    </div>
</div>
