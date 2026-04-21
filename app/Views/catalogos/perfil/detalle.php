<div class="ui container">
    <div class="ui stackable centered grid">
        <div class="row">
            <div class="eight wide column">
                <div class="ui grid">
                    <div class="row">
                        <div class="eight wide column">
                            <h1 class="ui header">Perfil</h1>
                        </div>
                        <div class="eight wide right aligned column">
                            <button class="ui primary button" type="submit" form="frm_perfil">Guardar</button>
                        </div>
                    </div>
                </div>

                <div class="ui green segment">
                    <div class="ui centered grid">
                        <div class="row">
                            <div class="eight wide centered column">
                                <div class="ui card">
                                    <?php
                                        $nombre = 'perfil_' . $perfil['id_perfil'] ;
                                        $tipo_archivo = 'png';
                                        $nombre_archivo = $nombre . '.' . $tipo_archivo;
                                        $up_dir = 'imgs/';
                                        $url_actual = site_url('perfil') ;
                                        $nombre_archivo_fs = $up_dir . $nombre_archivo;
                                        $nombre_archivo_url = base_url($up_dir . $nombre_archivo);
                                    ?>
                                    <div class="image">
                                        <?php if ( file_exists($nombre_archivo_fs) ): ?>
                                            <img class="ui image" src="<?= $nombre_archivo_url ?>">
                                            <?php $borrado = 'habilitado' ?>
                                        <?php else: ?>
                                            <img class="ui image" src="<?= base_url('assets/img/image.png') ?>">
                                            <?php $borrado = '' ?>
                                        <?php endif ?>
                                    </div>
                                    <form method="post" enctype="multipart/form-data" action="<?=site_url('archivo/subir')?>" id="frm_subir">
                                        <input type="file" class="ui invisible file input" id="invisibleupload1" name="userfile">
                                        <input type="hidden" name="nombre_archivo" value="<?=$nombre_archivo?>">
                                        <input type="hidden" name="up_dir" value="<?=$up_dir?>">
                                        <input type="hidden" name="tipo_archivo" value="<?=$tipo_archivo?>">
                                        <input type="hidden" name="url_actual" value="<?=$url_actual?>">
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
                        <div class="row">
                            <div class="twelve wide column">
                                <form class="ui form" method="post" action="/perfil/guardar" id="frm_perfil">
                                    <div class="field">
                                        <label>Nombre de capoeira</label>
                                        <input type="text" name="nom_capoeira" id="nom_capoeira" value="<?=$perfil['nom_capoeira']?>">
                                    </div>
                                    <div class="field">
                                        <label>Fecha de ingreso</label>
                                        <input type="date" name="fecha_ingreso" id="fecha_ingreso" value="<?=$perfil['fecha_ingreso']?>">
                                    </div>
                                    <div class="fields">
                                        <div class="five wide field">
                                            <label>Sexo</label>
                                            <div class="ui selection dropdown">
                                                <input type="hidden" name="sexo" value="<?=$perfil['sexo']?>">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">Sexo</div>
                                                <div class="menu">
                                                    <div class="item" data-value="mujer">Mujer</div>
                                                    <div class="item" data-value="hombre">Hombre</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="five wide field">
                                            <label>Edad</label>
                                            <div class="ui selection dropdown" id="dp_edad">
                                                <input type="hidden" name="edad" id="edad" value="<?=$perfil['edad']?>">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">Edad</div>
                                                <div class="menu">
                                                    <div class="item" data-value="niño">Niño</div>
                                                    <div class="item" data-value="adulto">Adulto</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="six wide field">
                                            <label>Talla</label>
                                            <div class="ui selection dropdown" id="dp_talla">
                                                <input type="hidden" name="id_talla" id="id_talla" value="<?=$perfil['id_talla']?>">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">Talla</div>
                                                <div class="menu">
                                                    <?php foreach ($tallas_actual as $tallas_actual_item) { ?>
                                                        <div class="item" data-value="<?=$tallas_actual_item['id_talla'] ?>"><?=$tallas_actual_item['nom_talla'] ?></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_perfil" id="id_perfil" value="<?=$perfil['id_perfil']?>">
                                    <input type="hidden" name="id_usuario" id="id_usuario" value="<?=$perfil['id_usuario']?>">

                                    <div class="ui error message"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

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

    $('#edad').change( function () {
        edad = $('#edad').val();
        if ( edad == 'niño' ) {
            tallas = JSON.parse('<?php echo json_encode($tallas_niño) ?>');
        } else {
            tallas = JSON.parse('<?php echo json_encode($tallas_adulto) ?>');
        }
        $('#dp_talla').dropdown('change values', tallas);
    });

    $('.ui.form')
        .form({
            fields: {
                nom_capoeira: {
                    identifier: 'nom_capoeira',
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Nombre de capoeira no puede estar vacio'
                        }
                    ]
                },
                sexo: {
                    identifier: 'sexo',
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Sexo no puede estar vacio'
                        }
                    ]
                },
                edad: {
                    identifier: 'edad',
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Edad no puede estar vacio'
                        }
                    ]
                },
                id_talla: {
                    identifier: 'id_talla',
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Talla no puede estar vacio'
                        }
                    ]
                },
            }
        })
    ;

</script>
