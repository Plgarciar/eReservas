// let aInstalacion = document.querySelector("#anadirInstalacion");
// let contenedor=document.querySelector("main");

// const ventanaEmergente=()=>{
//     const div=document.createElement("div");
//     div.id="modal";

//     const cerrar=document.createElement("button")
    
//     contenedor.appendChild(div)
//     div.appendChild(cerrar)
// }

// const cerrarVentana=()=>{
//     const div=document.createElement("div");
//     div.id="modal";

//     const cerrar=document.createElement("button")
    
//     contenedor.appendChild(div)
//     div.appendChild(cerrar)
// }

// aInstalacion.addEventListener("click", ventanaEmergente);


let estado = document.querySelectorAll(".estado");

for(let i=0;i<estado.length;i++){
    if(estado[i].textContent=="pendiente"){
        estado[i].style.backgroundColor="rgb(236, 206, 32)";
        estado[i].style.color="white";
    }else if(estado[i].textContent=="aceptada"){
        estado[i].style.backgroundColor="green";
        estado[i].style.color="white";
    }else if(estado[i].textContent=="rechazada"){
        estado[i].style.backgroundColor="red";
        estado[i].style.color="white";
    }
}