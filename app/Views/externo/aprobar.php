<div class="ui container">
    <div class="ui stackable grid">
        <div class="row">
            <div class="twelve wide column">
                <div class="ui grid">
                    <div class="row">
                        <h1 class="ui header">Asistentes externos <?=$evento['nom_evento']?></h1>
                    </div>
                </div>

                <table class="ui very basic striped unstackable table">
                    <thead>
                        <tr>
                            <th>Nombre de capoeira / nombre completo</th>
                            <th>Grupo</th>
                            <th>Aprobado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($externos as $externos_item): ?>
                        <tr>
                            <td>
                                <h4 class="ui image header">
                                    <div class="content">
                                        <?= $externos_item['nom_capoeira'] ?></a>
                                        <div class="sub header"><?=$externos_item['nom_completo']?></div>
                                    </div>
                                </h4>
                            </td>
                            <td>
                                <h4 class="ui image header">
                                    <div class="content">
                                        <?= $externos_item['grupo'] ?>
                                    </div>
                                </h4>
                            </td>
                            <td>
                                <form class="ui form" method="post" action="/externo/guardar_activo" name="frm_activ<?=$externos_item['id_externo']?>">
                                    <div class="ui toggle checkbox">
                                        <input type="checkbox" name="activo" id="activo" value="1" <?= ($externos_item['activo'] == '1') ? 'checked' : '' ?> onchange="frm_activ<?=$externos_item['id_externo']?>.submit()">
                                        <label></label>
                                    </div>
                                    <input type="hidden" name="id_externo" id="id_externo" value="<?=$externos_item['id_externo']?>">
                                    <input type="hidden" name="id_evento" id="id_evento" value="<?=$externos_item['id_evento']?>">
                                    <input type="hidden" name="nom_completo" id="nom_completo" value="<?=$externos_item['nom_completo']?>">
                                </form>
                            </td>
                            <td>
                                <form class="ui form" method="post" action="/externo/actualizar_status" id="frm_elim<?=$externos_item['id_externo']?>">
                                    <input type="hidden" name="id_externo" id="id_externo" value="<?= $externos_item['id_externo'] ?>" >
                                    <input type="hidden" name="status" id="status" value="cerrado">
                                    <?php
                                        $mensaje = '¿Eliminar al asistente externo ' . $externos_item['nom_capoeira'] . ' ' .$externos_item['nom_capoeira'] ;
                                        $forma = '#frm_elim' . $externos_item['id_externo'] ;
                                    ?>
                                    <a href="#" onclick="confirm_action('<?=$mensaje?>','<?=$forma?>')" ><span class="ui red text"><i class="icon times circle outline"></span></i></a>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="ui basic segment">
                <a class="ui basic button" href="<?= site_url('evento/detalle/') ?><?= $evento['id_evento'] ?>">Volver</a>
            </div>
        </div>

    </div>
</div>

