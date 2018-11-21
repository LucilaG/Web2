'use strict'
let templateComentario;


fetch('js/templates/comentariosCine.handlebars')
    .then(response => response.text())
    .then(template => {
        templateComentario = Handlebars.compile(template);
        getComentario();
    });


function getComentario() {
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);
    fetch('api/comentario/' + id)
        .then(response => response.json())
        .then(jsonComentario => {
            mostrarComentario(jsonComentario);
            console.log(jsonComentario);
        })
}

function mostrarComentario(jsonComentario) {
    let context = { // como el assign de smarty
        comentario: jsonComentario,
        titulo: "Comentarios"
    }
    let html = templateComentario(context);
    document.querySelector("#cine-container").innerHTML = html;
}
