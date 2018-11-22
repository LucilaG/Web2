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
    //let timer = setInterval(getComentario, 2000);
}

function getComentario() {
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') - 1, url.lastIndexOf('/'));
    fetch('api/comentariosCine/' + id)
        .then(response => response.json())
        .then(jsonComentario => {
            getUser(jsonComentario);
        });
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
    let admin = false;
    console.log(jsonUsuario);
    if (jsonUsuario.length != 0) {
        admin = ((jsonUsuario[0]["admin"] == 1) ? true : false);
    }
    console.log("admin" + admin);
    let context = { // como el assign de smarty
        comentario: jsonComentario,
        titulo: "Comentarios",
        admin: admin,
    }
    let html = templateComentario(context);
    document.querySelector("#cine-container").innerHTML = html;
    setTimeout(botonEliminar, 1000);
}

function botonEliminar() {
    let b = document.querySelectorAll("#eliminarComentario");
    b.forEach(b => { b.addEventListener("click", function () { deleteComentario(b.getAttribute("data")) }) });
}

function enviarComentario() {
    var url = window.location.pathname;
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
    fetch("api/comentario/", {
        'method': 'POST',
        'headers': { 'content-type': 'application/json' },
        'body': JSON.stringify(objetoJSON)
    })
        .then(r => {
            if (r.ok) {
                r.json().then(t => {
                    console.log("Se cargo con éxito");
                    getComentario();

                })
            }
        })
};
function deleteComentario(id) {
    fetch('api/comentario/' + id, {
        'method': 'DELETE',
        'headers': { 'Content-Type': 'application/json' },
    })
        .then(r => load())
}