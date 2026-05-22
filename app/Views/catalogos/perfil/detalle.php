<div class="ui container">
    <div class="ui stackable centered grid">
        <div class="row">
            <div class="fourteen wide column">
                <div class="ui grid">
                    <div class="row">
                        <div class="eight wide column">
                            <h1 class="ui header">Perfil</h1>
                        </div>
                        <div class="eight wide right aligned column">
                            <button class="ui primary button" type="submit" form="frm_perfil">Guardar</button>
                        </div>
                    </div>
                </div>

                <form method="post" action="/perfil/guardar" id="frm_perfil">
                    <input type="hidden" name="id_perfil" id="id_perfil" value="<?=$perfil['id_perfil']?>">
                    <input type="hidden" name="id_usuario" id="id_usuario" value="<?=$perfil['id_usuario']?>">
                    <?php if ( $evaluacion_pendiente ): ?>
                        <input type="hidden" name="evaluacion_pendiente" id="evaluacion_pendiente" value="<?=$evaluacion_pendiente?>">
                    <?php endif ?>
                </form>
                <form method="post" action="/usuario/generar_token_cambio_pwd" id="frm_nuevo_token">
                    <input type="hidden" name="id_usuario" id="id_usuario" value="<?=$perfil['id_usuario']?>">
                    <input type="hidden" name="url_actual" id="url_actual" value="<?= site_url('perfil') ?>">
                </form>
                <form method="post" action="/usuario/eliminar_token_cambio_pwd" id="frm_eliminar_token">
                    <input type="hidden" name="id_usuario" id="id_usuario" value="<?=$perfil['id_usuario']?>">
                    <input type="hidden" name="url_actual" id="url_actual" value="<?= site_url('perfil') ?>">
                </form>

                <div class="ui green segment">
                    <div class="ui centered stackable grid">
                        <div class="eight wide column">
                            <div class="ui grid">
                                <div class="eight wide column">
                                    <div class="ui basic center aligned segment">
                                        <?php
                                            //$nombre_archivo = 'berimbau_amarillo_azul.png';
                                            if ($grado) {
                                                $color = $grado['color'] ;
                                            } else {
                                                $color = 'gris' ;
                                            }
                                            switch ($perfil['edad']) {
                                                case 'niño':
                                                    $instrumento = 'pandero';
                                                    break;
                                                case 'adulto':
                                                    $instrumento = 'berimbau';
                                                    break;
                                                case 'adulto_mayor':
                                                    $instrumento = 'atabaque';
                                                    break;
                                                default:
                                                    $instrumento = '';
                                            }
                                            $nombre_archivo = $instrumento . '_' . $color . '.png';
                                            $up_dir = 'assets/img/avatar/';
                                            $nombre_archivo_fs = $up_dir . $nombre_archivo;
                                            $nombre_archivo_url = base_url($up_dir . $nombre_archivo);
                                        ?>
                                        <div class="image">
                                            <?php if ( file_exists($nombre_archivo_fs) and $nombre_archivo_fs !== $up_dir ): ?>
                                                <img class="ui centered circular bordered image" src="<?= $nombre_archivo_url ?>">
                                            <?php else: ?>
                                                <img class="ui centered circular bordered image" src="<?= base_url('assets/img/image.png') ?>">
                                            <?php endif ?>
                                        </div>
                                        <div class="ui segment">
                                            <div class="content">
                                                <div class="ui header">
                                                    <?= $grado ? $grado['nom_grado'] : null ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="eight wide right aligned column">
                                    <div class="ui card">
                                        <?php
                                            $nombre_archivo = $perfil['foto'];
                                            $up_dir = 'imgs/perfil/';
                                            $url_actual = site_url('perfil') ;
                                            $nombre_archivo_fs = $up_dir . $nombre_archivo;
                                            $nombre_archivo_url = base_url($up_dir . $nombre_archivo);
                                            $res_x = '300';
                                            $res_y = '300';
                                        ?>
                                        <div class="image">
                                            <?php if ( file_exists($nombre_archivo_fs) and $nombre_archivo_fs !== $up_dir ): ?>
                                                <img class="ui image" src="<?= $nombre_archivo_url ?>">
                                                <?php $borrado = 'habilitado' ?>
                                            <?php else: ?>
                                                <img class="ui image" src="<?= base_url('assets/img/image.png') ?>">
                                                <?php $borrado = '' ?>
                                            <?php endif ?>
                                        </div>
                                        <form method="post" enctype="multipart/form-data" action="<?=site_url('archivo/subir_perfil')?>" id="frm_subir">
                                            <input type="file" class="ui invisible file input" id="invisibleupload1" name="userfile">
                                            <input type="hidden" name="up_dir" value="<?=$up_dir?>">
                                            <input type="hidden" name="id_perfil" value="<?=$perfil['id_perfil']?>">
                                            <input type="hidden" name="archivo_actual" value="<?=$nombre_archivo?>">
                                            <input type="hidden" name="url_actual" value="<?=$url_actual?>">
                                            <input type="hidden" name="res_x" value="<?=$res_x?>">
                                            <input type="hidden" name="res_y" value="<?=$res_y?>">
                                        </form>
                                        <form method="post" enctype="multipart/form-data" action="<?=site_url('archivo/eliminar')?>" id="frm_eliminar">
                                            <input type="hidden" name="nombre_archivo" value="<?=$nombre_archivo?>">
                                            <input type="hidden" name="up_dir" value="<?=$up_dir?>">
                                            <input type="hidden" name="url_actual" value="<?=$url_actual?>">
                                        </form>
                                        <div class="ui icon buttons">
                                            <label for="invisibleupload1" class="ui button" id="btn_archivo"><i class="add icon"></i></label>
                                            <button class="ui green button" id="btn_subir" form="frm_subir"><i class="upload icon"></i></button>
                                            <button class="ui button" id="btn_eliminar"><i class="minus icon"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ui form">
                                <div class="fields">
                                    <div class="eight wide field">
                                        <label>Nombre de capoeira</label>
                                        <input type="text" name="nom_capoeira" id="nom_capoeira" value="<?=$perfil['nom_capoeira']?>" form="frm_perfil">
                                    </div>
                                    <div class="eight wide field">
                                        <label>Nombre completo</label>
                                        <input type="text" name="nom_usuario" id="nom_usuario" value="<?=$perfil['nom_usuario']?>" form="frm_perfil">
                                    </div>
                                </div>
                                <div class="fields">
                                    <div class="field">
                                        <label>Fecha de ingreso</label>
                                        <input type="date" name="fecha_ingreso" id="fecha_ingreso" value="<?=$perfil['fecha_ingreso']?>" form="frm_perfil">
                                    </div>
                                    <div class="field">
                                        <label>Sexo</label>
                                        <div class="ui selection dropdown">
                                            <input type="hidden" name="sexo_diverso" value="<?=$perfil['sexo_diverso']?>" form="frm_perfil">
                                            <i class="dropdown icon"></i>
                                            <div class="default text">Sexo</div>
                                            <div class="menu">
                                                <div class="item" data-value="mujer">Mujer</div>
                                                <div class="item" data-value="hombre">Hombre</div>
                                                <div class="item" data-value="otro">Otro</div>
                                                <div class="item" data-value="no_responde">Prefiero no responder</div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($perfil['token_cambio_pwd']): ?>
                                        <div class="field">
                                            <label>Link para cambiar contraseña</label>
                                            <div class="field">
                                                <label></label>
                                                <p></p>
                                                <a href="<?=site_url('usuario/nuevo_pwd/' . $perfil['token_cambio_pwd'])?>">Cambiar contraseña</a>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label></label>
                                            <p></p>
                                            <?php
                                                $mensaje = 'Se eliminará el link para cambiar contraseña' ;
                                                $forma = '#frm_eliminar_token';
                                            ?>
                                            <a href="#" onclick="confirm_action('<?=$mensaje?>','<?=$forma?>')" ><span class="ui red text"><i class="icon times circle outline"></span></i></a>
                                        </div>
                                    <?php else: ?>
                                        <div class="field">
                                            <label>Contraseña</label>
                                            <a class="ui button" onclick="frm_nuevo_token.submit()">Cambiar</a>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="ui divider"></div>
                            <div class="ui purple segment">
                                <div class="ui form">
                                    <h5 class="ui header">Datos de playera y grado</h5>
                                    <div class="fields">
                                        <div class="five wide field">
                                            <label>Corte</label>
                                            <div class="ui selection dropdown">
                                                <input type="hidden" name="sexo" value="<?=$perfil['sexo']?>" form="frm_perfil">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">Sexo</div>
                                                <div class="menu">
                                                    <div class="item" data-value="mujer">Mujer</div>
                                                    <div class="item" data-value="hombre">Hombre</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="five wide field">
                                            <label>Edad</label>
                                            <div class="ui selection dropdown" id="dp_edad">
                                                <input type="hidden" name="edad" id="edad" value="<?=$perfil['edad']?>" form="frm_perfil">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">Edad</div>
                                                <div class="menu">
                                                    <div class="item" data-value="niño">Niño</div>
                                                    <div class="item" data-value="adulto">Adulto</div>
                                                    <div class="item" data-value="adulto_mayor">Adulto mayor</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="six wide field">
                                            <label>Talla</label>
                                            <div class="ui selection dropdown" id="dp_talla">
                                                <input type="hidden" name="id_talla" id="id_talla" value="<?=$perfil['id_talla']?>" form="frm_perfil">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">Talla</div>
                                                <div class="menu">
                                                    <?php foreach ($tallas_actual as $tallas_actual_item) { ?>
                                                    <div class="item" data-value="<?=$tallas_actual_item['id_talla'] ?>"><?=$tallas_actual_item['nom_talla'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="eight wide column">
                            <div class="ui orange segment">
                                <div class="ui form">
                                    <h5 class="ui header">Datos de contacto</h5>
                                    <div class="fields">
                                        <div class="field">
                                            <label>WhatsApp</label>
                                            <input type="text" name="whatsapp_usuario" id="whatsapp_usuario" value="<?=$perfil['whatsapp_usuario']?>" form="frm_perfil">
                                        </div>
                                        <div class="field">
                                            <label>Correo</label>
                                            <input type="text" name="correo_usuario" id="correo_usuario" value="<?=$perfil['correo_usuario']?>" form="frm_perfil">
                                        </div>
                                    </div>
                                    <div class="ui section divider"></div>
                                    <h5 class="ui header">Contacto de emergencia</h5>
                                    <div class="fields">
                                        <div class="field">
                                            <label>Nombre</label>
                                            <input type="text" name="contacto_emergencia" id="contacto_emergencia" value="<?=$perfil['contacto_emergencia']?>" form="frm_perfil">
                                        </div>
                                        <div class="field">
                                            <label>WhatsApp</label>
                                            <input type="text" name="whatsapp_emergencia" id="whatsapp_emergencia" value="<?=$perfil['whatsapp_emergencia']?>" form="frm_perfil">
                                        </div>
                                    </div>
                                    <div id="dv_responsable">
                                        <div class="ui section divider"></div>
                                        <h5 class="ui header">Responsable (Padre o tutor)</h5>
                                        <div class="fields">
                                            <div class="field">
                                                <label>Nombre</label>
                                                <input type="text" name="contacto_responsable" id="contacto_responsable" value="<?=$perfil['contacto_responsable']?>" form="frm_perfil">
                                            </div>
                                            <div class="field">
                                                <label>WhatsApp</label>
                                                <input type="text" name="whatsapp_responsable" id="whatsapp_responsable" value="<?=$perfil['whatsapp_responsable']?>" form="frm_perfil">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ui divider"></div>

                            <div class="ui form">
                                <?php if ( empty($perfil['fech_acept_priv']) ): ?>
                                    <div class="inline field">
                                        <div class="ui checkbox">
                                            <input type="checkbox" name="chk_aviso_privacidad" id="chk_aviso_privacidad" form="frm_perfil">
                                        <label>He leído y acepto el <strong><a href="<?= $aviso_privacidad ?>" target="_blank">Aviso de privacidad</a></strong></label>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <?php
                                        $fmt = datefmt_create(
                                            'es_MX',
                                            IntlDateFormatter::NONE,
                                            IntlDateFormatter::NONE,
                                            null,
                                            IntlDateFormatter::GREGORIAN,
                                            'dd/MMM/yy'
                                        );
                                        $fecha = strtotime($perfil['fech_acept_priv']);
                                    ?>
                                    <p>Fecha de aceptación del <strong><a href="<?= $aviso_privacidad ?>" target="_blank">Aviso de privacidad</a></strong>: <?= datefmt_format($fmt, $fecha) ?></p>
                                <?php endif ?>

                                <div class="ui error message"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="nine wide column">
            <?php include 'grados.php' ?>
        </div>
        <div class="five wide column">
        </div>

    </div>
</div>

<script>
    $(document).ready( function() {
        $('#btn_subir').hide();

        if ( '<?= $evaluacion_pendiente ?>' == '1') {
            $('#dp_edad').addClass('disabled');
        }

        if ( '<?= $perfil["edad"] ?>' !== 'niño') {
            $('#dv_responsable').hide();
        }

    });


    $('#frm_subir').change( function () {
        $('#btn_subir').show(); 
        $('#btn_archivo').hide();
    });

    $('#btn_eliminar').click( function() {
        if ('<?= $borrado ?>' == 'habilitado') {
            confirm_action('Se eliminará el archivo <?=$nombre_archivo?>', '#frm_eliminar');
        }
    });

    $('#edad').change( function () {
        edad = $('#edad').val();
        if ( edad == 'niño' ) {
            tallas = JSON.parse('<?php echo json_encode($tallas_niño) ?>');
            $('#dv_responsable').show();
        } else {
            tallas = JSON.parse('<?php echo json_encode($tallas_adulto) ?>');
            $('#dv_responsable').hide();
        }
        $('#dp_talla').dropdown('change values', tallas);
    });

    $('.ui.form')
        .form({
            fields: {
                nom_capoeira: {
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Nombre de capoeira no puede estar vacio'
                        }
                    ]
                },
                sexo: {
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Sexo no puede estar vacio'
                        }
                    ]
                },
                edad: {
                    depends: 'evaluacion_pendiente',
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Edad no puede estar vacio'
                        },
                    ]
                },
                id_talla: {
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Talla no puede estar vacio'
                        }
                    ]
                },
                password: {
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Contraseña no puede estar vacio'
                        }
                    ]
                },
                chk_aviso_privacidad: {
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Se debe aceptar el aviso de privacidad'
                        }
                    ]
                },
            }
        })
    ;

    $('#btn_clipboard').click( function() {
        $('#url_registro').select();
        document.execCommand('copy');
        $('#url_registro').blur();

        $.toast({
            message: 'Se copió el enlace para cambiar contraseña.',
            class: 'inverted teal',
        });
    });

    $('#btn_qr').click( function() {
        $('.ui.modal').modal('show');
    });
</script>
