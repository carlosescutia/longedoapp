<div class="ui violet segment">
    <h4 class="ui header">Recursos del grado</h4>
    <div class="ui hidden divider"></div>
    <table class="ui celled unstackable tiny table">
        <thead>
            <tr>
                <th colspan="4">
                    <?php
                        $permisos_requeridos = array(
                            'recurso_entidad.can_edit',
                        );
                    ?>
                    <?php if (has_permission_and($permisos_requeridos, $permisos_usuario)): ?>
                        <form class="ui form" method="post" action="/recurso_entidad/nuevo">
                            <input type="hidden" name="id_entidad" id="id_entidad" value="<?= $id_entidad ?>">
                            <input type="hidden" name="entidad" id="entidad" value="<?= $entidad ?>">
                            <input type="hidden" name="url_actual" id="url_actual" value="<?= site_url('grado/detalle/') . $grado['id_grado'] ?>">
                            <button class="circular ui right floated primary mini icon button"><i class="icon add"></i></button>
                        </form>
                    <?php endif ?>
                    Recursos
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recursos_entidad as $recursos_entidad_item): ?>
                <tr>
                    <td>
                        <form class="ui form" method="post" action="/recurso_entidad/actualizar_recurso" id="frm_act_recurso<?=$recursos_entidad_item['id_recurso_entidad']?>">
                            <div class="field">
                                <label></label>
                                <div class="ui fluid search selection dropdown" onchange="frm_act_recurso<?=$recursos_entidad_item['id_recurso_entidad']?>.submit()">
                                    <input type="hidden" name="id_recurso" id="id_recurso" value="<?=$recursos_entidad_item['id_recurso']?>">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Recurso</div>
                                    <div class="menu">
                                        <?php foreach ($recursos as $recursos_item) { ?>
                                            <div class="item" data-value="<?=$recursos_item['id_recurso'] ?>"><?=$recursos_item['nom_recurso'] ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id_recurso_entidad" id="id_recurso_entidad" value="<?= $recursos_entidad_item['id_recurso_entidad'] ?>" >
                            <input type="hidden" name="url_actual" id="url_actual" value="<?= site_url('grado/detalle/') . $grado['id_grado'] ?>">
                        </form>
                    </td>
                    <td><a href="<?= $recursos_entidad_item['url'] ?>" target="_blank"><?= $recursos_entidad_item['url'] ?></a></td>
                    <td>
                        <form class="ui form" method="post" action="/recurso_entidad/eliminar" id="frm_elim_recurso<?=$recursos_entidad_item['id_recurso_entidad']?>">
                            <input type="hidden" name="id_recurso_entidad" id="id_recurso_entidad" value="<?= $recursos_entidad_item['id_recurso_entidad'] ?>" >
                            <input type="hidden" name="url_actual" id="url_actual" value="<?= site_url('grado/detalle/') . $grado['id_grado'] ?>">
                            <?php
                                $mensaje = 'Se eliminará el recurso.<br>¿Está seguro?' ;
                                $forma = '#frm_elim_recurso' . $recursos_entidad_item['id_recurso_entidad'] ;
                            ?>
                            <a href="#" onclick="confirm_action('<?=$mensaje?>','<?=$forma?>')" ><span class="ui red text"><i class="icon times circle outline"></span></i></a>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
