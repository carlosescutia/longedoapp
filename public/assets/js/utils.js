function confirm_delete(item, action) {
    $.modal({
        title: 'Confirme que desea eliminar',
        class: 'tiny',
        closeIcon: false,
        content: item,
        actions: [
            {
                text: 'Eliminar',
                class: 'red',
                click: function () {
                    window.location.replace(action);
                }
            },
            {
                text: 'Cancelar',
                class: 'black'
            },
        ],
    }).modal('show');
}

function confirm_file_delete(item, frm_eliminar) {
    $.modal({
        title: 'Confirme que desea eliminar',
        class: 'tiny',
        closeIcon: false,
        content: item,
        actions: [
            {
                text: 'Eliminar',
                class: 'red',
                click: function () {
                    $(frm_eliminar).submit();
                }
            },
            {
                text: 'Cancelar',
                class: 'black'
            },
        ],
    }).modal('show');
}

function confirm_enviar(mensaje, forma) {
    $.modal({
        title: 'Confirme la acción',
        class: 'tiny',
        closeIcon: false,
        content: mensaje,
        actions: [
            {
                text: 'Confirmar',
                class: 'orange',
                click: function () {
                    $(forma).submit();
                }
            },
            {
                text: 'Cancelar',
                class: 'black'
            },
        ],
    }).modal('show');
}
