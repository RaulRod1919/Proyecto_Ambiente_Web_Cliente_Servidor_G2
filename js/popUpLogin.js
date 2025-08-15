document.addEventListener("DOMContentLoaded", function(){
    let abrirLogin = document.getElementById("btnLogin");
    let cerrarLogin = document.getElementById("cerrarLogin");
    let popupLogin = document.getElementById("popupLogin");

    // Abrir popup de login
    abrirLogin.addEventListener("click", function() {
        popupLogin.style.display = "flex";
    });

    // Cerrar popup de login
    cerrarLogin.addEventListener("click", function() {
        popupLogin.style.display = "none";
    });
});
