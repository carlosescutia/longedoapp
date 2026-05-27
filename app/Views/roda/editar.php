<div class="ui container">
    <div class="ui stackable grid">
        <div class="ten wide column">
            <form method="post" enctype="multipart/form-data" action="<?=site_url('archivo/subir_roda')?>" id="frm_subir">
            </form>
            <form method="post" enctype="multipart/form-data" action="<?=site_url('archivo/eliminar')?>" id="frm_eliminar">
            </form>

            <form class="ui big form" method="post" action="/roda/guardar" id="frm_roda">

                <div class="field">
                    <input type="text" name="nom_roda" id="nom_roda" value="<?= $roda['nom_roda'] ?>" form="frm_roda">
                </div>

                <div class="ui hidden divider"></div>

                <div class="ui stackable grid">
                    <div class="eight wide column">
                        <div class="ui centered card">

                            <?php
                                $nombre_archivo = $roda['cartel'];
                                $up_dir = 'imgs/roda/';
                                $url_actual = site_url('roda/editar/') . $roda['id_roda'] ;
                                $nombre_archivo_fs = $up_dir . $nombre_archivo;
                                $nombre_archivo_url = base_url($up_dir . $nombre_archivo);

                                $res_x = '400';
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

                            <input type="file" class="ui invisible file input" id="invisibleupload1" name="userfile" form="frm_subir">
                            <input type="hidden" name="up_dir" value="<?=$up_dir?>" form="frm_subir">
                            <input type="hidden" name="id_roda" value="<?=$roda['id_roda']?>" form="frm_subir">
                            <input type="hidden" name="archivo_actual" value="<?=$nombre_archivo?>" form="frm_subir">
                            <input type="hidden" name="url_actual" value="<?=$url_actual?>" form="frm_subir">
                            <input type="hidden" name="res_x" value="<?=$res_x?>" form="frm_subir">
                            <input type="hidden" name="res_y" value="<?=$res_y?>" form="frm_subir">

                            <input type="hidden" name="nombre_archivo" value="<?=$nombre_archivo?>" form="frm_eliminar">
                            <input type="hidden" name="up_dir" value="<?=$up_dir?>" form="frm_eliminar">
                            <input type="hidden" name="url_actual" value="<?=$url_actual?>" form="frm_eliminar">

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
                                <textarea name="redaccion" id="redaccion" rows="11" form="frm_roda"><?= $roda['redaccion'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ui basic segment">
                    <div class="ui form">
                        <div class="fields">
                            <div class="field">
                                <label>Fecha</label>
                                <input type="date" name="fecha" id="fecha" value="<?= $roda['fecha'] ?>" form="frm_roda">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="field">
                                <label>Lugar</label>
                                <input type="text" name="lugar" id="lugar" value="<?= $roda['lugar'] ?>" form="frm_roda">
                            </div>
                            <div class="field">
                                <label>Ubicación</label>
                                <input type="text" name="ubicacion" id="ubicacion" value="<?= $roda['ubicacion'] ?>" form="frm_roda">
                            </div>
                            <div class="field">
                                <label>Publicado</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="activo" id="activo" value="1" <?= ($roda['activo'] == '1') ? 'checked' : '' ?>  form="frm_roda">
                                    <label></label>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id_roda" id="id_roda" value="<?= $roda['id_roda'] ?>" form="frm_roda">
                        <input type="hidden" name="id_comunidad" id="id_comunidad" value="<?=$roda['id_comunidad']?>" form="frm_roda">

                        <div class="ui error message"></div>
                    </div>
                </div>


            </form>

        </div>

        <div class="five wide column">
            <button class="ui primary button" type="submit" form="frm_roda">Guardar</button>
        </div>

        <div class="row">
            <div class="ui basic segment">
                <a class="ui basic button" href="<?= site_url('roda/detalle/') ?><?= $roda['id_roda'] ?>">Volver</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready( function() {
        $('#btn_subir').hide();
    });

    $('#invisibleupload1').change( function () {
        $('#btn_subir').show(); 
        $('#btn_archivo').hide();
    });

    $('#btn_eliminar').click( function() {
        if ('<?= $borrado ?>' == 'habilitado') {
            confirm_action('Se eliminará el archivo <?=$nombre_archivo?>', '#frm_eliminar');
        }
    });

    $('#frm_roda')
        .form({
            fields: {
                nom_roda: {
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Nombre no puede estar vacio'
                        }
                    ]
                },
                fecha: {
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Desde no puede estar vacio'
                        }
                    ]
                },
            }
        })
    ;
</script>
