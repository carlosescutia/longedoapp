<div class="ui container">
    <div class="ui stackable grid">
        <div class="row">
            <div class="twelve wide column">
                <div class="row">
                    <h1 class="ui header">
                        Editar comunidad
                        <button class="ui right floated primary button" type="submit" form="frm_comunidad">Guardar</button>
                    </h1>
                </div>

                <div class="ui basic segment">
                    <form class="ui form" method="post" action="/comunidad/guardar" id="frm_comunidad">
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Nombre</label>
                                <input type="text" name="nom_comunidad" id="nom_comunidad" value="<?=$comunidad['nom_comunidad']?>">
                            </div>
                            <div class="four wide field">
                                <label>Ciudad</label>
                                <input type="text" name="ciudad" id="ciudad" value="<?=$comunidad['ciudad']?>">
                            </div>
                        </div>
                        <input type="hidden" name="id_comunidad" id="id_comunidad" value="<?=$comunidad['id_comunidad']?>">
                        <input type="hidden" name="activo" id="activo" value="1">
                        <input type="hidden" name="url_actual" id="url_actual" value="<?= $url_actual ?>">

                        <div class="ui error message"></div>
                    </form>
                </div>
                <div class="ui basic segment">
                    <h3 class="ui header">
                        Logo
                    </h3>
                    <div class="ui card">
                        <?php
                            $nombre_archivo = $comunidad['logo'];
                            $up_dir = 'imgs/comunidad/';
                            $nombre_archivo_fs = $up_dir . $nombre_archivo;
                            $nombre_archivo_url = base_url($up_dir . $nombre_archivo);
                            $res_x = '300';
                            $res_y = '300';
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
                        <form method="post" enctype="multipart/form-data" action="<?=site_url('archivo/subir_comunidad')?>" id="frm_subir">
                            <input type="file" class="ui invisible file input" id="invisibleupload1" name="userfile">
                            <input type="hidden" name="up_dir" value="<?=$up_dir?>">
                            <input type="hidden" name="id_comunidad" value="<?=$comunidad['id_comunidad']?>">
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
            </div>
        </div>

        <div class="row">
            <div class="ui basic segment">
                <a class="ui basic button" href="<?= site_url() ?>">Volver</a>
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
            confirm_action('Se eliminará el archivo <?=$nombre_archivo?>', '#frm_eliminar');
        }
    });

$('.ui.form')
    .form({
        fields: {
            nom_comunidad: {
                rules: [
                    {
                        type   : 'notEmpty',
                        prompt : 'Nombre no puede estar vacio'
                    }
                ]
            },
            ciudad: {
                rules: [
                    {
                        type   : 'notEmpty',
                        prompt : 'Ciudad no puede estar vacio'
                    }
                ]
            },
        }
    })
;
</script>

