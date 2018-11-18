'use strict'
let templateCine;

fetch('js/templates/comentariosCine.handlebars')
.then(response => response.text())
.then(template => {
    templateCine = Handlebars.compile(template); 
    getCine();
});


function getCine() {
    fetch("cine")
    .then(response => response.json())
    .then(jsonCine => {
        mostrarCine(jsonCine);
    })
}

/*function getUser() {
    fetch("api/usuario")
    .then(response => response.json())
    .then(jsonUsuario => {
        mostrarCine(jsonUsuario);
    })
}*/

function mostrarCine(jsonCine) {
    let context = { // como el assign de smarty
        cine: jsonCine, 
        //usuario:jsonUsuario,
        titulo: "Comentarios",
    }
    let html = templateCine(context);
    document.querySelector("#cine-container").innerHTML = html;
}
