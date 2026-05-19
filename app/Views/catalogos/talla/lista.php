<div class="ui container">
    <div class="ui stackable grid">
        <div class="row">
            <div class="twelve wide column">
                <div class="row">
                    <h1 class="ui header">
                        Tallas
                        <a class="ui right floated primary button" href="<?= site_url('talla/nuevo') ?>">Agregar</a>
                    </h1>
                </div>

                <table class="ui very basic striped unstackable table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Orden</th>
                            <th>Activo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tallas as $tallas_item): ?>
                        <tr>
                            <td>
                                <h4 class="ui image header">
                                    <div class="content">
                                        <a href="<?=site_url('talla/detalle/')?><?=$tallas_item['id_talla']?>"><?= $tallas_item['nom_talla'] ?></a>
                                    </div>
                                </h4>
                            </td>
                            <td>
                                <h4 class="ui image header">
                                    <div class="content">
                                        <?= $tallas_item['edad'] ?>
                                    </div>
                                </h4>
                            </td>
                            <td>
                                <h4 class="ui image header">
                                    <div class="content">
                                        <?= $tallas_item['orden'] ?>
                                    </div>
                                </h4>
                            </td>
                            <td>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="activo" id="activo" value="1" <?= ($tallas_item['activo'] == '1') ? 'checked' : '' ?> disabled>
                                    <label></label>
                                </div>
                            </td>
                            <td>
                                <form class="ui form" method="post" action="/talla/eliminar" id="frm_elim_talla<?=$tallas_item['id_talla']?>">
                                    <input type="hidden" name="id_talla" id="id_talla" value="<?= $tallas_item['id_talla'] ?>" >
                                    <input type="hidden" name="url_actual" id="url_actual" value="<?= site_url('talla') ?>">
                                    <?php
                                        $mensaje = 'Se eliminará la talla <strong>' . $tallas_item['nom_talla'] . ' ' . $tallas_item['edad'] . '</strong>.<br>¿Está seguro?' ;
                                        $forma = '#frm_elim_talla' . $tallas_item['id_talla'] ;
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
                <a class="ui basic button" href="<?= site_url('catalogos') ?>">Volver</a>
            </div>
        </div>

    </div>
</div>

