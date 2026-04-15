<div class="ui container">
    <div class="ui stackable centered grid">
        <div class="row">
            <div class="eight wide column">
                <div class="ui grid">
                    <div class="row">
                        <div class="eight wide column">
                            <h1 class="ui header">Nuevo evento</h1>
                        </div>
                        <div class="eight wide right aligned column">
                            <button class="ui primary button" type="submit" form="frm_evento">Guardar</button>
                        </div>
                    </div>
                </div>

                <div class="ui green segment">
                    <div class="ui centered grid">
                        <div class="row">
                            <div class="twelve wide column">
                                <form class="ui form" method="post" action="/evento/guardar" id="frm_evento">
                                    <div class="field">
                                        <label>Nombre del evento</label>
                                        <input type="text" name="nom_evento" id="nom_evento">
                                    </div>
                                    <div class="fields">
                                        <div class="field">
                                            <label>Desde</label>
                                            <input type="date" name="fech_ini" id="fech_ini">
                                        </div>
                                        <div class="field">
                                            <label>Hasta</label>
                                            <input type="date" name="fech_fin" id="fech_fin">
                                        </div>
                                    </div>
                                    <div class="fields">
                                        <div class="field">
                                            <label>Lugar</label>
                                            <input type="text" name="lugar" id="lugar">
                                        </div>
                                        <div class="field">
                                            <label>Ubicación</label>
                                            <input type="text" name="ubicacion" id="ubicacion">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label>Redacción</label>
                                        <textarea name="redaccion" id="redaccion"></textarea>
                                    </div>
                                    <div class="four wide field">
                                        <label>Activo</label>
                                        <div class="ui toggle checkbox">
                                            <input type="checkbox" name="activo" id="activo">
                                            <label></label>
                                        </div>
                                    </div>

                                    <div class="ui error message"></div>
                                    <input type="hidden" name="id_comunidad" id="id_comunidad" value="<?=$userdata['id_comunidad']?>">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
