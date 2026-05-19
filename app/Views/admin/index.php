<div class="ui stackable grid container">
    <div class="row">
        <div class="eleven wide column">
            <div class="ui green segment">

                <div class="row">
                    <h1 class="ui header">
                        Próximos eventos
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

                <div class="ui hidden divider"></div>

                <div class="ui stackable link cards">
                    <?php foreach ($eventos_actuales as $eventos_actuales_item): ?>
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
                    <?php endforeach ?>
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
    <div class="row">
        <div class="eleven wide column">
            <div class="ui grey segment">
                <div class="ui accordion">
                    <div class="title">
                        <i class="dropdown icon"></i>
                        <span class="ui large text"><strong>Eventos anteriores</strong></span>
                    </div>
                    <div class="content">
                        <div class="transition hidden">
                            <div class="ui link four doubling mini cards">
                                <?php foreach ($eventos_anteriores as $eventos_anteriores_item): ?>
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
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ui hidden divider"></div>

            </div>
        </div>
    </div>
</div>

<script>
$(document).ready( function() {
    $('.ui.accordion')
        .accordion()
    ;
});
</script>
