let aInstalacion = document.querySelector("#anadirInstalacion");
let contenedor=document.querySelector("main");

const ventanaEmergente=()=>{
    const div=document.createElement("div");
    div.id="modal";

    const cerrar=document.createElement("button")
    
    contenedor.appendChild(div)
    div.appendChild(cerrar)
}

const cerrarVentana=()=>{
    const div=document.createElement("div");
    div.id="modal";

    const cerrar=document.createElement("button")
    
    contenedor.appendChild(div)
    div.appendChild(cerrar)
}

// aInstalacion.addEventListener("click", ventanaEmergente);