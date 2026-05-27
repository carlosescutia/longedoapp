<div class="ui container">
    <div class="ui stackable grid">

        <div class="ten wide column">
            <h1 class="ui header"><?= $roda['nom_roda'] ?></h1>
            <div class="ui hidden divider"></div>
            <div class="ui stackable grid">
                <div class="sixteen wide column">
                    <div class="ui medium left floated stackable image">
                        <?php
                            $nombre_archivo = $roda['cartel'];
                            $up_dir = 'imgs/roda/';
                            $nombre_archivo_fs = $up_dir . $nombre_archivo;
                            $nombre_archivo_url = base_url($up_dir . $nombre_archivo);
                        ?>
                        <?php if ( file_exists($nombre_archivo_fs) and $nombre_archivo_fs !== $up_dir ): ?>
                            <img class="ui bordered image" src="<?= $nombre_archivo_url ?>">
                        <?php else: ?>
                            <img class="ui bordered image" src="<?= base_url('assets/img/image.png') ?>">
                        <?php endif ?>
                    </div>
                    <p class="redaccion"><?= $roda['redaccion'] ?></p>
                </div>
            </div>

            <div class="ui divider"></div>

            <div class="ui grid">
                <?php
                    $fmt = datefmt_create(
                        'es_MX',
                        IntlDateFormatter::NONE,
                        IntlDateFormatter::NONE,
                        null,
                        IntlDateFormatter::GREGORIAN,
                        'EEEE dd/MMM/yy'
                    );
                    $fecha = strtotime($roda['fecha']);
                ?>

                <div class="eight wide column">
                    <?= datefmt_format($fmt, $fecha) ?>
                </div>
                <div class="eight wide column">
                    <?php if ( $roda['ubicacion'] ): ?>
                        <a class="item" href="<?=$roda['ubicacion']?>" target="_blank"><i class="marker icon"></i>
                    <?php endif ?>
                        <?= $roda['lugar'] ?>
                    <?php if ( $roda['ubicacion'] ): ?>
                        </a>
                    <?php endif ?>
                </div>
            </div>

            <div class="ui hidden divider"></div>
            <?php if ($error_alumno): ?>
                <div class="ui negative mini message transition">
                    <i class="close icon"></i>
                    <div class="header">
                        Error
                    </div>
                    <p><?= $error_alumno ?></p>
                </div>
            <?php endif ?>
        </div>

        <!-- Administración de la roda -->
        <?php if ($userdata['id_comunidad'] == $roda['id_comunidad']): ?>
            <?php
                $permisos_requeridos = array(
                    'roda.can_edit',
                );
            ?>
            <?php if (has_permission_and($permisos_requeridos, $permisos_usuario)): ?>
                <div class="five wide column">
                    <?php include "admin_roda.php" ?>
                </div>
            <?php endif ?>
        <?php endif ?>

        <div class="row">
            <div class="ui basic segment">
                <a class="ui basic button" href="<?= site_url() ?>">Volver</a>
            </div>
        </div>
    </div>
</div>
<script>
    $('.message .close')
        .on('click', function() {
            $(this)
                .closest('.message')
                .transition('fade')
            ;
        })
    ;
</script>
