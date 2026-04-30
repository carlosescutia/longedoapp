<div class="ui violet segment">
    <div class="ui grid">
        <div class="eight wide column">
            <div class="ui horizontal list">
                <?php if ( $usuario_asiste ): ?>
                    <div class="item">
                        <div class="ui green label">
                            <i class="check icon"></i>Confirmaste asistencia
                        </div>
                    </div>
                    <div class="item">
                        <form class="ui form" method="post" action="/evento/cancelar" id="frm_evento_cancelar">
                            <input type="hidden" name="id_evento" id="id_evento" value="<?= $evento['id_evento'] ?>">
                            <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $userdata['id_usuario'] ?>">
                            <?php
                                $mensaje = '¿Estás seguro de cancelar la asistencia al evento?' ;
                                $forma = '#frm_evento_cancelar';
                            ?>
                            <a href="#" onclick="confirm_action('<?=$mensaje?>','<?=$forma?>')"><span class="ui red text">Cancelar</span></a>
                        </form>
                    </div>
                <?php else: ?>
                    <?php if ( $perfil_completo ): ?>
                        <div class="item">
                            <form class="ui form" method="post" action="/evento/asistir" id="frm_evento_asistir">
                                <input type="hidden" name="id_evento" id="id_evento" value="<?= $evento['id_evento'] ?>">
                                <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $userdata['id_usuario'] ?>">
                                <a href="#" id="btn_evento_asistir">Quiero asistir al evento!</a>
                            </form>
                        </div>
                    <?php else: ?>
                        <div class="item">
                            <a href="<?= site_url('perfil') ?>">Completa tu perfil para poder registrarte a eventos y evaluaciones</a>
                        </div>
                    <?php endif ?>
                <?php endif ?>
            </div>
        </div>
        <?php if ( $usuario_asiste ): ?>
            <div class="eight wide column">
                <div class="ui horizontal list">
                    <?php if ( $usuario_evalua ): ?>
                        <?php if ( $evaluacion_disponible ): ?>
                            <div class="item">
                                <div class="ui purple label">
                                    <i class="check icon"></i>Estás inscrito para evaluación
                                </div>
                            </div>
                            <div class="item">
                                <form class="ui form" method="post" action="/evaluacion/cancelar" id="frm_evaluacion_cancelar">
                                    <input type="hidden" name="id_evento" id="id_evento" value="<?= $evento['id_evento'] ?>">
                                    <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $userdata['id_usuario'] ?>">
                                    <?php
                                        $mensaje = '¿Estás seguro de cancelar tu evaluación?' ;
                                        $forma = '#frm_evaluacion_cancelar';
                                    ?>
                                    <a href="#" onclick="confirm_action('<?=$mensaje?>','<?=$forma?>')"><span class="ui red text">Cancelar</span></a>
                                </form>
                            </div>
                        <?php endif ?>
                    <?php else: ?>
                        <?php if ( $evaluacion_disponible and ! $evaluacion_pendiente ): ?>
                            <div class="item">
                                <form class="ui form" method="post" action="/evaluacion/asistir" id="frm_evaluacion_asistir">
                                    <input type="hidden" name="id_evento" id="id_evento" value="<?= $evento['id_evento'] ?>">
                                    <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $userdata['id_usuario'] ?>">
                                    <a href="#" id="btn_evaluacion_asistir">Quiero hacer mi evaluación</a>
                                </form>
                            </div>
                        <?php endif ?>
                    <?php endif ?>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>
<script>
    $(document).ready( function() {
    });

    $('#btn_evento_asistir').click( function() {
        $('#frm_evento_asistir').submit();
    });

    $('#btn_evaluacion_asistir').click( function() {
        $('#frm_evaluacion_asistir').submit();
    });
</script>
