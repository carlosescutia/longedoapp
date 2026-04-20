<div class="ui segment">
    <h4 class="ui header">Gestión de la evaluación</h4>
    <div class="ui hidden divider"></div>

    <table class="ui celled unstackable tiny table">
        <tbody>
            <?php foreach ($evaluaciones as $evaluaciones_item): ?>
                <?php if ( $evaluaciones_item['id_evaluador'] == $userdata['id_usuario'] ): ?>
                    <tr>
                        <td><a href="<?=site_url('evaluacion/aplicar/')?><?=$evaluaciones_item['id_evaluacion']?>"><?= $evaluaciones_item['edad'] ?></a></td>
                        <td><?= $evaluaciones_item['status'] ?></td>
                    </tr>
                <?php endif ?>
            <?php endforeach ?>
        </tbody>
    </table>

</div>

