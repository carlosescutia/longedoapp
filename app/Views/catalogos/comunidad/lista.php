<div class="ui container">
    <div class="ui stackable grid">
        <div class="row">
            <div class="twelve wide column">
                <div class="row">
                    <h1 class="ui header">
                        Comunidades
                        <a class="ui right floated primary button" href="<?= site_url('comunidad/nuevo') ?>">Agregar</a>
                    </h1>
                </div>

                <table class="ui very basic striped unstackable table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>Activo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($comunidades as $comunidades_item): ?>
                        <tr>
                            <td>
                                <h4 class="ui image header">
                                    <div class="content">
                                        <a href="<?=site_url('comunidad/detalle/')?><?=$comunidades_item['id_comunidad']?>"><?= $comunidades_item['nom_comunidad'] ?></a>
                                    </div>
                                </h4>
                            </td>
                            <td>
                                <h4 class="ui image header">
                                    <div class="content">
                                        <?= $comunidades_item['ciudad'] ?>
                                    </div>
                                </h4>
                            </td>
                            <td>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="activo" id="activo" value="1" <?= ($comunidades_item['activo'] == '1') ? 'checked' : '' ?> disabled>
                                    <label></label>
                                </div>
                            </td>
                            <td>
                                <form class="ui form" method="post" action="/comunidad/eliminar" id="frm_elim_comunidad<?=$comunidades_item['id_comunidad']?>">
                                    <input type="hidden" name="id_comunidad" id="id_comunidad" value="<?= $comunidades_item['id_comunidad'] ?>" >
                                    <input type="hidden" name="url_actual" id="url_actual" value="<?= site_url('comunidad') ?>">
                                    <?php
                                        $mensaje = 'Se eliminará la Comunidad: <strong>' . $comunidades_item['nom_comunidad'] . '</strong>.<br>¿Está seguro?' ;
                                        $forma = '#frm_elim_comunidad' . $comunidades_item['id_comunidad'] ;
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
