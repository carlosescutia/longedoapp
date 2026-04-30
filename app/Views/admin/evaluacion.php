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
    <h3 class="ui header">Aspectos a evaluar:</h3>
    <div class="ui yellow segment">
        <h4 class="ui header">
            <i class="music icon"></i>
            <div class="content">
                Música
            </div>
        </h4>
        <p><?= $info_evaluacion['musica'] ?></p>
    </div>
    <div class="ui brown segment">
        <h4 class="ui header">
            <i class="glasses icon"></i>
            <div class="content">
                Cultura
            </div>
        </h4>
        <p><?= $info_evaluacion['cultura'] ?></p>
    </div>
    <div class="ui blue segment">
        <h4 class="ui header">
            <i class="running icon"></i>
            <div class="content">
                Jogo
            </div>
        </h4>
        <p><?= $info_evaluacion['jogo'] ?></p>
    </div>
</div>
