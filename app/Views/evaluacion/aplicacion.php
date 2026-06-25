<div class="ui container">
    <div class="ui stackable grid">
        <div class="row">
            <div class="sixteen wide column">

                <div class="row">
                    <div class="ui grid">
                        <div class="row">
                            <div class="eight wide column">
                                <h1 class="ui header">Aplicación de Evaluación</h1>
                            </div>
                            <div class="eight wide right aligned column">
                                <form class="ui form" method="post" action="/evaluacion/actualizar_status" id="frm_evaluacion">
                                    <input type="hidden" name="id_evaluacion" value="<?= $evaluacion['id_evaluacion'] ?>" >
                                    <input type="hidden" name="status" value="cerrado">
                                    <?php
                                        $mensaje = '¿Está seguro de finalizar la evaluación?<br>Ya no se podrá modificar' ;
                                        $forma = '#frm_evaluacion';
                                    ?>
                                    <a class="field ui right floated orange button" href="#" onclick="confirm_action('<?=$mensaje?>','<?=$forma?>')" >Finalizar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if ($error): ?>
                    <div class="ui negative mini message transition">
                        <i class="close icon"></i>
                        <div class="header">
                            Error
                        </div>
                        <p><?= $error?></p>
                    </div>
                <?php endif ?>

                <div class="ui hidden divider"></div>

                <div class="row">
                    <div class="ui grid">
                        <div class="four wide column">
                            <div class="ui header">
                                <div class="content">
                                    <div class="sub header">Evaluador</div>
                                    <?=$evaluacion['nom_evaluador']?>
                                </div>
                            </div>
                        </div>
                        <div class="four wide column">
                            <div class="ui header">
                                <div class="content">
                                    <div class="sub header">Tipo de evaluación</div>
                                    <?= ucfirst($evaluacion['edad']) ?>
                                </div>
                            </div>
                        </div>
                        <div class="three wide column">
                            <div class="ui header">
                                <div class="content">
                                    <div class="sub header">Fecha</div>
                                    <?php
                                        $fmt = datefmt_create(
                                            'es_MX',
                                            IntlDateFormatter::NONE,
                                            IntlDateFormatter::NONE,
                                            null,
                                            IntlDateFormatter::GREGORIAN,
                                            'EEEE dd/MMM/yy'
                                        );
                                        $fecha = strtotime($evaluacion['fecha']);
                                    ?>
                                    <?= ucfirst(datefmt_format($fmt, $fecha)) ?>
                                </div>
                            </div>
                        </div>
                        <div class="three wide column">
                            <div class="ui header">
                                <div class="content">
                                    <div class="sub header">Status</div>
                                    <?= ucfirst($evaluacion['status']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ui hidden divider"></div>

                <form class="ui form" method="post" action="/evaluacion/actualizar_items">
                    <button class="field ui right floated primary button">Guardar</button>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($evaluados as $evaluados_item): ?>
                                <tr>
                                    <td>
                                        <h4 class="ui header">
                                            <?php
                                                $nombre_archivo = $evaluados_item['foto'];
                                                $up_dir = 'imgs/perfil/';
                                                $nombre_archivo_fs = $up_dir . $nombre_archivo;
                                                $nombre_archivo_url = base_url($up_dir . $nombre_archivo);
                                            ?>
                                            <?php if ( file_exists($nombre_archivo_fs) and $nombre_archivo_fs !== $up_dir ): ?>
                                                <img class="ui medium circular image open_image" src="<?= $nombre_archivo_url ?>">
                                            <?php endif ?>
                                            <div class="content">
                                                <?= $evaluados_item['nom_capoeira'] ?>
                                                <div class="sub header"><?= substr($evaluados_item['nom_usuario'], 0, 14) ?></div>
                                                <div class="sub header"><?= substr($evaluados_item['nom_comunidad'], 0, 14) ?></div>
                                            </div>
                                        </h4>
                                    </td>
                                    <td>
                                        <?= $evaluados_item['nom_grado'] ?>
                                        <button class="ui tertiary icon button" id="btn_info" onclick="$('.info_<?=$evaluados_item['id_evaluacion_usuario']?>').toggle('fast')">
                                            <i class="question circle icon"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <div class="field">
                                            <label></label>
                                            <div class="ui selection dropdown">
                                                <input type="hidden" name="mus_<?=$evaluados_item['id_evaluacion_usuario']?>" value="<?= $evaluados_item['musica'] ?>">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">música</div>
                                                <div class="menu">
                                                    <div class="item" data-value="alto">alto</div>
                                                    <div class="item" data-value="esperado">esperado</div>
                                                    <div class="item" data-value="medio">medio</div>
                                                    <div class="item" data-value="bajo">bajo</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ui basic segment info info_<?=$evaluados_item['id_evaluacion_usuario']?>">
                                            <?= $evaluados_item['req_musica'] ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="field">
                                            <label></label>
                                            <div class="ui selection dropdown">
                                                <input type="hidden" name="cul_<?=$evaluados_item['id_evaluacion_usuario']?>" value="<?= $evaluados_item['cultura'] ?>">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">cultura</div>
                                                <div class="menu">
                                                    <div class="item" data-value="alto">alto</div>
                                                    <div class="item" data-value="esperado">esperado</div>
                                                    <div class="item" data-value="medio">medio</div>
                                                    <div class="item" data-value="bajo">bajo</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ui basic segment info info_<?=$evaluados_item['id_evaluacion_usuario']?>">
                                            <?= $evaluados_item['req_cultura'] ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="field">
                                            <label></label>
                                            <div class="ui selection dropdown">
                                                <input type="hidden" name="jog_<?=$evaluados_item['id_evaluacion_usuario']?>" value="<?= $evaluados_item['jogo'] ?>">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">jogo</div>
                                                <div class="menu">
                                                    <div class="item" data-value="alto">alto</div>
                                                    <div class="item" data-value="esperado">esperado</div>
                                                    <div class="item" data-value="medio">medio</div>
                                                    <div class="item" data-value="bajo">bajo</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ui basic segment info info_<?=$evaluados_item['id_evaluacion_usuario']?>">
                                            <?= $evaluados_item['req_jogo'] ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="field">
                                            <label></label>
                                            <div class="ui selection dropdown">
                                                <input type="hidden" name="prm_<?=$evaluados_item['id_evaluacion_usuario']?>" value="<?= $evaluados_item['promovido'] ?>">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">promovido</div>
                                                <div class="menu">
                                                    <div class="item" data-value="1">Si</div>
                                                    <div class="item" data-value="0">No</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ui basic segment info">
                                            &nbsp;
                                        </div>
                                    </td>
                                    <td>
                                        <div class="field">
                                            <label></label>
                                            <div class="ui input">
                                                <input type="text" name="obs_<?=$evaluados_item['id_evaluacion_usuario']?>" value="<?=$evaluados_item['observacion_evaluador']?>">
                                            </div>
                                        </div>
                                        <div class="ui basic segment info">
                                            &nbsp;
                                        </div>
                                    </td>
                                    <input type="hidden" name="usu_<?=$evaluados_item['id_evaluacion_usuario']?>" value="<?= $evaluados_item['id_usuario'] ?>">
                                    <input type="hidden" name="grd_<?=$evaluados_item['id_evaluacion_usuario']?>" value="<?= $evaluados_item['id_grado'] ?>">
                                    <input type="hidden" name="ide_<?=$evaluados_item['id_evaluacion_usuario']?>" value="<?= $evaluados_item['id_evaluacion'] ?>">
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <input type="hidden" name="id_evaluacion" value="<?= $evaluacion['id_evaluacion'] ?>" >
                </form>
            </div>
        </div>

        <div class="row">
            <div class="ui basic segment">
                <a class="ui basic button" href="<?= site_url('evento/detalle/') ?><?= $evaluacion['id_evento'] ?>">Volver</a>
            </div>
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

<script>
    $(document).ready( function() {
        estado = '<?= $evaluacion['status'] ?>';
        if ( estado !== 'proceso') {
            $('.field').addClass('disabled');
        }

        $('.info').hide();
    });

    $('#btn_finalizar').click( function() {
        confirm_action('Finalizar evaluacion', '#frm_evaluacion');
    });

    $('.open_image').click( function() {
        foto = $(this).attr('src');
        $('#foto').attr('src', foto);
        $('.ui.modal').modal('show');
    });

    $('.message .close')
        .on('click', function() {
            $(this)
                .closest('.message')
                .transition('fade')
            ;
        })
    ;
</script>
