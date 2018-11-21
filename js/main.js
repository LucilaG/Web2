'use strict'
let templateComentario;

document.querySelector('#enviarComentario').addEventListener('click', e => {
    e.preventDefault();
    enviarComentario()
});

fetch('js/templates/comentariosCine.handlebars')
    .then(response => response.text())
    .then(template => {
        templateComentario = Handlebars.compile(template);
        getComentario();
    });


function getComentario() {
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') - 1,url.lastIndexOf('/'));
    fetch('api/comentario/' + id)
        .then(response => response.json())
        .then(jsonComentario => {
            mostrarComentario(jsonComentario);
            console.log(jsonComentario);
        })
}

function getUser(){
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);
    fetch('api/usuario/' + id)
    .then(response => response.json())
    .then(jsonUsuario => {
        console.log(jsonUsuario);
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

function enviarComentario() {
    let id = document.querySelector("#id").value;
    let comentario = document.querySelector('#comentario').value;
    let puntaje = document.querySelector('#puntaje').value;
    let id_cine = document.querySelector("#id_cine").value;
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