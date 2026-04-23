<div class="ui container">
    <div class="row">
        <div class="ui container">
            <div class="row">
                <h1 class="ui header">Playeras del evento <?=$evento['nom_evento']?></h1>
            </div>
            <div class="row no-print">
                <div class="ui right aligned basic segment">
                    <?php $id_evento = $evento['id_evento'] ?>
                    <a class="ui mini button" href="<?= site_url('reportes/playeras_evento/' . $id_evento . '/csv') ?>">Exportar</a>
                    <a class="ui mini button" href="javascript:window.print()">Imprimir</a>
                </div>
            </div>

            <div class="ui hidden divider"></div>

            <div class="row">
                <div class="ui grid">
                    <div class="twelve wide column">
                        <table class="ui very basic striped unstackable big table">
                            <thead>
                                <tr>
                                    <th data-priority="1">Edad</th>
                                    <th data-priority="1">Tamaño</th>
                                    <th data-priority="1">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($playeras_evento as $playeras_evento_item): ?>
                                    <tr>
                                        <td>
                                            <?=$playeras_evento_item['edad']?>
                                        </td>
                                        <td>
                                            <?=$playeras_evento_item['nom_talla']?>
                                        </td>
                                        <td>
                                            <?=$playeras_evento_item['cantidad']?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="ui basic segment no-print">
            <a class="ui basic button" href="<?= site_url('evento/detalle/' . $id_evento) ?>">Volver</a>
        </div>
    </div>
</div>
