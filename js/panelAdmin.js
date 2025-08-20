document.addEventListener("DOMContentLoaded", function(){

    $("#gestionUser").on("click", function(){
        $("#popup").css("display", "flex");
    });

    $("#cerrar").on("click", function(){
        $("#popup").css("display", "none");
    });

    $("#cerrar2").on("click", function(){
        $("#popup2").css("display", "none");
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

    $("#agregar").on("click", function(){
        $("#popup").css("display", "flex");
    });

    $("#crearEncuesta").on("submit", function(e){
        e.preventDefault();
        let titulo = $("#titulo").val();
        let descripcion = $("#descripcion").val();
        let likes = $("#likes").val();
        let dislikes = $("#dislikes").val();
        let idUsuario = $("#idUsuario").val();
        $.post("router.php?action=addEncuesta", {titulo : titulo, descripcion : descripcion, likes : likes, dislikes : dislikes, idUsuario : idUsuario}, function(respuesta){
            if(respuesta.succes){
                alert(respuesta.succes);
            }else{
                alert(respuesta.error);
            }
            cargar();
            limpiar();
            $("#popup").css("display", "none");
        }, "json");
    });

    function cargar(){
        $.get("router.php?action=getEncuestas", function(respuesta){
            console.log(respuesta.encuestas);
            let encuesta;
            $("#tbody").html("");
            for(let i = 0; i < respuesta.encuestas.length; i++){
                encuesta = respuesta.encuestas[i];
                $("#tbody").append("<tr class='fila' data-id='"+encuesta[0]+"'>"+
                    "<td class='columna'>"+encuesta[0]+"</td>"+
                        "<td>"+encuesta[1]+"</td>"+
                        "<td>"+encuesta[2]+"</td>"+
                        "<td>"+encuesta[3]+"</td>"+
                        "<td>"+encuesta[4]+"</td>"+
                        "<td>"+encuesta[5]+"</td>"+
                        "<td>"+
                            "<div>"+
                                "<button class='btn success p-1'>Editar</button>"+
                                "<button class='btn danger p-1'>Eliminar</button>"+
                            "</div>"+
                        "</td>"+
                    "<tr>");
            }
        }, "json");
    }
    cargar();

    $("main").on("click", ".btn.success", function(){
        let idEncuesta = $(this).closest("tr").data("id");
        /* el $(this) es para posicionar como el punter en el boton, y el closest es una funcion que lo que busca es al papa mas cercano que tenga el
         valor del closest ya ahi accedemos al data que le pusimos para almacenar el id mas facil que es una variable como propia que permite crear html */
        $.post("router.php?action=getEncuesta", {idEncuesta : idEncuesta}, function(respuesta){
            $("#popup2").css("display", "flex");
            $("#titulo2").val(respuesta.encuesta.titulo);
            $("#descripcion2").val(respuesta.encuesta.decripcion);
            $("#idEncuesta").val(respuesta.encuesta.id_encuesta);
        }, "json");
    });

    $("#actualizarEncuesta").on("submit", function(e){
        e.preventDefault();
        let titulo = $("#titulo2").val();
        let descripcion = $("#descripcion2").val();
        let idEncuesta = $("#idEncuesta").val();
        $.post("router.php?action=actualizarEncuesta", {titulo : titulo, descripcion : descripcion, idEncuesta : idEncuesta}, function(respuesta){
            if(respuesta.succes){
                alert(respuesta.succes);
            }else{
                alert(respuesta.error);
            }
            cargar();
            limpiar();
            $("#popup2").css("display", "none");
        }, "json");
    });

    $("main").on("click", ".btn.danger", function(){
        let idEncuesta = $(this).closest("tr").data("id");
        /* el $(this) es para posicionar como el punter en el boton, y el closest es una funcion que lo que busca es al papa mas cercano que tenga el
         valor del closest ya ahi accedemos al data que le pusimos para almacenar el id mas facil que es una variable como propia que permite crear html */
        $.post("router.php?action=deleteEncuesta", {idEncuesta : idEncuesta}, function(respuesta){
            if(respuesta.succes){
                alert(respuesta.succes);
            }else{
                alert(respuesta.error);
            }
            cargar();
            limpiar();
        }, "json");
    });

});