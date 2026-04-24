<div class="ui container">
    <div class="ui stackable centered grid">
        <div class="row">
            <div class="seven wide column">
                <h1 class="ui header">Inscripción a <?= $evento['nom_evento'] ?></h1>

                <div class="ui green segment">
                    <div class="ui centered grid">
                        <div class="row">
                            <div class="fourteen wide column">
                                <form class="ui form" method="post" action="/registro/guardar">
                                    <div class="field">
                                        <label>Nombre completo</label>
                                        <input type="text" name="nom_completo" id="nom_completo">
                                    </div>
                                    <div class="fields">
                                        <div class="field">
                                            <label>Nombre de capoeira</label>
                                            <input type="text" name="nom_capoeira" id="nom_capoeira">
                                        </div>
                                        <div class="field">
                                            <label>Grupo</label>
                                            <input type="text" name="grupo" id="grupo">
                                        </div>
                                    </div>
                                    <div class="fields">
                                        <div class="five wide field">
                                            <label>Sexo</label>
                                            <div class="ui selection dropdown">
                                                <input type="hidden" name="sexo">
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
                                                <input type="hidden" name="edad" id="edad">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">Edad</div>
                                                <div class="menu">
                                                    <div class="item" data-value="niño">Niño</div>
                                                    <div class="item" data-value="adulto">Adulto</div>
                                                    <div class="item" data-value="adulto_mayor">Adulto mayor</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="six wide field">
                                            <label>Talla</label>
                                            <div class="ui selection dropdown" id="dp_talla">
                                                <input type="hidden" name="id_talla" id="id_talla">
                                                <i class="dropdown icon"></i>
                                                <div class="default text">Talla</div>
                                                <div class="menu">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label>Nota u observación</label>
                                        <textarea name="nota" id="nota" rows="4"></textarea>
                                    </div>
                                    <div class="fields">
                                        <div class="eight wide field">
                                            <label>Código</label>
                                            <input type="text" name="codigo" id="codigo">
                                        </div>
                                        <div class="eight wide field">
                                            <label></label>
                                            <button class="ui right floated primary button" type="submit">Enviar</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_evento" id="id_evento" value="<?= $evento['id_evento'] ?>">
                                    <div class="ui error message"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="five wide column">
                <div class="ui hidden divider"></div>
                <div class="ui stackable grid">
                    <div class="sixteen wide column">
                        <div class="ui fluid image">
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
                        <div class="ui hidden divider"></div>
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
        </div>

    </div>
</div>

<script>
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
                nom_completo: {
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Nombre completo no puede estar vacio'
                        }
                    ]
                },
                sexo: {
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Sexo no puede estar vacio'
                        }
                    ]
                },
                edad: {
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Edad no puede estar vacio'
                        },
                    ]
                },
                id_talla: {
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Talla no puede estar vacio'
                        }
                    ]
                },
                codigo: {
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Código no puede estar vacio'
                        }
                    ]
                },
            }
        })
    ;
</script>
