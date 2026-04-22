<div class="ui container">
    <div class="ui stackable grid">
        <div class="row">
            <div class="twelve wide column">
                <div class="ui grid">
                    <div class="row">
                        <div class="eight wide column">
                            <h1 class="ui header">Carga de grados</h1>
                        </div>
                        <div class="eight wide right aligned column">
                            <form class="ui form" method="post" action="/carga_grado/nuevo">
                                <button class="ui primary button">Agregar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ui hidden divider"></div>

        <div class="row">
            <div class="twelve wide column">
                <table class="ui celled unstackable big table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Alumnos</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cargas_grado as $cargas_grado_item): ?>
                            <tr>
                                <td>
                                    <?php
                                        $fmt = datefmt_create(
                                            'es_MX',
                                            IntlDateFormatter::NONE,
                                            IntlDateFormatter::NONE,
                                            null,
                                            IntlDateFormatter::GREGORIAN,
                                            'EEEE dd/MMM/yy'
                                        );
                                        $fecha = strtotime($cargas_grado_item['fecha']);
                                    ?>
                                    <a href="<?=site_url('carga_grado/aplicar/')?><?=$cargas_grado_item['id_evaluacion']?>"><?= ucfirst(datefmt_format($fmt, $fecha)) ?></a>
                                </td>
                                <td><?= $cargas_grado_item['edad'] ?></td>
                                <td>
                                    <?php if ( $cargas_grado_item['status'] == 'cerrado' ): ?>
                                        <?php
                                            $mensaje = '¿Cambiar status de la carga a En proceso?' ;
                                            $forma = '#frm_status';
                                        ?>
                                        <form class="ui form" method="post" action="/carga_grado/actualizar_status" id="frm_status">
                                            <input type="hidden" name="id_evaluacion" value="<?= $cargas_grado_item['id_evaluacion'] ?>">
                                            <input type="hidden" name="status" value="proceso">
                                        </form>
                                        <a href="#" onclick="confirm_action('<?=$mensaje?>','<?=$forma?>')" >
                                    <?php endif ?>
                                    <?= $cargas_grado_item['status'] ?>
                                    <?php if ( $cargas_grado_item['status'] == 'cerrado' ): ?>
                                        </a>
                                    <?php endif ?>
                                </td>
                                <td class="center aligned">
                                    <?php
                                        $item_eliminar = '¡Se eliminará la carga de grados!<br>¿Está seguro?' ;
                                        $action = base_url("carga_grado/eliminar/") . $cargas_grado_item['id_evaluacion'];
                                    ?>
                                    <a href="#" onclick="confirm_delete('<?=$item_eliminar?>','<?=$action?>')" >
                                        <span class="ui red text"><i class="icon times circle outline"></span></i>
                                    </a>
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
