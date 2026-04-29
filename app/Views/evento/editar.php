<div class="ui container">
    <div class="ui stackable grid">
        <div class="ten wide column">
            <form class="ui big form" method="post" action="/evento/guardar" id="frm_evento">
            </form>

            <div class="ui massive form">
                <div class="field">
                    <input type="text" name="nom_evento" id="nom_evento" value="<?= $evento['nom_evento'] ?>" form="frm_evento">
                </div>
            </div>

            <div class="ui hidden divider"></div>

            <div class="ui stackable grid">
                <div class="eight wide column">
                    <div class="ui centered card">

                        <?php
                            $nombre_archivo = $evento['cartel'];
                            $up_dir = 'imgs/evento/';
                            $url_actual = site_url('evento/editar/') . $evento['id_evento'] ;
                            $nombre_archivo_fs = $up_dir . $nombre_archivo;
                            $nombre_archivo_url = base_url($up_dir . $nombre_archivo);

                            $res_x = '500';
                            $res_y = '500';
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

                        <form method="post" enctype="multipart/form-data" action="<?=site_url('archivo/subir_evento')?>" id="frm_subir">
                            <input type="file" class="ui invisible file input" id="invisibleupload1" name="userfile" accept="image/*" capture="user">
                            <input type="hidden" name="up_dir" value="<?=$up_dir?>">
                            <input type="hidden" name="id_evento" value="<?=$evento['id_evento']?>">
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
                <div class="eight wide column">
                    <div class="ui large form">
                        <div class="field">
                            <label></label>
                            <textarea name="redaccion" id="redaccion" rows="11" form="frm_evento"><?= $evento['redaccion'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ui basic segment">
                <div class="ui form">
                    <div class="fields">
                        <div class="field">
                            <label>Desde</label>
                            <input type="date" name="fech_ini" id="fech_ini" value="<?= $evento['fech_ini'] ?>" form="frm_evento">
                        </div>
                        <div class="field">
                            <label>Hasta</label>
                            <input type="date" name="fech_fin" id="fech_fin" value="<?= $evento['fech_fin'] ?>" form="frm_evento">
                        </div>
                    </div>
                    <div class="fields">
                        <div class="field">
                            <label>Lugar</label>
                            <input type="text" name="lugar" id="lugar" value="<?= $evento['lugar'] ?>" form="frm_evento">
                        </div>
                        <div class="field">
                            <label>Ubicación</label>
                            <input type="text" name="ubicacion" id="ubicacion" value="<?= $evento['ubicacion'] ?>" form="frm_evento">
                        </div>
                        <div class="field">
                            <label>Activo</label>
                            <div class="ui toggle checkbox">
                                <input type="checkbox" name="activo" id="activo" value="1" <?= ($evento['activo'] == '1') ? 'checked' : '' ?>  form="frm_evento">
                                <label></label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="id_evento" id="id_evento" value="<?= $evento['id_evento'] ?>" form="frm_evento">
                    <input type="hidden" name="id_comunidad" id="id_comunidad" value="<?=$evento['id_comunidad']?>" form="frm_evento">

                    <div class="ui error message"></div>
                </div>
            </div>
        </div>

        <div class="five wide column">
            <button class="ui primary button" type="submit" form="frm_evento">Guardar</button>
        </div>

        <div class="row">
            <div class="ui basic segment">
                <a class="ui basic button" href="<?= site_url('evento/detalle/') ?><?= $evento['id_evento'] ?>">Volver</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready( function() {
        $('#btn_subir').hide();
    });

    $('#frm_subir').change( function () {
        $('#btn_subir').show(); 
        $('#btn_archivo').hide();
    });

    $('#btn_eliminar').click( function() {
        if ('<?= $borrado ?>' == 'habilitado') {
            confirm_file_delete('<?=$nombre_archivo?>', '#frm_eliminar');
        }
    });

</script>
