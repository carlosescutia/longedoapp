<div class="ui container">
    <div class="row">
        <div class="ui container">
            <div class="row">
                <h1 class="ui header">Asistentes al evento <?=$evento['nom_evento']?></h1>
            </div>
            <div class="row no-print">
                <div class="ui right aligned basic segment">
                    <?php $id_evento = $evento['id_evento'] ?>
                    <a class="ui mini button" href="<?= site_url('reportes/asistentes_evento/' . $id_evento . '/csv') ?>">Exportar</a>
                    <a class="ui mini button" href="javascript:window.print()">Generar pdf</a>
                </div>
            </div>

            <div class="row">
                <div class="sixteen wide column">
                    <table id="tbl_asistentes" class="ui very basic striped unstackable table">
                        <thead>
                            <tr>
                                <th data-priority="1">Nombre capoeira / usuario</th>
                                <th data-priority="1">Tipo</th>
                                <th data-priority="1">Sexo</th>
                                <th data-priority="1">Edad</th>
                                <th data-priority="1">Talla</th>
                                <th data-priority="1">Nota</th>
                                <th data-priority="1">Código</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($asistentes as $asistentes_item): ?>
                                <tr>
                                    <td>
                                        <h4 class="ui image header">
                                            <div class="content">
                                                <?= $asistentes_item['nom_capoeira'] ?>
                                                <div class="sub header"><?=$asistentes_item['nom_usuario']?></div>
                                            </div>
                                        </h4>
                                    </td>
                                    <td>
                                        <?=$asistentes_item['tipo']?>
                                    </td>
                                    <td>
                                        <?=$asistentes_item['sexo']?>
                                    </td>
                                    <td>
                                        <?=$asistentes_item['edad']?>
                                    </td>
                                    <td>
                                        <?=$asistentes_item['nom_talla']?>
                                    </td>
                                    <td>
                                        <?=$asistentes_item['nota']?>
                                    </td>
                                    <td>
                                        <?=$asistentes_item['codigo']?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="ui basic segment">
            <a class="ui basic button" href="<?= site_url('evento/detalle/' . $id_evento) ?>">Volver</a>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready( function () {
    $('#tbl_asistentes').DataTable( {
        order: [ [1, 'desc'], [0, 'asc'] ],
        responsive: true,
        language: {
            url: '<?=base_url()?>assets/js/es-MX.json',
        },
    });
});
</script>

