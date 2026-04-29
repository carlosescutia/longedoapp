<div class="ui container">
    <div class="ui stackable grid">

        <div class="ten wide column">
            <h1 class="ui header"><?= $evento['nom_evento'] ?></h1>
            <div class="ui hidden divider"></div>
            <div class="ui stackable grid">
                <div class="sixteen wide column">
                    <div class="ui medium left floated stackable image">
                        <?php
                            $nombre_archivo = $evento['cartel'];
                            $up_dir = 'imgs/evento/';
                            $nombre_archivo_fs = $up_dir . $nombre_archivo;
                            $nombre_archivo_url = base_url($up_dir . $nombre_archivo);
                        ?>
                        <?php if ( file_exists($nombre_archivo_fs) and $nombre_archivo_fs !== $up_dir ): ?>
                            <img class="ui bordered image" src="<?= $nombre_archivo_url ?>">
                        <?php else: ?>
                            <img class="ui bordered image" src="<?= base_url('assets/img/image.png') ?>">
                        <?php endif ?>
                    </div>
                    <p class="redaccion"><?= $evento['redaccion'] ?></p>
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
                    $fech_ini = strtotime($evento['fech_ini']);
                    $fech_fin = strtotime($evento['fech_fin']);
                ?>

                <div class="eight wide column">
                    Del <?= datefmt_format($fmt, $fech_ini) ?> al <?= datefmt_format($fmt, $fech_fin) ?>
                </div>
                <div class="eight wide column">
                    <a class="item" href="<?=$evento['ubicacion']?>" target="_blank"><i class="marker icon"></i><?= $evento['lugar'] ?></a>
                </div>
            </div>

            <div class="ui hidden divider"></div>

            <?php if ( $evento['activo'] ): ?>
                <?php include "user_actions_evento.php" ?>
            <?php endif ?>
        </div>

        <!-- Administración del evento -->
        <?php if ($userdata['id_comunidad'] == $evento['id_comunidad']): ?>
            <?php
                $permisos_requeridos = array(
                    'evento.can_edit',
                );
            ?>
            <?php if (has_permission_and($permisos_requeridos, $permisos_usuario)): ?>
                <div class="five wide column">
                    <?php include "admin_evento.php" ?>
                </div>
            <?php endif ?>
        <?php endif ?>

        <?php if ( in_array($userdata['id_usuario'], array_column($evaluadores_evento, 'id_evaluador')) ): ?>
            <div class="five wide column">
                <?php include "gestion_evaluacion.php" ?>
            </div>
        <?php endif ?>

        <div class="row">
            <div class="ui basic segment">
                <a class="ui basic button" href="<?= site_url() ?>">Volver</a>
            </div>
        </div>
    </div>
</div>
