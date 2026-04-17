<div class="ui segment">
    <h4 class="ui header">Administración del evento</h4>
    <div class="ui hidden divider"></div>
    <div class="ui list">
        <div class="item"><a href="<?= site_url('evento/editar/')?><?=$evento['id_evento']?>">Editar información</a></div>
        <div class="item"><a href="<?= site_url('reportes/asistentes_evento/')?><?=$evento['id_evento']?>">Lista de asistentes</a></div>

        <table class="ui celled unstackable tiny table">
            <thead>
                <tr>
                    <th colspan="4">
                        <?php if (has_permission_and($permisos_requeridos, $permisos_usuario)): ?>
                            <form class="ui form" method="post" action="/evaluacion/nuevo">
                                <input type="hidden" name="id_evento" id="id_evento" value="<?= $evento['id_evento'] ?>">
                                <button class="circular ui right floated primary mini icon button"><i class="icon add"></i></button>
                            </form>
                        <?php endif ?>
                        Evaluaciones
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($evaluaciones as $evaluaciones_item): ?>
                    <tr>
                    <td><a href="<?=site_url('evaluacion/detalle/')?><?=$evaluaciones_item['id_evaluacion']?>"><?= $evaluaciones_item['nom_evaluador'] ?></a></td>
                        <td><?= $evaluaciones_item['edad'] ?></td>
                        <td><?= $evaluaciones_item['status'] ?></td>
                        <td class="center aligned">
                            <?php
                                $item_eliminar = '¡Se eliminará la evaluación!<br>¿Está seguro?' ;
                                $action = base_url("evaluacion/eliminar/") . $evaluaciones_item['id_evaluacion'];
                            ?>
                            <a href="#" onclick="confirm_delete('<?=$item_eliminar?>','<?=$action?>')" >
                                <span class="ui red text"><i class="icon times circle outline"></span></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <div class="ui divider"></div>

        <div class="item">
            <?php
                $item_eliminar = '¡Se eliminará el evento ' . $evento['nom_evento'] . ' y sus evaluaciones!<br>¿Está seguro de eliminarlo?' ;
                $action = base_url("evento/eliminar/") . $evento['id_evento'];
            ?>
            <a href="#" onclick="confirm_delete('<?=$item_eliminar?>','<?=$action?>')">
                <span class="ui red text">Eliminar evento</span>
            </a>
        </div>
    </div>
</div>
