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
                                <td><?= $cargas_grado_item['status'] ?></td>
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
