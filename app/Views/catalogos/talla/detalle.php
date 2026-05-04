<div class="ui container">
    <div class="ui stackable grid">
        <div class="row">
            <div class="twelve wide column">
                <div class="ui grid">
                    <div class="row">
                        <div class="eight wide column">
                            <h1 class="ui header">Editar talla</h1>
                        </div>
                        <div class="eight wide right aligned column">
                            <button class="ui primary button" type="submit" form="frm_talla">Guardar</button>
                        </div>
                    </div>
                </div>

                <div class="ui basic segment">
                    <form class="ui form" method="post" action="/talla/guardar" id="frm_talla">
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Nombre</label>
                                <input type="text" name="nom_talla" id="nom_talla" value="<?=$talla['nom_talla']?>">
                            </div>
                            <div class="five wide field">
                                <label>Edad</label>
                                <div class="ui selection dropdown" id="dp_edad">
                                    <input type="hidden" name="edad" id="edad" value="<?=$talla['edad']?>">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Edad</div>
                                    <div class="menu">
                                        <div class="item" data-value="niño">Niño</div>
                                        <div class="item" data-value="adulto">Adulto</div>
                                    </div>
                                </div>
                            </div>
                            <div class="four wide field">
                                <label>Orden</label>
                                <input type="text" name="orden" id="orden" value="<?=$talla['orden']?>">
                            </div>
                            <div class="four wide field">
                                <label>Activo</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="activo" id="activo" value="1" <?= ($talla['activo'] == '1') ? 'checked' : '' ?> >
                                    <label></label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_talla" id="id_talla" value="<?=$talla['id_talla']?>">

                        <div class="ui error message"></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="ui basic segment">
                <a class="ui basic button" href="<?= site_url('talla') ?>">Volver</a>
            </div>
        </div>
    </div>
</div>

<script>
$('.ui.form')
    .form({
        fields: {
            nom_talla: {
                rules: [
                    {
                        type   : 'notEmpty',
                        prompt : 'Nombre no puede estar vacio'
                    }
                ]
            },
            ciudad: {
                rules: [
                    {
                        type   : 'notEmpty',
                        prompt : 'Ciudad no puede estar vacio'
                    }
                ]
            },
        }
    })
;
</script>

