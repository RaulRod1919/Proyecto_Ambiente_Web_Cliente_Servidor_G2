document.addEventListener("DOMContentLoaded", function(){

    function limpiar(){
        $("input").val("");
    }

    function categorias(){
        $.get("router.php?action=getCategorias", function(respuesta){
        let categorias;
        for(let i = 0; i < respuesta.categorias.length; i++){
            categorias = respuesta.categorias[i];
            $("#categorias").append("<option value='"+categorias[0]+"'>"+categorias[1]+"</option>");
        }
        }, "json");
    }
    categorias();

    function provincias(){
        $.get("router.php?action=getProvincias", function(respuesta){
            console.log(respuesta);
            let provincias;
            for(let i = 0; i < respuesta.provincias.length; i++){
                provincias = respuesta.provincias[i];
                $("#provincias").append("<option value='"+provincias[0]+"'>"+provincias[1]+"</option>");
            }
        }, "json");
    }
    provincias();

    $("#provincias").on("change", function(){
        $.get("router.php?action=getCantonesProvincia&provincia=" + $("#provincias").val(), function(respuesta){
            console.log(respuesta);
            $("#cantones").html("");
            let cantones;
            for(let i = 0; i < respuesta.cantones.length; i++){
                cantones = respuesta.cantones[i];
                $("#cantones").append("<option value='"+cantones[0]+"'>"+cantones[2]+"</option>");
            }
        }, "json");
    });

    $("#reporte").on("submit", function(event){
        event.preventDefault();
        let idUsuario = $("#idUsuario").val();
        let idCategoria = $("#categorias").val();
        let titulo = $("#titulo").val();
        let descripcion = $("#descripcion").val();
        let estado = $("#estado").val();
        let prioridad = $("#prioridad").val();
        let idCanton = $("#cantones").val();
        $.post("router.php?action=saveReport", {idUsuario : idUsuario, idCategoria : idCategoria, titulo : titulo,
            descripcion : descripcion, estado : "N/D", prioridad : "N/D", idCanton : idCanton}, function(respuesta){
                if(respuesta.succes){
                    limpiar();
                    alert(respuesta.succes);
                }else{
                    limpiar();
                    alert(respuesta.error);
                }
        }, "json");
    });

    $("#user").on("submit", function(event){
        event.preventDefault();
        let nombre = $("#nombre").val();
        let apellido1 = $("#appellido1").val();
        let apellido2 = $("#apellido2").val();
        let correo = $("#correo").val();
        let password = $("#password").val();
        let idCanton = $("#cantones").val();
        $.post("router.php?action=saveUser", {nombre: nombre, apellido1: apellido1, apellido2: apellido2, correo: correo, password: password,
            rol : "User",idCanton: idCanton}, function(respuesta){
                if(respuesta.succes){
                    limpiar();
                    alert(respuesta.succes + " ,favor inciar sesión");
                }else{
                    limpiar();
                    alert(respuesta.error);
                }
        }, "json");
    });

    $("#inicioSesion").on("click", function(){
        $("#popup2").css("display", "flex");
    });

    $("#cerrar2").on("click", function(){
        $("#popup2").css("display", "none");
    });

    $("#login").on("submit", function(e){
        e.preventDefault();
        let correo = $("#correo2").val();
        let password = $("#password2").val();
        $.post("router.php?action=load",{correo : correo, password : password},function(respuesta){
            if(respuesta.succes){
                    limpiar();
                    alert(respuesta.succes);
                }else{
                    limpiar();
                    alert(respuesta.error);
                }
        }, "json");
    });
});
