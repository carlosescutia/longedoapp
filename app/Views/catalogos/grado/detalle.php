<div class="ui container">
    <div class="ui stackable grid">
        <div class="row">
            <div class="twelve wide column">
                <div class="ui grid">
                    <div class="row">
                        <div class="eight wide column">
                            <h1 class="ui header">Editar grado</h1>
                        </div>
                        <div class="eight wide right aligned column">
                            <button class="ui primary button" type="submit" form="frm_grado">Guardar</button>
                        </div>
                    </div>
                </div>

                <div class="ui basic segment">
                    <form class="ui form" method="post" action="/grado/guardar" id="frm_grado">
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Nombre</label>
                                <input type="text" name="nom_grado" id="nom_grado" value="<?=$grado['nom_grado']?>">
                            </div>
                            <div class="five wide field">
                                <label>Edad</label>
                                <div class="ui selection dropdown" id="dp_edad">
                                    <input type="hidden" name="edad" id="edad" value="<?=$grado['edad']?>">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Edad</div>
                                    <div class="menu">
                                        <div class="item" data-value="niño">Niño</div>
                                        <div class="item" data-value="adulto">Adulto</div>
                                        <div class="item" data-value="adulto_mayor">Adulto mayor</div>
                                    </div>
                                </div>
                            </div>
                            <div class="four wide field">
                                <label>Iniciales</label>
                                <input type="text" name="iniciales" id="iniciales" value="<?=$grado['iniciales']?>">
                            </div>
                        </div>
                        <div class="fields">
                            <div class="four wide field">
                                <label>Color</label>
                                <input type="text" name="color" id="color" value="<?=$grado['color']?>">
                            </div>
                            <div class="four wide field">
                                <label>Orden</label>
                                <input type="text" name="orden" id="orden" value="<?=$grado['orden']?>">
                            </div>
                            <div class="four wide field">
                                <label>Activo</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="activo" id="activo" value="1" <?= ($grado['activo'] == '1') ? 'checked' : '' ?> >
                                    <label></label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_grado" id="id_grado" value="<?=$grado['id_grado']?>">

                        <div class="ui error message"></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="ui basic segment">
                <a class="ui basic button" href="<?= site_url('grado') ?>">Volver</a>
            </div>
        </div>
    </div>
</div>

<script>
$('.ui.form')
    .form({
        fields: {
            nom_grado: {
                identifier: 'nom_grado',
                rules: [
                    {
                        type   : 'notEmpty',
                        prompt : 'Nombre no puede estar vacio'
                    }
                ]
            },
            edad: {
                identifier: 'edad',
                rules: [
                    {
                        type   : 'notEmpty',
                        prompt : 'Edad no puede estar vacio'
                    }
                ]
            },
            orden: {
                identifier: 'orden',
                rules: [
                    {
                        type   : 'notEmpty',
                        prompt : 'Orden no puede estar vacio'
                    }
                ]
            },
        }
    })
;
</script>

