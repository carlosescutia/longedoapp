<div class="ui container">
    <div class="ui stackable grid">
        <div class="row">
            <div class="twelve wide column">
                <div class="ui grid">
                    <div class="row">
                        <div class="eight wide column">
                            <h1 class="ui header">Editar usuario</h1>
                        </div>
                        <div class="eight wide right aligned column">
                            <button class="ui primary button" type="submit" form="frm_usuario">Guardar</button>
                        </div>
                    </div>
                </div>

                <div class="ui basic segment">
                    <form class="ui form" method="post" action="/usuario/guardar" id="frm_usuario">
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Nombre</label>
                                <input type="text" name="nom_usuario" id="nom_usuario" value="<?=$usuario['nom_usuario']?>">
                            </div>
                            <div class="four wide field">
                                <label>Login</label>
                                <input type="text" name="nom_login" id="nom_login" value="<?=$usuario['nom_login']?>">
                            </div>
                            <div class="four wide field">
                                <label>Contraseña</label>
                                <input type="text" name="password" id="password" value="<?=$usuario['password']?>">
                            </div>
                        </div>
                        <div class="fields">
                            <?php
                                $permisos_requeridos = array(
                                    'rol_admin',
                                );
                            ?>
                            <?php if (has_permission_and($permisos_requeridos, $permisos_usuario)): ?>
                                <div class="four wide field">
                                    <label>Rol</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="id_rol" value="<?=$usuario['id_rol']?>">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Rol</div>
                                        <div class="menu">
                                            <?php foreach ($roles as $roles_item) { ?>
                                                <div class="item" data-value="<?=$roles_item['id_rol'] ?>"><?=$roles_item['nom_rol'] ?></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <input type="hidden" name="id_rol" value="alumno">
                            <?php endif ?>
                            <div class="four wide field">
                                <label>Activo</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="activo" id="activo" value="1" <?= ($usuario['activo'] == '1') ? 'checked' : '' ?> >
                                    <label></label>
                                </div>
                            </div>
                            <?php
                                $permisos_requeridos = array(
                                    'rol_admin',
                                );
                            ?>
                            <?php if (has_permission_and($permisos_requeridos, $permisos_usuario)): ?>
                                <div class="four wide field">
                                    <label>Comunidad</label>
                                    <div class="ui selection dropdown">
                                        <input type="hidden" name="id_comunidad" value="<?=$usuario['id_comunidad']?>">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Comunidad</div>
                                        <div class="menu">
                                            <?php foreach ($comunidades as $comunidades_item) { ?>
                                                <div class="item" data-value="<?=$comunidades_item['id_comunidad'] ?>"><?=$comunidades_item['nom_comunidad'] ?></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <input type="hidden" name="id_comunidad" value="<?=$userdata['id_comunidad']?>">
                            <?php endif ?>
                        </div>
                        <input type="hidden" name="id_usuario" id="id_usuario" value="<?=$usuario['id_usuario']?>">

                        <div class="ui error message"></div>
                    </form>
                </div>

                <div class="row">
                    <div class="ui stackable grid">
                        <div class="row">
                            <div class="eight wide column">
                                <?php include 'accesos_rol.php' ?>
                            </div>
                            <div class="eight wide column">
                                <?php include 'accesos_usuario.php' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="ui basic segment">
                <a class="ui basic button" href="<?= site_url('usuario') ?>">Volver</a>
            </div>
        </div>
    </div>
</div>

<script>
$('.ui.form')
    .form({
        fields: {
            nom_usuario: {
                rules: [
                    {
                        type   : 'notEmpty',
                        prompt : 'Nombre no puede estar vacio'
                    }
                ]
            },
            nom_login: {
                rules: [
                    {
                        type   : 'notEmpty',
                        prompt : 'Login no puede estar vacio'
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
            id_rol: {
                rules: [
                    {
                        type   : 'notEmpty',
                        prompt : 'Debe seleccionar un Rol'
                    }
                ]
            },
        }
    })
;
</script>
