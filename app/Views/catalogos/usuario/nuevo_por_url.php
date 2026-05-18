<div class="ui container">
    <div class="ui stackable centered grid">
        <div class="fourteen wide column">
            <h1 class="ui center aligned header">Registro a <?= $comunidad['nom_comunidad'] ?></h1>
            <img class="ui centered tiny image" src="/assets/img/logotipo.png">

            <form class="ui form"  method="post" action="/registro_alumno/guardar" id="frm_alumno">
                <input type="hidden" name="id_comunidad" id="id_comunidad" value="<?= $comunidad['id_comunidad'] ?>">
                <div class="ui green segment">
                    <div class="ui centered stackable grid">
                        <div class="eight wide column">
                            <div class="field">
                                <label>Nombre completo</label>
                                <input type="text" name="nom_completo" id="nom_completo" form="frm_alumno">
                            </div>
                            <div class="fields">
                                <div class="field">
                                    <label>Nombre de usuario (login)</label>
                                    <input type="text" name="nom_login" id="nom_login" form="frm_alumno">
                                </div>
                                <div class="field">
                                    <label>Contraseña</label>
                                    <input type="text" name="password" id="password" form="frm_alumno">
                                </div>
                            </div>

                            <div class="ui hidden divider"></div>
                            <input type="hidden" id="nom_existente" value="inexistente">

                            <div class="fields">
                                <div class="field">
                                    <label>Nombre de capoeira</label>
                                    <input type="text" name="nom_capoeira" id="nom_capoeira" form="frm_alumno">
                                </div>
                                <div class="field">
                                    <label>Fecha de ingreso</label>
                                    <input type="date" name="fecha_ingreso" id="fecha_ingreso" form="frm_alumno">
                                </div>
                                <div class="field">
                                    <label>Sexo</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="sexo_diverso" form="frm_alumno" form="frm_alumno">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Sexo</div>
                                        <div class="menu">
                                            <div class="item" data-value="mujer">Mujer</div>
                                            <div class="item" data-value="hombre">Hombre</div>
                                            <div class="item" data-value="otro">Otro</div>
                                            <div class="item" data-value="no_responde">Prefiero no responder</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ui divider"></div>

                            <div class="ui purple segment">
                                <h5 class="ui header">Datos de playera y grado</h5>
                                <div class="fields">
                                    <div class="five wide field">
                                        <label>Corte</label>
                                        <div class="ui selection dropdown">
                                            <input type="hidden" name="sexo" form="frm_alumno">
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
                                            <input type="hidden" name="edad" id="edad" form="frm_alumno">
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
                                            <input type="hidden" name="id_talla" id="id_talla" form="frm_alumno">
                                            <i class="dropdown icon"></i>
                                            <div class="default text">Talla</div>
                                            <div class="menu">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="eight wide column">
                            <div class="ui orange segment">
                                <h5 class="ui header">Datos de contacto</h5>
                                <div class="fields">
                                    <div class="field">
                                        <label>WhatsApp</label>
                                        <input type="text" name="whatsapp_usuario" id="whatsapp_usuario" form="frm_alumno">
                                    </div>
                                    <div class="field">
                                        <label>Correo</label>
                                        <input type="text" name="correo_usuario" id="correo_usuario" form="frm_alumno">
                                    </div>
                                </div>
                                <div class="ui section divider"></div>
                                <h5 class="ui header">Contacto de emergencia</h5>
                                <div class="fields">
                                    <div class="field">
                                        <label>Nombre</label>
                                        <input type="text" name="contacto_emergencia" id="contacto_emergencia" form="frm_alumno">
                                    </div>
                                    <div class="field">
                                        <label>WhatsApp</label>
                                        <input type="text" name="whatsapp_emergencia" id="whatsapp_emergencia" form="frm_alumno">
                                    </div>
                                </div>
                                <div id="dv_responsable">
                                    <div class="ui section divider"></div>
                                    <h5 class="ui header">Responsable (Padre o tutor)</h5>
                                    <div class="fields">
                                        <div class="field">
                                            <label>Nombre</label>
                                            <input type="text" name="contacto_responsable" id="contacto_responsable" form="frm_alumno">
                                        </div>
                                        <div class="field">
                                            <label>WhatsApp</label>
                                            <input type="text" name="whatsapp_responsable" id="whatsapp_responsable" form="frm_alumno">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="ui divider"></div>

                            <div class="inline field">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="chk_aviso_privacidad" id="chk_aviso_privacidad" form="frm_alumno">
                                    <label>He leído y acepto el <strong><a href="<?= $aviso_privacidad ?>" target="_blank">Aviso de privacidad</a></strong></label>
                                </div>
                            </div>

                            <div class="fields">
                                <div class="eight wide field">
                                    <label>Código</label>
                                    <input type="text" name="codigo" id="codigo" form="frm_alumno">
                                </div>
                                <div class="eight wide field">
                                    <label></label>
                                    <button class="ui right floated primary button" type="submit" form="frm_alumno">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui error message"></div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#nom_login').change ( function () {
        nom_login = $('#nom_login').val();
        test_url = "<?= site_url('usuario/existe/') ?>" + nom_login ;
        $.get(test_url, function(data, status) {
            if (data) {
                $('#nom_existente').val(nom_login);
            }
        });
    });

    $(document).ready( function() {
        $('#dv_responsable').hide();
    });

    $('#edad').change( function () {
        edad = $('#edad').val();
        if ( edad == 'niño' ) {
            tallas = JSON.parse('<?php echo json_encode($tallas_niño) ?>');
            $('#dv_responsable').show();
        } else {
            tallas = JSON.parse('<?php echo json_encode($tallas_adulto) ?>');
            $('#dv_responsable').hide();
        }
        $('#dp_talla').dropdown('change values', tallas);
    });

    $('#frm_alumno')
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
                        },
                        {
                            type   : 'different[nom_existente]',
                            prompt : 'Ya existe el nombre de usuario, selecciona otro'
                        },

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
                            prompt : 'Corte no puede estar vacio'
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

