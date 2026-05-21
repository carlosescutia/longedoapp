<div class="ui segment">
    <h3 class="ui header">
        <?php
            $nombre_archivo = $comunidad['logo'];
            $up_dir = 'imgs/comunidad/';
            $nombre_archivo_fs = $up_dir . $nombre_archivo;
            $nombre_archivo_url = base_url($up_dir . $nombre_archivo);
        ?>
        <?php if ( file_exists($nombre_archivo_fs) and $nombre_archivo_fs !== $up_dir ): ?>
            <img class="ui large circular image" src="<?= $nombre_archivo_url ?>">
        <?php endif ?>
        <div class="content">
            <?= $comunidad['nom_comunidad'] ?>
            <div class="sub header">Gestión de la comunidad</div>
        </div>
    </h3>
    <div class="ui hidden divider"></div>
    <div class="ui list">
        <?php if ($error): ?>
            <div class="ui negative mini message transition">
                <i class="close icon"></i>
                <div class="header">
                    Error
                </div>
                <p><?= $error ?></p>
            </div>
        <?php endif ?>

        <div class="item"><a href="<?= site_url('comunidad/editar_comunidad_propia')?>">Editar comunidad</a></div>
        <div class="item"><a href="<?= site_url('reportes/directorio')?>">Directorio de alumnos</a></div>

        <div class="ui segment">
            <h5 class="ui header">Registro de alumnos</h5>

            <form class="ui tiny form" method="post" action="/comunidad/actualizar_registrar_alumnos" name="frm_alumnos">
                <div class="ui toggle checkbox">
                    <input type="checkbox" name="registrar_alumnos" id="registrar_alumnos" value="1" <?= ($comunidad['registrar_alumnos'] == '1') ? 'checked' : '' ?> onchange="this.form.submit()">
                    <label>Permitir registro</label>
                </div>
                <input type="hidden" name="id_comunidad" id="id_comunidad" value="<?=$comunidad['id_comunidad']?>">
            </form>

            <p></p>


            <div class="ui form">
                <a href="<?= site_url('registro_alumno/') ?><?= $comunidad['token'] ?>" target="_blank">Enlace para registro</a>
                <div class="ui action input">
                    <input type="text" name="url_registro" id="url_registro" value="<?= site_url('registro_alumno/') ?><?= $comunidad['token'] ?>" >
                    <div class="ui icon buttons">
                        <a class="ui icon button" id="btn_clipboard" title="Copiar al portapapeles"> <i class="clipboard outline icon"></i> </a> 
                        <a class="ui icon button" id="btn_qr" title="Mostrar código QR"><i class="qrcode icon"></i></a>
                    </div>
                </div>
            </div>

            <p></p>

            <form class="ui tiny form" method="post" action="/comunidad/actualizar_codigo">
                <div class="field">
                    <label>Código de autorización</label>
                    <div class="ui action input">
                        <input type="text" name="codigo" id="codigo" value="<?= $comunidad['codigo'] ?>">
                        <button class="ui icon button" id="btn_clipboard"> <i class="check icon"></i> </button> 
                    </div>
                    <input type="hidden" name="id_comunidad" id="id_comunidad" value="<?=$comunidad['id_comunidad']?>">
                </div>
            </form>

            <p></p>
            <div class="item"><a href="<?= site_url('reportes/registro_comunidad')?>">Impresión de código de registro</a></div>
            <p></p>
            <div class="item"><a href="<?= site_url('usuario')?>">Activar alumnos</a></div>
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

    $('.message .close')
        .on('click', function() {
            $(this)
                .closest('.message')
                .transition('fade')
            ;
        })
    ;
</script>
