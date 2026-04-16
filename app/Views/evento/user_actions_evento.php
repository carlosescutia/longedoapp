<div class="ui violet segment">
    <div class="ui horizontal list">
        <?php if ( $asiste ): ?>
            <div class="item">
                <div class="ui green label">
                    <i class="check icon"></i>Confirmaste asistencia
                </div>
            </div>
            <div class="item">
                <form class="ui form" method="post" action="/evento/cancelar" id="frm_cancelar">
                    <input type="hidden" name="id_evento" id="id_evento" value="<?= $evento['id_evento'] ?>">
                    <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $userdata['id_usuario'] ?>">
                    <a href="#" id="btn_cancelar"><span class="ui red text">Cancelar</span></a>
                </form>
            </div>
        <?php else: ?>
            <form class="ui form" method="post" action="/evento/asistir" id="frm_asistir">
                <input type="hidden" name="id_evento" id="id_evento" value="<?= $evento['id_evento'] ?>">
                <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $userdata['id_usuario'] ?>">
                <a href="#" id="btn_asistir">Asistiré al evento!</a>
            </form>
        <?php endif ?>
    </div>
</div>

