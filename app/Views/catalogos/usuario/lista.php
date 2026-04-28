<div class="ui container">
    <div class="ui stackable grid">
        <div class="row">
            <div class="twelve wide column">
                <div class="ui grid">
                    <div class="row">
                        <div class="eight wide column">
                            <h1 class="ui header">Usuarios</h1>
                        </div>
                        <div class="eight wide right aligned column">
                            <form class="ui form" method="post" action="/usuario/nuevo">
                                <button class="ui primary button">Agregar</button>
                            </form>
                        </div>
                    </div>
                </div>

                <table class="ui very basic striped unstackable table">
                    <thead>
                        <tr>
                            <th>Nombre / login</th>
                            <th>Comunidad / rol</th>
                            <th>Perfil</th>
                            <th>Activo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuarios_item): ?>
                        <tr>
                            <td>
                                <h4 class="ui image header">
                                    <div class="content">
                                        <a href="<?=site_url('usuario/detalle/')?><?=$usuarios_item['id_usuario']?>"><?= $usuarios_item['nom_usuario'] ?></a>
                                        <div class="sub header"><?=$usuarios_item['nom_login']?></div>
                                    </div>
                                </h4>
                            </td>
                            <td>
                                <h4 class="ui image header">
                                    <div class="content">
                                        <?= $usuarios_item['nom_comunidad'] ?>
                                        <div class="sub header"><?=$usuarios_item['id_rol']?></div>
                                    </div>
                                </h4>
                            </td>
                            <td>
                                <?= $usuarios_item['fech_acept_priv'] ? 'Si' : 'No' ?>
                            </td>
                            <td>
                                <form class="ui form" method="post" action="/usuario/guardar_activo" name="frm_usr<?=$usuarios_item['id_usuario']?>">
                                    <div class="ui toggle checkbox">
                                        <input type="checkbox" name="activo" id="activo" value="1" <?= ($usuarios_item['activo'] == '1') ? 'checked' : '' ?> onchange="frm_usr<?=$usuarios_item['id_usuario']?>.submit()">
                                        <label></label>
                                    </div>
                                    <input type="hidden" name="id_usuario" id="id_usuario" value="<?=$usuarios_item['id_usuario']?>">
                                    <input type="hidden" name="nom_login" id="nom_login" value="<?=$usuarios_item['nom_login']?>">
                                </form>
                            </td>
                            <td>
                                <?php
                                    $item_eliminar = 'Usuario ' . $usuarios_item['nom_usuario'] ;
                                    $action = base_url("usuario/eliminar/") . $usuarios_item['id_usuario'];
                                ?>
                                <a href="#" onclick="confirm_delete('<?=$item_eliminar?>','<?=$action?>')" ><span class="ui red text"><i class="icon times circle outline"></span></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="ui basic segment">
                <a class="ui basic button" href="<?= site_url('catalogos') ?>">Volver</a>
            </div>
        </div>

    </div>
</div>
