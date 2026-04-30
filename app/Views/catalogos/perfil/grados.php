<h1 class="ui header right aligned">Grados</h1>

<div class="ui green segment">
    <table class="ui celled unstackable tiny table">
        <thead>
            <tr>
                <th>nombre</th>
                <th>edad</th>
                <th>fecha</th>
                <th>evento</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($grados as $grados_item): ?>
                <tr>
                    <td><?= $grados_item['nom_grado'] ?></td>
                    <td><?= $grados_item['edad'] ?></td>
                    <?php
                        $fmt = datefmt_create(
                            'es_MX',
                            IntlDateFormatter::NONE,
                            IntlDateFormatter::NONE,
                            null,
                            IntlDateFormatter::GREGORIAN,
                            'ddMMMyy'
                        );
                        $fecha = strtotime($grados_item['fecha']);
                    ?>
                    <td><?= datefmt_format($fmt, $fecha) ?></td>
                    <td><?= $grados_item['nom_evento'] == '' ? 'carga de grado' : $grados_item['nom_evento'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

