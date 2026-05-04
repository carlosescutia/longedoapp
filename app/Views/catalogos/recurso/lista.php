<div class="ui container">
    <div class="ui stackable grid">
        <div class="row">
            <div class="twelve wide column">
                <div class="ui grid">
                    <div class="row">
                        <div class="eight wide column">
                            <h1 class="ui header">Recursos</h1>
                        </div>
                        <div class="eight wide right aligned column">
                            <form class="ui form" method="post" action="/recurso/nuevo">
                                <button class="ui primary button">Agregar</button>
                            </form>
                        </div>
                    </div>
                </div>

                <table class="ui very basic striped unstackable table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Url</th>
                            <th>Activo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recursos as $recursos_item): ?>
                        <tr>
                            <td>
                                <h4 class="ui image header">
                                    <div class="content">
                                        <a href="<?=site_url('recurso/detalle/')?><?=$recursos_item['id_recurso']?>"><?= $recursos_item['nom_recurso'] ?></a>
                                    </div>
                                </h4>
                            </td>
                            <td>
                                <h4 class="ui image header">
                                    <div class="content">
                                        <?= $recursos_item['url'] ?>
                                    </div>
                                </h4>
                            </td>
                            <td>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="activo" id="activo" value="1" <?= ($recursos_item['activo'] == '1') ? 'checked' : '' ?> disabled>
                                    <label></label>
                                </div>
                            </td>
                            <td>
                                <?php
                                    $item_eliminar = 'recurso: ' . $recursos_item['nom_recurso'] ;
                                    $action = site_url("recurso/eliminar/") . $recursos_item['id_recurso'];
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

