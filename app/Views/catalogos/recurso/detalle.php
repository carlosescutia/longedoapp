<div class="ui container">
    <div class="ui stackable grid">
        <div class="row">
            <div class="twelve wide column">
                <div class="ui grid">
                    <div class="row">
                        <div class="eight wide column">
                            <h1 class="ui header">Editar recurso</h1>
                        </div>
                        <div class="eight wide right aligned column">
                            <button class="ui primary button" type="submit" form="frm_recurso">Guardar</button>
                        </div>
                    </div>
                </div>

                <div class="ui basic segment">
                    <form class="ui form" method="post" action="/recurso/guardar" id="frm_recurso">
                        <div class="fields">
                            <div class="eight wide field">
                                <label>Nombre</label>
                                <input type="text" name="nom_recurso" id="nom_recurso" value="<?=$recurso['nom_recurso']?>">
                            </div>
                            <div class="four wide field">
                                <label>Url</label>
                                <input type="text" name="url" id="url" value="<?=$recurso['url']?>">
                            </div>
                            <div class="four wide field">
                                <label>Activo</label>
                                <div class="ui toggle checkbox">
                                    <input type="checkbox" name="activo" id="activo" value="1" <?= ($recurso['activo'] == '1') ? 'checked' : '' ?> >
                                    <label></label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_recurso" id="id_recurso" value="<?=$recurso['id_recurso']?>">

                        <div class="ui error message"></div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="ui basic segment">
                <a class="ui basic button" href="<?= site_url('recurso') ?>">Volver</a>
            </div>
        </div>
    </div>
</div>

<script>
$('.ui.form')
    .form({
        fields: {
            nom_recurso: {
                rules: [
                    {
                        type   : 'notEmpty',
                        prompt : 'Nombre no puede estar vacio'
                    }
                ]
            },
            url: {
                rules: [
                    {
                        type   : 'notEmpty',
                        prompt : 'url no puede estar vacio'
                    }
                ]
            },
        }
    })
;
</script>

