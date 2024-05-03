let estado = document.querySelectorAll(".estado");

for(let i=0;i<estado.length;i++){
    if(estado[i].textContent=="pendiente"){
        estado[i].style.backgroundColor="rgb(236, 206, 32)";
        estado[i].style.color="white";
        estado[i].textContent=estado[i].textContent.toUpperCase();
    }else if(estado[i].textContent=="aceptada"){
        estado[i].style.backgroundColor="green";
        estado[i].style.color="white";
        estado[i].textContent=estado[i].textContent.toUpperCase();
    }else if(estado[i].textContent=="rechazada"){
        estado[i].style.backgroundColor="red";
        estado[i].style.color="white";
        estado[i].textContent=estado[i].textContent.toUpperCase();
    }
}

