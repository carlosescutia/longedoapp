<div class="ui container">
    <div class="ui stackable centered grid">
        <div class="seven wide column">
            <div class="row">
                <div class="ui green center aligned segment">
                    <h1 class="ui header">Registro a <?= $comunidad['nom_comunidad'] ?></h1>
                    <h3 class="ui header">Felicidades <?= $nom_usuario ?>, completaste tu registro. En breve se activará tu usuario.</h3>

                    <div class="ui hidden divider"></div>

                    <div class="ui basic center aligned segment">
                        <?php
                            $nombre_archivo = $comunidad['logo'];
                            $up_dir = 'imgs/comunidad/';
                            $nombre_archivo_fs = $up_dir . $nombre_archivo;
                            $nombre_archivo_url = base_url($up_dir . $nombre_archivo);
                        ?>
                        <?php if ( file_exists($nombre_archivo_fs) and $nombre_archivo_fs !== $up_dir ): ?>
                            <img class="ui centered small image" src="<?= $nombre_archivo_url ?>">
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

