<div class="ui container">
    <div class="ui stackable grid">
        <div class="row">
            <div class="twelve wide column">
                <div class="ui grid">
                    <div class="row">
                        <div class="eight wide column">
                            <h1 class="ui header">Agregar parametro sistema</h1>
                        </div>
                        <div class="eight wide right aligned column">
                            <button class="ui primary button" type="submit" form="frm_parametro_sistema">Guardar</button>
                        </div>
                    </div>
                </div>

                <div class="ui basic segment">
                    <form class="ui form" method="post" action="/parametro_sistema/guardar" id="frm_parametro_sistema">
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Nombre</label>
                                <input type="text" name="nom_parametro_sistema" id="nom_parametro_sistema">
                            </div>
                            <div class="four wide field">
                                <label>Valor</label>
                                <input type="text" name="valor" id="valor">
                            </div>
                        </div>

                        <div class="ui error message"></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="ui basic segment">
                <a class="ui basic button" href="<?= site_url('parametro_sistema') ?>">Volver</a>
            </div>
        </div>
    </div>
</div>

<script>
$('.ui.form')
    .form({
        fields: {
            nom_parametro_sistema: {
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
