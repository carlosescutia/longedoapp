<div class="ui segment">
    <h4 class="ui header">Administración del evento</h4>
    <div class="ui hidden divider"></div>
    <div class="ui list">
        <?php if ($error): ?>
            <p><span class="ui red text"><?= $error ?></span></p>
        <?php endif ?>
        <div class="item"><a href="<?= site_url('evento/editar/')?><?=$evento['id_evento']?>">Editar información</a></div>
        <div class="item"><a href="<?= site_url('reportes/asistentes_evento/')?><?=$evento['id_evento']?>">Lista de asistentes</a></div>
        <div class="item"><a href="<?= site_url('reportes/playeras_evento/')?><?=$evento['id_evento']?>">Reporte de playeras</a></div>
        <table class="ui celled unstackable tiny table">
            <thead>
                <tr>
                    <th colspan="4">
                        <?php if (has_permission_and($permisos_requeridos, $permisos_usuario)): ?>
                            <form class="ui form" method="post" action="/evaluacion/nuevo">
                                <input type="hidden" name="id_evento" id="id_evento" value="<?= $evento['id_evento'] ?>">
                                <button class="circular ui right floated primary mini icon button"><i class="icon add"></i></button>
                            </form>
                        <?php endif ?>
                        Evaluaciones
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($evaluaciones as $evaluaciones_item): ?>
                    <tr>
                    <td><a href="<?=site_url('evaluacion/detalle/')?><?=$evaluaciones_item['id_evaluacion']?>"><?= $evaluaciones_item['nom_evaluador'] ?></a></td>
                        <td><?= $evaluaciones_item['edad'] ?></td>
                        <td><?= $evaluaciones_item['status'] ?></td>
                        <td class="center aligned">
                            <?php
                                $item_eliminar = '¡Se eliminará la evaluación!<br>¿Está seguro?' ;
                                $action = base_url("evaluacion/eliminar/") . $evaluaciones_item['id_evaluacion'];
                            ?>
                            <a href="#" onclick="confirm_delete('<?=$item_eliminar?>','<?=$action?>')" >
                                <span class="ui red text"><i class="icon times circle outline"></span></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <div class="ui segment">
            <h5 class="ui header">Asistentes externos</h5>

            <form class="ui tiny form" method="post" action="/evento/actualizar_registrar_externos" name="frm_externos">
                <div class="ui toggle checkbox">
                    <input type="checkbox" name="registrar_externos" id="registrar_externos" value="1" <?= ($evento['registrar_externos'] == '1') ? 'checked' : '' ?> onchange="this.form.submit()">
                    <label>Permitir registro</label>
                </div>
                <input type="hidden" name="id_evento" id="id_evento" value="<?=$evento['id_evento']?>">
            </form>

            <p></p>

            <div class="ui form">
                <a href="<?= site_url('registro/') ?><?= $evento['token'] ?>" target="_blank">Enlace para registro</a>
                <div class="ui action input">
                    <input type="text" name="url_registro" id="url_registro" value="<?= site_url('registro/') ?><?= $evento['token'] ?>" >
                    <div class="ui icon buttons">
                        <a class="ui icon button" id="btn_clipboard" title="Copiar al portapapeles"> <i class="clipboard outline icon"></i> </a> 
                        <a class="ui icon button" id="btn_qr" title="Mostrar código QR"><i class="qrcode icon"></i></a>
                    </div>
                </div>
            </div>

            <p></p>

            <form class="ui tiny form" method="post" action="/evento/actualizar_codigo">
                <div class="field">
                    <label>Código de autorización</label>
                    <div class="ui action input">
                        <input type="text" name="codigo" id="codigo" value="<?= $evento['codigo'] ?>">
                        <button class="ui icon button"><i class="check icon"></i> </button> 
                    </div>
                    <input type="hidden" name="id_evento" id="id_evento" value="<?=$evento['id_evento']?>">
                </div>
            </form>

            <p></p>

            <div class="item"><a href="<?= site_url('externo/aprobar/')?><?=$evento['id_evento']?>">Aprobar asistentes externos</a></div>
        </div>

        <div class="ui section divider"></div>

        <div class="item">
            <?php
                $item_eliminar = '¡Se eliminará el evento ' . $evento['nom_evento'] . ' y sus evaluaciones!<br>¿Está seguro de eliminarlo?' ;
                $action = base_url("evento/eliminar/") . $evento['id_evento'];
            ?>
            <a href="#" onclick="confirm_delete('<?=$item_eliminar?>','<?=$action?>')">
                <span class="ui red text">Eliminar evento</span>
            </a>
        </div>
    </div>
</div>

<div class="ui mini modal">
    <i class="close icon"></i>
    <div class="image content">
        <div class="ui large image">
            <img class="ui bordered medium image" src="data:image/png;base64, <?= base64_encode($qr) ?>">
        </div>
    </div>
</div>

<script>
    $('#btn_clipboard').click( function() {
        $('#url_registro').select();
        document.execCommand('copy');
        $('#url_registro').blur();

        $.toast({
            message: 'Se copió el enlace para registro.',
            class: 'inverted teal',
        });
    });

    $('#btn_qr').click( function() {
        $('.ui.modal').modal('show');
    });
</script>
