<div class="ui container">
    <div class="ui stackable centered grid">
        <div class="row">
            <div class="eight wide column">
                <div class="ui grid">
                    <div class="row">
                        <div class="eight wide column">
                            <h1 class="ui header">Nueva evaluación</h1>
                        </div>
                        <div class="eight wide right aligned column">
                            <button class="ui primary button" type="submit" form="frm_evaluacion">Guardar</button>
                        </div>
                    </div>
                </div>

                <div class="ui green segment">
                    <div class="ui centered grid">
                        <div class="row">
                            <div class="twelve wide column">
                                <form class="ui form" method="post" action="/evaluacion/guardar" id="frm_evaluacion">
                                    <div class="field">
                                        <label>Evaluador</label>
                                        <div class="ui selection dropdown">
                                            <input type="hidden" name="id_evaluador">
                                            <i class="dropdown icon"></i>
                                            <div class="default text">Evaluador</div>
                                            <div class="menu">
                                                <?php foreach ($evaluadores as $evaluadores_item) { ?>
                                                    <div class="item" data-value="<?=$evaluadores_item['id_usuario'] ?>"><?=$evaluadores_item['nom_usuario'] ?></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fields">
                                        <div class="eight wide field">
                                            <label>Edad</label>
                                            <div class="ui selection dropdown">
                                                <input type="hidden" name="edad" id="edad">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">Edad</div>
                                                <div class="menu">
                                                    <div class="item" data-value="niño">Niño</div>
                                                    <div class="item" data-value="adulto">Adulto</div>
                                                    <div class="item" data-value="todos">Todos</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="eight wide field">
                                            <label>Fecha</label>
                                            <input type="date" name="fecha" id="fecha">
                                        </div>
                                    </div>

                                    <input type="hidden" name="id_evento" id="id_evento" value="<?= $id_evento ?>">
                                    <input type="hidden" name="status" id="status" value="cerrado">

                                    <div class="ui error message"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="eight wide column">
                <div class="row">
                    <div class="eight wide column">
                        <a class="ui basic button" href="<?= site_url('evento/detalle/') ?><?= $id_evento ?>">Volver</a>
                    </div>
                </div>
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
