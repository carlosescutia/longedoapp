<div class="ui container">
    <div class="ui stackable grid">
        <div class="row">
            <div class="twelve wide column">
                <div class="row">
                    <h1 class="ui header">
                        Carga de grados
                        <a class="ui right floated primary button" href="<?= site_url('carga_grado/nuevo') ?>">Agregar</a>
                    </h1>
                </div>

                <div class="ui hidden divider"></div>

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
                                    <form class="ui form" method="post" action="/carga_grado/eliminar" id="frm_elim_carga_grado<?=$cargas_grado_item['id_evaluacion']?>">
                                        <input type="hidden" name="id_evaluacion" id="id_evaluacion" value="<?= $cargas_grado_item['id_evaluacion'] ?>" >
                                        <input type="hidden" name="url_actual" id="url_actual" value="<?= site_url('carga_grado') ?>">
                                        <?php
                                            $mensaje = '¡Se eliminará la carga de grados!<br>¿Está seguro?' ;
                                            $forma = '#frm_elim_carga_grado' . $cargas_grado_item['id_evaluacion'] ;
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
