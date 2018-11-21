'use strict'
let templateComentario;

fetch('js/templates/comentariosCine.handlebars')
    .then(response => response.text())
    .then(template => {
        templateComentario = Handlebars.compile(template);
        getComentario();
        enviarBoton();
    });

    function enviarBoton() {
        var url = window.location.pathname;
        var id = url.substring(url.lastIndexOf('/') + 1);
        if(id != null){
            document.querySelector('#enviarComentario').addEventListener('click', e => {
                e.preventDefault();
                enviarComentario()
            });
        }
    }

function getComentario() {
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') - 1, url.lastIndexOf('/'));
    fetch('api/comentario/' + id)
        .then(response => response.json())
        .then(jsonComentario => {
            getUser(jsonComentario);
        })
}

function getUser(jsonComentario) {
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);
    fetch('api/usuario/' + id)
        .then(response => response.json())
        .then(jsonUsuario => {
            mostrarComentario(jsonComentario, jsonUsuario)
        })
}

function mostrarComentario(jsonComentario, jsonUsuario) {
    let admin = ((jsonUsuario[0]["admin"] == 1) ? true : false);
    let user = ((jsonUsuario != null) ? true : false);
    console.log(admin);
    console.log(user);
    let context = { // como el assign de smarty
        comentario: jsonComentario,
        titulo: "Comentarios",
        admin: admin,
        user: user,
    }
    let html = templateComentario(context);
    document.querySelector("#cine-container").innerHTML = html;
}

function enviarComentario() {
    var url = window.location.pathname;
    let id = url.substring(url.lastIndexOf('/') + 1);
    let comentario = document.querySelector('#comentario').value;
    let puntaje = document.querySelector('#puntaje').value;
    let id_cine = url.substring(url.lastIndexOf('/') - 1, url.lastIndexOf('/'));
    console.log("id usuario" + id);
    console.log("comen" + comentario);
    console.log("puntaje" + puntaje);
    console.log("id_cine" + id_cine);
    let objetoJSON = {
        "id": id,
        "comentario": comentario,
        "puntaje": puntaje,
        "id_cine": id_cine
    }
    console.log(objetoJSON);
    fetch("api/comentario/", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(objetoJSON)
    }).then(response =>
        getComentario()
    );
}