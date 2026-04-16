<div class="ui segment">
    <h4 class="ui header">Administración del evento</h4>
    <div class="ui hidden divider"></div>
    <div class="ui list">
        <div class="item"><a href="<?= site_url('evento/editar/')?><?=$evento['id_evento']?>">Editar información</a></div>
        <div class="item"><a href="<?= site_url('reportes/asistentes_evento/')?><?=$evento['id_evento']?>">Lista de asistentes</a></div>

        <div class="ui divider"></div>

        <div class="item">
            <?php
                $item_eliminar = '¡Se eliminará el evento ' . $evento['nom_evento'] . ' y sus evaluaciones!<br>¿Está seguro de eliminarlo?' ;
                $action = base_url("evento/eliminar/") . $evento['id_evento'];
            ?>
            <a href="#" onclick="confirm_delete('<?=$item_eliminar?>','<?=$action?>')">
                <span class="ui red text">Eliminar evento</span>
            </a>
        </div>
    </div>
</div>
