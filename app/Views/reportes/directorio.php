<div class="ui container">
    <div class="row">
        <div class="ui container">
            <div class="row">
                <h1 class="ui header">
                    <img class="ui large image" src="/assets/img/logotipo.png">
                    <div class="content">
                        Directorio <?=$comunidad['nom_comunidad']?>
                    </div>
                </h1>
            </div>
            <div class="row no-print">
                <div class="ui right aligned basic segment">
                    <a class="ui mini button" href="<?= site_url('reportes/directorio/csv') ?>">Exportar</a>
                    <a class="ui mini button" href="javascript:window.print()">Generar pdf</a>
                </div>
            </div>

            <div class="row">
                <div class="sixteen wide column">
                    <table id="tbl_alumnos" class="ui very basic striped unstackable table">
                        <thead>
                            <tr>
                                <th data-priority="1">Nombre capoeira / usuario</th>
                                <th data-priority="1">Grado</th>
                                <th data-priority="1">Sexo / edad</th>
                                <th data-priority="1">Playera (corte / talla)</th>
                                <th data-priority="1">WhatsApp / correo</th>
                                <th data-priority="1">Emergencia</th>
                                <th data-priority="1">Responsable</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($alumnos as $alumnos_item): ?>
                                <tr>
                                    <td>
                                        <h4 class="ui header">
                                            <?php
                                                $nombre_archivo = $alumnos_item['foto'];
                                                $up_dir = 'imgs/perfil/';
                                                $nombre_archivo_fs = $up_dir . $nombre_archivo;
                                                $nombre_archivo_url = base_url($up_dir . $nombre_archivo);
                                            ?>
                                            <?php if ( file_exists($nombre_archivo_fs) and $nombre_archivo_fs !== $up_dir ): ?>
                                                <img class="ui medium circular image open_image" src="<?= $nombre_archivo_url ?>">
                                            <?php endif ?>
                                            <div class="content">
                                                <?= $alumnos_item['nom_capoeira'] ?>
                                                <div class="sub header"><?= substr($alumnos_item['nom_usuario'], 0, 15) ?></div>
                                            </div>
                                        </h4>
                                    </td>
                                    <td>
                                        <?=$alumnos_item['nom_grado']?>
                                    </td>
                                    <td>
                                        <h4 class="ui header">
                                            <div class="content">
                                                <div class="sub header"><?=$alumnos_item['sexo_diverso']?></div>
                                                <div class="sub header"><?=$alumnos_item['edad']?></div>
                                            </div>
                                        </h4>
                                    </td>
                                    <td>
                                        <h4 class="ui header">
                                            <div class="content">
                                                <div class="sub header"><?=$alumnos_item['sexo']?></div>
                                                <div class="sub header"><?=$alumnos_item['nom_talla']?></div>
                                            </div>
                                        </h4>
                                    </td>
                                    <td>
                                        <h4 class="ui header">
                                            <div class="content">
                                                <div class="sub header"><?=$alumnos_item['whatsapp_usuario']?></div>
                                                <div class="sub header"><?=$alumnos_item['correo_usuario']?></div>
                                            </div>
                                        </h4>
                                    </td>
                                    <td>
                                        <h4 class="ui header">
                                            <div class="content">
                                                <div class="sub header"><?=$alumnos_item['contacto_emergencia']?></div>
                                                <div class="sub header"><?=$alumnos_item['whatsapp_emergencia']?></div>
                                            </div>
                                        </h4>
                                    </td>
                                    <td>
                                        <h4 class="ui header">
                                            <div class="content">
                                                <div class="sub header"><?=$alumnos_item['contacto_responsable']?></div>
                                                <div class="sub header"><?=$alumnos_item['whatsapp_responsable']?></div>
                                            </div>
                                        </h4>
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
            <a class="ui basic button" href="<?= site_url() ?>">Volver</a>
        </div>
    </div>
</div>

<div class="ui mini modal">
    <i class="close icon"></i>
    <div class="image content">
        <div class="ui medium image">
            <img id="foto" src="">
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready( function () {
    $('#tbl_alumnos').DataTable( {
        order: [ [0, 'asc'] ],
        responsive: true,
        language: {
            url: '<?=base_url()?>assets/js/es-MX.json',
        },
    });
});

    $('.open_image').click( function() {
        foto = $(this).attr('src');
        $('#foto').attr('src', foto);
        $('.ui.modal').modal('show');
    });
</script>
