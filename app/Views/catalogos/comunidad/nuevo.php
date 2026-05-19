<div class="ui container">
    <div class="ui stackable grid">
        <div class="row">
            <div class="twelve wide column">
                <div class="row">
                    <h1 class="ui header">
                        Tallas
                        <button class="ui right floated primary button" type="submit" form="frm_comunidad">Guardar</button>
                    </h1>
                </div>

                <div class="ui basic segment">
                    <form class="ui form" method="post" action="/comunidad/guardar" id="frm_comunidad">
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Nombre</label>
                                <input type="text" name="nom_comunidad" id="nom_comunidad">
                            </div>
                            <div class="four wide field">
                                <label>Ciudad</label>
                                <input type="text" name="ciudad" id="ciudad">
                            </div>
                            <div class="four wide field">
                                <label>Activo</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="activo" id="activo" value="1">
                                    <label></label>
                                </div>
                            </div>
                        </div>

                        <div class="ui error message"></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="ui basic segment">
                <a class="ui basic button" href="<?= site_url('comunidad') ?>">Volver</a>
            </div>
        </div>
    </div>
</div>

<script>
$('.ui.form')
    .form({
        fields: {
            nom_comunidad: {
                rules: [
                    {
                        type   : 'notEmpty',
                        prompt : 'Nombre no puede estar vacio'
                    }
                ]
            },
            valor: {
                rules: [
                    {
                        type   : 'notEmpty',
                        prompt : 'Valor no puede estar vacio'
                    }
                ]
            },
        }
    })
;
</script>
