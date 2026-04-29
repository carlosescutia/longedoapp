<div class="ui container">
    <div class="ui stackable centered grid">
        <div class="seven wide column">
            <h1 class="ui center aligned header">Registro a <?= $comunidad['nom_comunidad'] ?></h1>
            <img class="ui centered tiny image" src="/assets/img/logotipo.png">

            <div class="ui green segment">
                <div class="ui centered grid">
                    <div class="row">
                        <div class="fourteen wide column">
                            <form class="ui form" method="post" action="/registro_alumno/guardar">
                                <div class="field">
                                    <label>Nombre completo</label>
                                    <input type="text" name="nom_completo" id="nom_completo">
                                </div>
                                <div class="fields">
                                    <div class="field">
                                        <label>Nombre de usuario (login)</label>
                                        <input type="text" name="nom_login" id="nom_login">
                                    </div>
                                    <div class="field">
                                        <label>Contraseña</label>
                                        <input type="text" name="password" id="password">
                                    </div>
                                </div>

                                <div class="ui hidden divider"></div>

                                <div class="fields">
                                    <div class="field">
                                        <label>Nombre de capoeira</label>
                                        <input type="text" name="nom_capoeira" id="nom_capoeira">
                                    </div>
                                    <div class="field">
                                        <label>Fecha de ingreso</label>
                                        <input type="date" name="fecha_ingreso" id="fecha_ingreso">
                                    </div>
                                </div>

                                <div class="ui hidden divider"></div>

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

                                <div class="ui hidden divider"></div>

                                <div class="inline field">
                                    <div class="ui checkbox">
                                        <input type="checkbox" name="chk_aviso_privacidad" id="chk_aviso_privacidad">
                                    <label>He leído y acepto el <strong><a href="<?= $aviso_privacidad ?>" target="_blank">Aviso de privacidad</a></strong></label>
                                    </div>
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
                                <input type="hidden" name="id_comunidad" id="id_comunidad" value="<?= $comunidad['id_comunidad'] ?>">
                                <div class="ui error message"></div>
                            </form>
                        </div>
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
                nom_login: {
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Nombre de usuario (login) no puede estar vacio'
                        }
                    ]
                },
                password: {
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Contraseña no puede estar vacio'
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
                chk_aviso_privacidad: {
                    rules: [
                        {
                            type   : 'notEmpty',
                            prompt : 'Se debe aceptar el aviso de privacidad'
                        }
                    ]
                },
            }
        })
    ;
</script>

