<div class="ui container">
    <div class="ui stackable grid">

        <div class="ten wide column">
            <h1 class="ui header"><?= $evento['nom_evento'] ?></h1>
            <div class="ui hidden divider"></div>
            <div class="ui stackable grid">
                <div class="sixteen wide column">
                    <div class="ui medium left floated stackable image">
                        <?php
                            $nombre = 'evento_' . $evento['id_evento'] ;
                            $tipo_archivo = 'png';
                            $nombre_archivo = $nombre . '.' . $tipo_archivo;
                            $up_dir = 'imgs/';
                            $nombre_archivo_fs = $up_dir . $nombre_archivo;
                            $nombre_archivo_url = base_url($up_dir . $nombre_archivo);
                        ?>
                        <?php if ( file_exists($nombre_archivo_fs) ): ?>
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
        </div>

        <?php
            $permisos_requeridos = array(
                'evento.can_edit',
            );
        ?>
        <?php if ($userdata['id_comunidad'] == $evento['id_comunidad']): ?>
            <?php if (has_permission_and($permisos_requeridos, $permisos_usuario)): ?>
                <div class="five wide column">
                    <div class="ui segment">
                        <h4 class="ui header">Administración del evento</h4>
                        <div class="ui hidden divider"></div>
                        <div class="ui list">
                            <div class="item"><a href="<?= site_url('evento/editar/')?><?=$evento['id_evento']?>">Editar información</a></div>
                            <?php
                                $item_eliminar = '¡Se eliminará el evento ' . $evento['nom_evento'] . ' y sus evaluaciones!<br>¿Está seguro de eliminarlo?' ;
                                $action = base_url("evento/eliminar/") . $evento['id_evento'];
                            ?>
                            <div class="ui divider"></div>
                            <div class="item">
                                <a href="#" onclick="confirm_delete('<?=$item_eliminar?>','<?=$action?>')">
                                    <span class="ui red text">Eliminar evento</span>
                                </a>
                            </div>
                        </div>
                    </div>
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

