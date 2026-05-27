<div class="ui stackable grid container">
    <div class="row">
        <div class="eleven wide column">
            <div class="ui top attached tabular menu">
                <div class="active item" data-tab="eventos">Eventos</div>
                <div class="item" data-tab="rodas">Rodas</div>
            </div>
            <div class="ui bottom attached active tab segment" data-tab="eventos">
                <div class="row">
                    <h1 class="ui header">
                        <?php
                            $permisos_requeridos = array(
                                'evento.can_edit',
                            );
                        ?>
                        <?php if (has_permission_and($permisos_requeridos, $permisos_usuario)): ?>
                            <a class="circular right floated ui primary icon button" href="<?= site_url('evento/nuevo') ?>">
                                <i class="icon add"></i>
                            </a>
                        <?php endif ?>
                    </h1>
                </div>
                <div class="ui basic segment">
                    <p></p>
                    <div class="ui stackable link cards">
                        <?php foreach ($eventos_actuales as $eventos_actuales_item): ?>
                            <?php if ($eventos_actuales_item['activo'] or ($userdata['id_rol'] == 'mentor' and $eventos_actuales_item['id_comunidad'] == $userdata['id_comunidad'])): ?>
                                <a class="ui card" href="<?= site_url('evento/detalle/') ?><?= $eventos_actuales_item['id_evento'] ?>">

                                    <?php
                                        $nombre_archivo = $eventos_actuales_item['cartel'];
                                        $up_dir = 'imgs/evento/';
                                        $nombre_archivo_fs = $up_dir . $nombre_archivo;
                                        $nombre_archivo_url = base_url($up_dir . $nombre_archivo);
                                    ?>
                                    <?php
                                        $fmt = datefmt_create(
                                            'es_MX',
                                            IntlDateFormatter::NONE,
                                            IntlDateFormatter::NONE,
                                            null,
                                            IntlDateFormatter::GREGORIAN,
                                            'MMM yyyy'
                                        );
                                        $fech_ini = strtotime($eventos_actuales_item['fech_ini']);
                                    ?>
                                    <div class="image">
                                        <div class="ui teal left ribbon label">
                                            <?= datefmt_format($fmt, $fech_ini) ?>
                                        </div>
                                        <?php if ( ! $eventos_actuales_item['activo'] ): ?>
                                            <div class="ui orange bottom ribbon label">
                                                <i class="eye slash icon"></i>sin publicar
                                            </div>
                                        <?php endif ?>
                                        <?php if ( file_exists($nombre_archivo_fs) and $nombre_archivo_fs !== $up_dir ): ?>
                                            <img src="<?= $nombre_archivo_url ?>">
                                        <?php else: ?>
                                            <img src="<?= base_url('assets/img/image.png') ?>">
                                        <?php endif ?>
                                    </div>
                                    <div class="content">
                                        <div class="header"><?= $eventos_actuales_item['nom_evento'] ?></div>
                                        <div class="description">
                                            <span class="right floated">
                                                <i class="users icon"></i>
                                                <?= $eventos_actuales_item['num_asistentes'] ?> asistentes
                                            </span>
                                            <?= $eventos_actuales_item['nom_comunidad'] ?>
                                        </div>
                                    </div>
                                    <div class="extra content">
                                        <span class="left floated">
                                            <?php if ( in_array($eventos_actuales_item['id_evento'], array_column($asistencias, 'id_evento')) ): ?>
                                                <div class="ui green label">
                                                    <i class="check icon"></i>Asistencia
                                                </div>
                                            <?php endif ?>
                                        </span>
                                        <span class="right floated">
                                            <?php if ( in_array($eventos_actuales_item['id_evento'], array_column($evaluaciones, 'id_evento')) ): ?>
                                                <div class="ui purple label">
                                                    <i class="check icon"></i>Evaluación
                                                </div>
                                            <?php endif ?>
                                        </span>
                                    </div>
                                </a>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>

                    <div class="ui hidden divider"></div>

                    <?php if ($eventos_anteriores): ?>
                        <div class="ui accordion">
                            <div class="title">
                                <i class="dropdown icon"></i>
                                Anteriores
                            </div>
                            <div class="content">
                                <div class="transition hidden">
                                    <div class="ui link four doubling mini cards">
                                        <?php foreach ($eventos_anteriores as $eventos_anteriores_item): ?>
                                            <?php if ($eventos_anteriores_item['activo'] or ($userdata['id_rol'] == 'mentor' and $eventos_anteriores_item['id_comunidad'] == $userdata['id_comunidad'])): ?>
                                                <a class="ui card" href="<?= site_url('evento/detalle/') ?><?= $eventos_anteriores_item['id_evento'] ?>">
                                                    <?php
                                                        $nombre_archivo = $eventos_anteriores_item['cartel'];
                                                        $up_dir = 'imgs/evento/';
                                                        $nombre_archivo_fs = $up_dir . $nombre_archivo;
                                                        $nombre_archivo_url = base_url($up_dir . $nombre_archivo);
                                                    ?>
                                                    <?php
                                                        $fmt = datefmt_create(
                                                            'es_MX',
                                                            IntlDateFormatter::NONE,
                                                            IntlDateFormatter::NONE,
                                                            null,
                                                            IntlDateFormatter::GREGORIAN,
                                                            'MMM yyyy'
                                                        );
                                                        $fech_ini = strtotime($eventos_anteriores_item['fech_ini']);
                                                    ?>
                                                    <div class="image">
                                                        <div class="ui black left ribbon label">
                                                            <?= datefmt_format($fmt, $fech_ini) ?>
                                                        </div>
                                                        <?php if ( file_exists($nombre_archivo_fs) and $nombre_archivo_fs !== $up_dir ): ?>
                                                            <img class="ui disabled image" src="<?= $nombre_archivo_url ?>">
                                                        <?php else: ?>
                                                            <img class="ui disabled image" src="<?= base_url('assets/img/image.png') ?>">
                                                        <?php endif ?>
                                                    </div>
                                                    <div class="content">
                                                        <div class="header"><?= $eventos_anteriores_item['nom_evento'] ?></div>
                                                        <div class="description">
                                                            <span class="right floated">
                                                                <i class="users icon"></i>
                                                                <?= $eventos_anteriores_item['num_asistentes'] ?> asistentes
                                                            </span>
                                                            <?= $eventos_anteriores_item['nom_comunidad'] ?>
                                                        </div>
                                                    </div>
                                                    <div class="extra content">
                                                        <span class="left floated">
                                                            <?php if ( in_array($eventos_anteriores_item['id_evento'], array_column($asistencias, 'id_evento')) ): ?>
                                                                <div class="ui mini label">
                                                                    <i class="check icon"></i>Asistencia
                                                                </div>
                                                            <?php endif ?>
                                                        </span>
                                                        <span class="right floated">
                                                            <?php if ( in_array($eventos_anteriores_item['id_evento'], array_column($evaluaciones, 'id_evento')) ): ?>
                                                                <div class="ui purple mini label">
                                                                    <i class="check icon"></i>Evaluación
                                                                </div>
                                                            <?php endif ?>
                                                        </span>
                                                    </div>
                                                </a>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>

                </div>
            </div>

            <div class="ui bottom attached tab segment" data-tab="rodas">
                <div class="row">
                    <h1 class="ui header">
                        <?php
                            $permisos_requeridos = array(
                                'roda.can_edit',
                            );
                        ?>
                        <?php if (has_permission_and($permisos_requeridos, $permisos_usuario)): ?>
                            <a class="circular right floated ui primary icon button" href="<?= site_url('roda/nuevo') ?>">
                                <i class="icon add"></i>
                            </a>
                        <?php endif ?>
                    </h1>
                </div>
                <div class="ui basic segment">
                    <p></p>
                    <div class="ui stackable link cards">
                        <?php foreach ($rodas_actuales as $rodas_actuales_item): ?>
                            <?php if ($rodas_actuales_item['activo'] or ($userdata['id_rol'] == 'mentor' and $rodas_actuales_item['id_comunidad'] == $userdata['id_comunidad'])): ?>
                                <a class="ui card" href="<?= site_url('roda/detalle/') ?><?= $rodas_actuales_item['id_roda'] ?>">

                                    <?php
                                        $nombre_archivo = $rodas_actuales_item['cartel'];
                                        $up_dir = 'imgs/roda/';
                                        $nombre_archivo_fs = $up_dir . $nombre_archivo;
                                        $nombre_archivo_url = base_url($up_dir . $nombre_archivo);
                                    ?>
                                    <?php
                                        $fmt = datefmt_create(
                                            'es_MX',
                                            IntlDateFormatter::NONE,
                                            IntlDateFormatter::NONE,
                                            null,
                                            IntlDateFormatter::GREGORIAN,
                                            'MMM yyyy'
                                        );
                                        $fecha = strtotime($rodas_actuales_item['fecha']);
                                    ?>
                                    <div class="image">
                                        <div class="ui teal left ribbon label">
                                            <?= datefmt_format($fmt, $fecha) ?>
                                        </div>
                                        <?php if ( ! $rodas_actuales_item['activo'] ): ?>
                                            <div class="ui orange bottom ribbon label">
                                                <i class="eye slash icon"></i>sin publicar
                                            </div>
                                        <?php endif ?>
                                        <?php if ( file_exists($nombre_archivo_fs) and $nombre_archivo_fs !== $up_dir ): ?>
                                            <img src="<?= $nombre_archivo_url ?>">
                                        <?php else: ?>
                                            <img src="<?= base_url('assets/img/image.png') ?>">
                                        <?php endif ?>
                                    </div>
                                    <div class="content">
                                        <div class="header"><?= $rodas_actuales_item['nom_roda'] ?></div>
                                        <div class="description">
                                            <?= $rodas_actuales_item['nom_comunidad'] ?>
                                        </div>
                                    </div>
                                    <div class="extra content">
                                        <span class="left floated">
                                            <?php if ( in_array($rodas_actuales_item['id_roda'], array_column($asistencias, 'id_roda')) ): ?>
                                                <div class="ui green label">
                                                    <i class="check icon"></i>Asistencia
                                                </div>
                                            <?php endif ?>
                                        </span>
                                        <span class="right floated">
                                            <?php if ( in_array($rodas_actuales_item['id_roda'], array_column($evaluaciones, 'id_roda')) ): ?>
                                                <div class="ui purple label">
                                                    <i class="check icon"></i>Evaluación
                                                </div>
                                            <?php endif ?>
                                        </span>
                                    </div>
                                </a>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>

                    <div class="ui hidden divider"></div>

                    <?php if ($rodas_anteriores): ?>
                        <div class="ui accordion">
                            <div class="title">
                                <i class="dropdown icon"></i>
                                Anteriores
                            </div>
                            <div class="content">
                                <div class="transition hidden">
                                    <div class="ui link four doubling mini cards">
                                        <?php foreach ($rodas_anteriores as $rodas_anteriores_item): ?>
                                            <?php if ($rodas_anteriores_item['activo'] or ($userdata['id_rol'] == 'mentor' and $rodas_anteriores_item['id_comunidad'] == $userdata['id_comunidad'])): ?>
                                                <a class="ui card" href="<?= site_url('roda/detalle/') ?><?= $rodas_anteriores_item['id_roda'] ?>">
                                                    <?php
                                                        $nombre_archivo = $rodas_anteriores_item['cartel'];
                                                        $up_dir = 'imgs/roda/';
                                                        $nombre_archivo_fs = $up_dir . $nombre_archivo;
                                                        $nombre_archivo_url = base_url($up_dir . $nombre_archivo);
                                                    ?>
                                                    <?php
                                                        $fmt = datefmt_create(
                                                            'es_MX',
                                                            IntlDateFormatter::NONE,
                                                            IntlDateFormatter::NONE,
                                                            null,
                                                            IntlDateFormatter::GREGORIAN,
                                                            'MMM yyyy'
                                                        );
                                                        $fecha = strtotime($rodas_anteriores_item['fecha']);
                                                    ?>
                                                    <div class="image">
                                                        <div class="ui black left ribbon label">
                                                            <?= datefmt_format($fmt, $fecha) ?>
                                                        </div>
                                                        <?php if ( file_exists($nombre_archivo_fs) and $nombre_archivo_fs !== $up_dir ): ?>
                                                            <img class="ui disabled image" src="<?= $nombre_archivo_url ?>">
                                                        <?php else: ?>
                                                            <img class="ui disabled image" src="<?= base_url('assets/img/image.png') ?>">
                                                        <?php endif ?>
                                                    </div>
                                                    <div class="content">
                                                        <div class="header"><?= $rodas_anteriores_item['nom_roda'] ?></div>
                                                        <div class="description">
                                                            <?= $rodas_anteriores_item['nom_comunidad'] ?>
                                                        </div>
                                                    </div>
                                                    <div class="extra content">
                                                        <span class="left floated">
                                                            <?php if ( in_array($rodas_anteriores_item['id_roda'], array_column($asistencias, 'id_roda')) ): ?>
                                                                <div class="ui mini label">
                                                                    <i class="check icon"></i>Asistencia
                                                                </div>
                                                            <?php endif ?>
                                                        </span>
                                                        <span class="right floated">
                                                            <?php if ( in_array($rodas_anteriores_item['id_roda'], array_column($evaluaciones, 'id_roda')) ): ?>
                                                                <div class="ui purple mini label">
                                                                    <i class="check icon"></i>Evaluación
                                                                </div>
                                                            <?php endif ?>
                                                        </span>
                                                    </div>
                                                </a>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>

        </div>

        <!-- Administración de la comunidad -->
        <?php
            $permisos_requeridos = array(
                'admin_comunidad.can_edit',
            );
        ?>
        <?php if (has_permission_and($permisos_requeridos, $permisos_usuario)): ?>
            <div class="five wide column">
                <?php include "admin_comunidad.php" ?>
            </div>
        <?php endif ?>

        <!-- Próxima evaluación -->
        <?php if ($info_evaluacion): ?>
            <div class="five wide column">
                <?php include 'evaluacion.php' ?>
            </div>
        <?php endif ?>

    </div>
</div>

<script>
$(document).ready( function() {
    $('.ui.accordion')
        .accordion()
    ;
    $('.menu .item')
        .tab()
    ;
});

</script>
