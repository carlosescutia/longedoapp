<div class="ui container">
    <div class="ui stackable grid">
        <div class="row">
            <div class="twelve wide column">
                <div class="ui grid">
                    <div class="row">
                        <div class="eight wide column">
                            <h1 class="ui header">Grados</h1>
                        </div>
                        <div class="eight wide right aligned column">
                            <form class="ui form" method="post" action="/grado/nuevo">
                                <button class="ui primary button">Agregar</button>
                            </form>
                        </div>
                    </div>
                </div>

                <table class="ui very basic striped unstackable table" id="tbl_grados">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Orden</th>
                            <th data-orderable="false">Activo</th>
                            <th data-orderable="false"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($grados as $grados_item): ?>
                        <tr>
                            <td>
                                <h4 class="ui image header">
                                    <div class="content">
                                        <a href="<?=site_url('grado/detalle/')?><?=$grados_item['id_grado']?>"><?= $grados_item['nom_grado'] ?></a>
                                    </div>
                                </h4>
                            </td>
                            <td>
                                <h4 class="ui image header">
                                    <div class="content">
                                        <?= $grados_item['edad'] ?>
                                    </div>
                                </h4>
                            </td>
                            <td>
                                <h4 class="ui image header">
                                    <div class="content">
                                        <?= $grados_item['orden'] ?>
                                    </div>
                                </h4>
                            </td>
                            <td>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="activo" id="activo" value="1" <?= ($grados_item['activo'] == '1') ? 'checked' : '' ?> disabled>
                                    <label></label>
                                </div>
                            </td>
                            <td>
                                <?php
                                    $item_eliminar = 'grado: ' . $grados_item['nom_grado'] . ' ' . $grados_item['edad'] ;
                                    $action = site_url("grado/eliminar/") . $grados_item['id_grado'];
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

<script type="text/javascript">
$(document).ready( function () {
    $('#tbl_grados').DataTable( {
        order: [ [1, 'asc'], [2, 'asc'] ],
        responsive: true,
        language: {
            url: '<?=base_url()?>assets/js/es-MX.json',
        },
    });
});
</script>

