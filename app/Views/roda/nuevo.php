<div class="ui container">
    <div class="ui stackable centered grid">
        <div class="row">
            <div class="eight wide column">
                <div class="ui grid">
                    <div class="row">
                        <div class="eight wide column">
                            <h1 class="ui header">Nueva roda</h1>
                        </div>
                        <div class="eight wide right aligned column">
                            <button class="ui primary button" type="submit" form="frm_roda">Guardar</button>
                        </div>
                    </div>
                </div>

                <div class="ui green segment">
                    <div class="ui centered grid">
                        <div class="row">
                            <div class="twelve wide column">
                                <form class="ui form" method="post" action="/roda/guardar" id="frm_roda">
                                    <div class="field">
                                        <label>Nombre de la roda</label>
                                        <input type="text" name="nom_roda" id="nom_roda">
                                    </div>
                                    <div class="fields">
                                        <div class="field">
                                            <label>Fecha</label>
                                            <input type="date" name="fecha" id="fecha">
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
<script>
$('.ui.form')
    .form({
        fields: {
            nom_roda: {
                rules: [
                    {
                        type   : 'notEmpty',
                        prompt : 'Nombre no puede estar vacio'
                    }
                ]
            },
            fecha: {
                rules: [
                    {
                        type   : 'notEmpty',
                        prompt : 'Desde no puede estar vacio'
                    }
                ]
            },
        }
    })
;
</script>
