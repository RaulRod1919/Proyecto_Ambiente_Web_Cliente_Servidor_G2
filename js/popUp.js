document.addEventListener("DOMContentLoaded", function(){
    let abrirPopUp = document.getElementById("crearReporte");
    let cerrarPopUp = document.getElementById("cerrar");
    let popUp = document.getElementById("popup");

    abrirPopUp.addEventListener("click", function(){
        popUp.style.display = "flex";
    });

    cerrarPopUp.addEventListener("click", function(){
        popUp.style.display = "none";
    });
});