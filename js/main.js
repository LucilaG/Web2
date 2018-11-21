'use strict'
let templateComentario;

document.addEventListener("DOMContentLoaded", load);

function load() {
    fetch('js/templates/comentariosCine.handlebars')
        .then(response => response.text())
        .then(template => {
            templateComentario = Handlebars.compile(template);
            getComentario();

        });
    let enviar = document.querySelector('#enviarComentario');
    enviar.addEventListener('click', enviarComentario);

}


function enviarBoton() {
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);
    if (id != null) {
        document.querySelector('#eliminarComentario').addEventListener('click', e => {
            e.preventDefault();
            deleteComentario()
        });
    }
}

function getComentario() {
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') - 1, url.lastIndexOf('/'));
    fetch('api/comentariosCine/' + id)
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
    let id = url.substring(url.lastIndexOf('/') + 1);
    let comentario = document.querySelector('#comentario').value;
    let puntaje = document.querySelector('#puntaje').value;
    let id_cine = url.substring(url.lastIndexOf('/') - 1, url.lastIndexOf('/'));
    let objetoJSON = {
        "id": id,
        "comentario": comentario,
        "puntaje": puntaje,
        "id_cine": id_cine
    }
    console.log(objetoJSON);
    fetch("api/comentario/", {
        'method': 'POST',
        'headers': { 'content-type': 'application/json' },
        'body': JSON.stringify(objetoJSON)
    })
        .then(r => {
            if (r.ok) {
                r.json().then(t => {
                    console.log("Se cargo con éxito");
                    getComentarios();

                })
            }
        })
};

function deleteComentario() {
    let id = document.querySelector('#eliminarComentario').value;
    console.log("valor boton" + id);
    fetch('api/comentario/' + id, {
        "method": 'Delete',
        "headers": {
            'Content-Type': 'application/json'
        }
    }).then(response => response.json())
        .catch(function (e) {
            console.log(e)
        });
}