<div class="ui container">
    <div class="row">
        <div class="ui container">
            <div class="row">
                <h1 class="ui header">
                    <img class="ui large image" src="/assets/img/logotipo.png">
                    <div class="content">
                        Evaluadores del <?=$evento['nom_evento']?>
                    </div>
                </h1>
            </div>
            <div class="row no-print">
                <div class="ui right aligned basic segment">
                </div>
            </div>

            <div class="ui hidden divider"></div>

            <div class="row">
                <div class="ui grid">
                    <div class="twelve wide column">
                        <table class="ui very basic striped unstackable big table">
                            <thead>
                                <tr>
                                    <th data-priority="1">Grado</th>
                                    <th data-priority="1">Nombre</th>
                                    <th data-priority="1">
                                        <a class="circular ui right floated primary mini icon button" id="btn_add">
                                            <i class="icon add"></i>
                                        </a>
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($delegados as $delegados_item): ?>
                                    <tr>
                                        <td>
                                            <?= $delegados_item['nom_grado'] ?>
                                        </td>
                                        <td>
                                            <?= $delegados_item['nom_capoeira'] ?> (<?= $delegados_item['nom_usuario'] ?>)
                                        </td>
                                        <td>
                                            <form class="ui form" method="post" action="/delegado/eliminar" id="frm_elim_delegado<?=$delegados_item['id_delegado']?>">
                                                <input type="hidden" name="id_delegado" id="id_delegado" value="<?= $delegados_item['id_delegado'] ?>" >
                                                <input type="hidden" name="url_actual" id="url_actual" value="<?= site_url('evaluacion/delegar/') . $evaluacion['id_evaluacion'] ?>">
                                                <?php
                                                    $mensaje = 'Se eliminará la delegación de evaluación.<br>¿Está seguro?' ;
                                                    $forma = '#frm_elim_delegado' . $delegados_item['id_delegado'] ;
                                                ?>
                                                <a href="#" onclick="confirm_action('<?=$mensaje?>','<?=$forma?>')" ><span class="ui red text"><i class="icon times circle outline"></span></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="ui basic segment no-print">
            <a class="ui basic button" href="<?= site_url('evento/detalle/' . $evento['id_evento']) ?>">Volver</a>
        </div>
    </div>
</div>

<div class="ui tiny modal">
    <i class="close icon"></i>
    <div class="header">
        Nueva delegación de evaluador
    </div>
    <div class="content">
        <form class="ui form" method="post" action="/delegado/guardar" id="frm_nuevo">
            <div class="field">
                <label></label>
                <div class="ui fluid search selection dropdown">
                    <input type="hidden" name="id_grado" id="id_grado">
                    <i class="dropdown icon"></i>
                    <div class="default text">Grado</div>
                    <div class="menu">
                        <?php foreach ($grados as $grados_item) { ?>
                            <div class="item" data-value="<?=$grados_item['id_grado'] ?>"><?=$grados_item['nom_grado'] ?></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="field">
                <label></label>
                <div class="ui fluid search selection dropdown">
                    <input type="hidden" name="id_evaluador" id="id_evaluador">
                    <i class="dropdown icon"></i>
                    <div class="default text">Evaluador</div>
                    <div class="menu">
                        <?php foreach ($evaluadores as $evaluadores_item) { ?>
                            <div class="item" data-value="<?=$evaluadores_item['id_usuario'] ?>"><?=$evaluadores_item['nom_evaluador'] ?> (<?=$evaluadores_item['nom_usuario'] ?>)</div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id_evaluacion" id="id_evaluacion" value="<?= $evaluacion['id_evaluacion'] ?>">
            <input type="hidden" name="url_actual" id="url_actual" value="<?= site_url('evaluacion/delegar/') . $evaluacion['id_evaluacion'] ?>">
        </form>
    </div>
    <div class="actions">
        <button class="ui black deny button">
            Cancelar
        </button>
        <button class="ui positive button" onclick="frm_nuevo.submit()">
            Agregar
        </button>
    </div>
</div>

<script>
$('#btn_add').click( function() {
    $('.ui.modal')
        .modal('show')
    ;
});
</script>
