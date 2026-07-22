<div class="ui container">
    <div class="row">
        <div class="ui container">
            <div class="row">
                <h1 class="ui header">
                    <img class="ui large image" src="/assets/img/logotipo.png">
                    <div class="content">
                        Gestión de asistentes al evento <?=$evento['nom_evento']?>
                    </div>
                </h1>
            </div>

            <div class="row">
                <div class="sixteen wide column">
                    <table id="tbl_asistentes" class="ui very basic striped unstackable table">
                        <thead>
                            <tr>
                                <th data-priority="1">Nombre capoeira / usuario</th>
                                <th data-priority="1">Comunidad</th>
                                <th data-priority="1">Asistencia</th>
                                <th data-priority="1">Pago</th>
                                <th data-priority="1">Kit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($asistentes as $asistentes_item): ?>
                                <tr>
                                    <td>
                                        <h4 class="ui image header">
                                            <div class="content">
                                                <?= $asistentes_item['nom_capoeira'] ?>
                                                <div class="sub header"><?=$asistentes_item['nom_usuario']?></div>
                                            </div>
                                        </h4>
                                    </td>
                                    <td>
                                        <?=$asistentes_item['nom_comunidad']?>
                                    </td>
                                    <td>
                                        <form class="ui form" method="post" action="/evento_usuario/actualizar_asistencia" name="frm_asist<?=$asistentes_item['id_evento_usuario']?>">
                                            <div class="ui toggle checkbox">
                                                <input type="checkbox" name="asistencia" id="asistencia" value="1" <?= ($asistentes_item['asistencia'] == '1') ? 'checked' : '' ?> onchange="frm_asist<?=$asistentes_item['id_evento_usuario']?>.submit()">
                                                <label></label>
                                            </div>
                                            <input type="hidden" name="id_evento" id="id_evento_usuario" value="<?=$evento['id_evento']?>">
                                            <input type="hidden" name="id_evento_usuario" id="id_evento_usuario" value="<?=$asistentes_item['id_evento_usuario']?>">
                                            <input type="hidden" name="tipo_asistente" id="tipo_asistente" value="<?=$asistentes_item['tipo_asistente']?>">
                                        </form>
                                    </td>
                                    <td>
                                        <form class="ui form" method="post" action="/evento_usuario/actualizar_pago" name="frm_pago<?=$asistentes_item['id_evento_usuario']?>">
                                            <div class="ui toggle checkbox">
                                                <input type="checkbox" name="pago" id="pago" value="1" <?= ($asistentes_item['pago'] == '1') ? 'checked' : '' ?> onchange="frm_pago<?=$asistentes_item['id_evento_usuario']?>.submit()">
                                                <label></label>
                                            </div>
                                            <input type="hidden" name="id_evento" id="id_evento_usuario" value="<?=$evento['id_evento']?>">
                                            <input type="hidden" name="id_evento_usuario" id="id_evento_usuario" value="<?=$asistentes_item['id_evento_usuario']?>">
                                            <input type="hidden" name="tipo_asistente" id="tipo_asistente" value="<?=$asistentes_item['tipo_asistente']?>">
                                        </form>
                                    </td>
                                    <td>
                                        <form class="ui form" method="post" action="/evento_usuario/actualizar_kit" name="frm_kit<?=$asistentes_item['id_evento_usuario']?>">
                                            <div class="ui toggle checkbox">
                                                <input type="checkbox" name="kit" id="kit" value="1" <?= ($asistentes_item['kit'] == '1') ? 'checked' : '' ?> onchange="frm_kit<?=$asistentes_item['id_evento_usuario']?>.submit()">
                                                <label></label>
                                            </div>
                                            <input type="hidden" name="id_evento" id="id_evento_usuario" value="<?=$evento['id_evento']?>">
                                            <input type="hidden" name="id_evento_usuario" id="id_evento_usuario" value="<?=$asistentes_item['id_evento_usuario']?>">
                                            <input type="hidden" name="tipo_asistente" id="tipo_asistente" value="<?=$asistentes_item['tipo_asistente']?>">
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
    <div class="row no-print">
        <div class="ui basic segment">
            <a class="ui basic button" href="<?= site_url('evento/detalle/' . $evento['id_evento']) ?>">Volver</a>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready( function () {
    $('#tbl_asistentes').DataTable( {
        order: [ [1, 'desc'], [0, 'asc'] ],
        pageLength: -1,
        responsive: true,
        language: {
            url: '<?=base_url()?>assets/js/es-MX.json',
            lengthLabels: { 
                '-1': 'Todos'
            },
        },
        lengthMenu: [10, 50, -1],
    });
});
</script>
