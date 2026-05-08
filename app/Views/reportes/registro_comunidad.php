<div class="ui container">
    <div class="row">
        <div class="ui center aligned container">
            <div class="row no-print">
                <div class="ui right aligned basic segment">
                    <a class="ui mini button" href="javascript:window.print()">Imprimir</a>
                </div>
            </div>
            <div class="row">
                <h1 class="ui header">Registro de alumno a la comunidad <?= $comunidad['nom_comunidad'] ?></h1>
            </div>
            <div class="ui hidden divider"></div>
            <div class="row">
                <div class="ui centered grid">
                    <div class="ten wide column">
                        <p>Escanea el código QR con tu teléfono, llena la forma de registro utilizando el código de autorización de la parte inferior de esta página.</p>
                        <p>El mentor de tu comunidad activará tu cuenta y podrás acceder a la aplicación en la siguiente dirección:</p>
                    </div>
                    <div class="three wide column">
                        <img class="ui centered fluid image" src="/assets/img/logotipo.png">
                    </div>
                </div>
            </div>
            <p><?= site_url() ?></p>

            <div class="ui hidden section divider"></div>

            <div class="row">
                <div class="ui centered grid">
                    <div class="ten wide column">
                        <img class="ui fluid image" src="data:image/png;base64, <?= base64_encode($qr) ?>">
                    </div>
                    <div class="sixteen wide center aligned centered column">
                        <p><?= site_url('registro_alumno/' . $comunidad['token']) ?></p>
                    </div>
                </div>
            </div>

            <div class="ui hidden section  divider"></div>

            <div class="row">
                <h2 class="ui header">Código de autorización:</h2>
                <div class="ui centered grid">
                    <div class="four wide column">
                        <div class="ui raised center aligned segment">
                            <div class="ui header">
                                <?= $comunidad['codigo'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row no-print">
        <div class="ui basic segment">
            <a class="ui basic button" href="<?= site_url() ?>">Volver</a>
        </div>
    </div>
</div>

