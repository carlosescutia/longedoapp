<div class="ui stackable grid container">
    <div class="row">
        <div class="twelve wide column">
            <div class="ui green segment">
                <div class="ui grid">
                    <div class="row">
                        <div class="eight wide column">
                            <h1 class="ui header">Próximos eventos</h1>
                        </div>
                        <div class="eight wide right aligned column">
                            <?php
                                $permisos_requeridos = array(
                                    'evento.can_edit',
                                );
                            ?>
                            <?php if (has_permission_and($permisos_requeridos, $permisos_usuario)): ?>
                                <form class="ui form" method="post" action="/evento/nuevo">
                                    <button class="circular ui primary icon button"><i class="icon add"></i></button>
                                </form>
                            <?php endif ?>
                        </div>
                    </div>
                </div>

                <div class="ui hidden divider"></div>

                <div class="ui three stackable link cards">
                    <?php foreach ($eventos as $eventos_item): ?>
                        <a class="ui card" href="<?= site_url('evento/detalle/') ?><?= $eventos_item['id_evento'] ?>">
                            <?php
                                $nombre = 'evento_' . $eventos_item['id_evento'] ;
                                $tipo_archivo = 'png';
                                $nombre_archivo = $nombre . '.' . $tipo_archivo;
                                $up_dir = 'imgs/';
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
                                    'MMM yy'
                                );
                                $fech_ini = strtotime($eventos_item['fech_ini']);
                            ?>
                            <div class="image">
                                <div class="ui teal left ribbon label">
                                    <?= datefmt_format($fmt, $fech_ini) ?>
                                </div>
                                <?php if ( file_exists($nombre_archivo_fs) ): ?>
                                    <img src="<?= $nombre_archivo_url ?>">
                                <?php else: ?>
                                    <img src="<?= base_url('assets/img/image.png') ?>">
                                <?php endif ?>
                            </div>
                            <div class="content">
                                <div class="header"><?= $eventos_item['nom_evento'] ?></div>
                                <div class="description">
                                    <span class="right floated">
                                        <i class="users icon"></i>
                                        <?= $eventos_item['num_asistentes'] ?> asistentes
                                    </span>
                                    <?= $eventos_item['nom_comunidad'] ?>
                                </div>
                            </div>
                            <div class="extra content">
                                <span class="left floated">
                                    <?php if ( in_array($eventos_item['id_evento'], array_column($asistencias, 'id_evento')) ): ?>
                                        <div class="ui green label">
                                            <i class="check icon"></i>Asistencia
                                        </div>
                                    <?php endif ?>
                                </span>
                                <span class="right floated">
                                    <?php if ( in_array($eventos_item['id_evento'], array_column($evaluaciones, 'id_evento')) ): ?>
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
    </div>
</div>
