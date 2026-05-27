<div class="ui segment">
    <h4 class="ui header">Administración de la roda</h4>
    <div class="ui hidden divider"></div>
    <div class="ui list">
        <?php if ($error_adm): ?>
            <div class="ui negative mini message transition">
                <i class="close icon"></i>
                <div class="header">
                    Error
                </div>
                <p><?= $error_adm ?></p>
            </div>
        <?php endif ?>
        <div class="item"><a href="<?= site_url('roda/editar/')?><?=$roda['id_roda']?>">Editar información</a></div>

        <div class="ui section divider"></div>

        <div class="item">
            <form class="ui form" method="post" action="/roda/eliminar" id="frm_elim_roda">
                <input type="hidden" name="id_roda" id="id_roda" value="<?= $roda['id_roda'] ?>" >
                <input type="hidden" name="url_actual" id="url_actual" value="<?= site_url('roda/detalle/'.$roda['id_roda']) ?>">
                <?php
                    $mensaje = '¡Se eliminará la roda <strong>' . $roda['nom_roda'] . '</strong> y sus evaluaciones!<br>¿Está seguro de eliminarlo?' ;
                    $forma = '#frm_elim_roda' ;
                ?>
                <a href="#" onclick="confirm_action('<?=$mensaje?>','<?=$forma?>')" ><span class="ui red text">Eliminar roda</span></a>
            </form>
        </div>
    </div>
</div>

