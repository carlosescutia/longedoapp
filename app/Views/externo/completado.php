<div class="ui container">
    <div class="ui stackable centered grid">
        <div class="seven wide column">
            <div class="row">
                <div class="ui green center aligned segment">
                    <h1 class="ui header"><?= $evento['nom_evento'] ?></h1>
                    <h3 class="ui header">Felicidades <?= $nom_completo ?>, completaste tu inscripción. ¡Te esperamos!</h3>

                    <div class="ui hidden divider"></div>

                    <div class="ui basic center aligned segment">
                        <div class="ui medium image">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
