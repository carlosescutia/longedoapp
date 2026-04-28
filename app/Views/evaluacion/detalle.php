<div class="ui container">
    <div class="ui stackable grid">
        <div class="row">
            <div class="sixteen wide column">

                <div class="row">
                    <div class="ui grid">
                        <div class="row">
                            <div class="eight wide column">
                                <h1 class="ui header">Evaluación</h1>
                            </div>
                            <div class="eight wide right aligned column">
                                <button class="ui right floated primary button" type="submit" form="frm_evaluacion">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ui hidden divider"></div>

                <div class="row">
                    <form class="ui form" method="post" action="/evaluacion/guardar" id="frm_evaluacion">
                        <div class="fields">
                            <div class="four wide field">
                                <label>Evaluador</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="id_evaluador" value="<?= $evaluacion['id_evaluador'] ?>">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Evaluador</div>
                                    <div class="menu">
                                        <?php foreach ($evaluadores as $evaluadores_item) { ?>
                                            <div class="item" data-value="<?=$evaluadores_item['id_usuario'] ?>"><?=$evaluadores_item['nom_evaluador'] ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="four wide field">
                                <label>Edad</label>
                                <div class="ui selection read-only dropdown">
                                    <input type="hidden" name="edad" id="edad" value="<?= $evaluacion['edad'] ?>">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Edad</div>
                                    <div class="menu">
                                        <div class="item" data-value="niño">Niño</div>
                                        <div class="item" data-value="adulto">Adulto</div>
                                        <div class="item" data-value="todos">Todos</div>
                                    </div>
                                </div>
                            </div>
                            <div class="three wide field">
                                <label>Fecha</label>
                                <input type="date" name="fecha" id="fecha" value="<?= $evaluacion['fecha'] ?>">
                            </div>
                            <div class="three wide field">
                                <label>Status</label>
                                <div class="ui selection dropdown">
                                    <input type="hidden" name="status" id="status" value="<?= $evaluacion['status'] ?>">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Status</div>
                                    <div class="menu">
                                        <div class="item" data-value="abierto">Abierto</div>
                                        <div class="item" data-value="proceso">En proceso</div>
                                        <div class="item" data-value="cerrado">Cerrado</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id_evaluacion" id="id_evaluacion" value="<?= $evaluacion['id_evaluacion'] ?>">
                        <input type="hidden" name="id_evento" id="id_evento" value="<?= $evaluacion['id_evento'] ?>">

                        <div class="ui error message"></div>
                    </form>
                </div>

                <div class="row">
                    <table id="tbl_evaluados" class="ui very basic striped unstackable table">
                        <thead>
                            <tr>
                                <th data-priority="1">Nombre capoeira / usuario</th>
                                <th data-priority="1">Grado a evaluar</th>
                                <th data-priority="1">Música</th>
                                <th data-priority="1">Cultura</th>
                                <th data-priority="1">Jogo</th>
                                <th data-priority="1">Promovido</th>
                                <th data-priority="1">Observaciones</th>
                                <th data-priority="1">Retroalimentación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($evaluados as $evaluados_item): ?>
                                <tr>
                                    <td>
                                        <h4 class="ui image header">
                                            <div class="content">
                                                <?= $evaluados_item['nom_capoeira'] ?>
                                                <div class="sub header"><?=$evaluados_item['nom_usuario']?></div>
                                            </div>
                                        </h4>
                                    </td>
                                    <td>
                                        <?= $evaluados_item['nom_grado'] ?>
                                    </td>
                                    <td>
                                        <?=$evaluados_item['musica']?>
                                    </td>
                                    <td>
                                        <?=$evaluados_item['cultura']?>
                                    </td>
                                    <td>
                                        <?=$evaluados_item['jogo']?>
                                    </td>
                                    <td class="center aligned">
                                        <?=$evaluados_item['promovido'] ? 'Si' : '' ?>
                                    </td>
                                    <td>
                                        <?=$evaluados_item['observacion_evaluador']?>
                                    </td>
                                    <td>
                                        <?=$evaluados_item['observacion_alumno']?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="ui basic segment">
                <a class="ui basic button" href="<?= site_url('evento/detalle/') ?><?= $evaluacion['id_evento'] ?>">Volver</a>
            </div>
        </div>
    </div>

</div>

<script>
    $('.ui.form')
        .form({
            fields: {
                id_evaluador: {
                    identifier: 'id_evaluador',
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Evaluador no puede estar vacio'
                        }
                    ]
                },
                edad: {
                    identifier: 'edad',
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Edad no puede estar vacio'
                        }
                    ]
                },
                fecha: {
                    identifier: 'fecha',
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Fecha no puede estar vacio'
                        }
                    ]
                },
            }
        })
    ;
</script>

