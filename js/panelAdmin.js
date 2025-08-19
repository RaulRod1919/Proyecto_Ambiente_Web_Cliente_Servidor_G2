document.addEventListener("DOMContentLoaded", function(){

    $("#gestionUser").on("click", function(){
        $("#popup").css("display", "flex");
    });

    $("#cerrar").on("click", function(){
        $("#popup").css("display", "none");
    });

    function limpiar(){
        $("input").val("");
    }

    $("#setRol").on("submit", function(e){
        e.preventDefault();
        let correo = $("#correo").val();
        let password = $("#password").val();
        let rol = $("#rol").val();
        $.post("router.php?action=setRol", {correo : correo, password : password, rol : rol}, function(respuesta){
            if(respuesta.succes){
                alert(respuesta.succes);
            }else{
                alert(respuesta.error);
            }
            limpiar();
            $("#popup").css("display", "none");
        }, "json");
    })

});