<div class="ui container">
    <div class="ui stackable grid">
        <div class="row">
            <div class="twelve wide column">
                <div class="ui grid">
                    <div class="row">
                        <div class="eight wide column">
                            <h1 class="ui header">Evaluadores</h1>
                        </div>
                    </div>
                </div>

                <table class="ui very basic striped unstackable table">
                    <thead>
                        <tr>
                            <th>Nombre / rol</th>
                            <th>Activo</th>
                            <th>Evaluador</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($evaluadores as $evaluadores_item): ?>
                        <tr>
                            <td>
                                <h4 class="ui image header">
                                    <div class="content">
                                        <a href="<?=site_url('usuario/detalle/')?><?=$evaluadores_item['id_usuario']?>"><?= $evaluadores_item['nom_usuario'] ?></a>
                                        <div class="sub header"><?=$evaluadores_item['id_rol']?></div>
                                    </div>
                                </h4>
                            </td>
                            <td>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="activo" id="activo" value="1" <?= ($evaluadores_item['activo'] == '1') ? 'checked' : '' ?> disabled>
                                    <label></label>
                                </div>
                            </td>
                            <td>
                                <form class="ui form" method="post" action="/usuario/guardar_evaluador" name="frm_evaluador<?=$evaluadores_item['id_usuario']?>">
                                    <div class="ui toggle checkbox">
                                        <input type="checkbox" name="evaluador" id="evaluador" value="1" <?= ($evaluadores_item['evaluador'] == '1') ? 'checked' : '' ?> onchange="frm_evaluador<?=$evaluadores_item['id_usuario']?>.submit()">
                                        <label></label>
                                    </div>
                                    <input type="hidden" name="id_usuario" id="id_usuario" value="<?=$evaluadores_item['id_usuario']?>">
                                    <input type="hidden" name="nom_login" id="nom_login" value="<?=$evaluadores_item['nom_login']?>">
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
                <a class="ui basic button" href="<?= site_url('catalogos') ?>">Volver</a>
            </div>
        </div>

    </div>
</div>

