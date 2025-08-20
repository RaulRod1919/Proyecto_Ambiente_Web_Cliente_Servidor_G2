document.addEventListener("DOMContentLoaded", function(){
    function cargar(){
        let idUsuario = $("#idUsuario").val();
        $.post("router.php?action=getEncuestasNoVotadas",{idUsuario : idUsuario}, function(respuesta){
            console.log(respuesta.encuestas);
            let encuesta;
            $("#encuestas-container").html("");
            for(let i = 0; i < respuesta.encuestas.length; i++){
                encuesta = respuesta.encuestas[i];
                $("#encuestas-container").append("<div class='encuesta' data-id='"+encuesta[0]+"'>"+
                "<h3>"+encuesta[1]+"</h3>"+
                "<p>"+encuesta[2]+"</p>"+
                "<div class='acciones'>"+
                    "<button class='like'><img src='img/meGusta.png' alt='Like'></button>"+
                    "<button class='dislike'><img src='img/dislike.png' alt='Dislike'></button>"+
                "</div>"+
            "</div>");
            }
        }, "json");
    }
    cargar();

    $("main").on("click", ".like", function(){
        let idEncuesta = $(this).closest(".encuesta").data("id");
        let idUsuario = $("#idUsuario").val();
        $.post("router.php?action=like", {idEncuesta : idEncuesta, idUsuario : idUsuario}, function(respuesta){
            if(respuesta.succes){
                alert(respuesta.succes);
            }else{
                alert(respuesta.error);
            }
            cargar();
        }, "json");
    })

    $("main").on("click", ".dislike", function(){
        let idEncuesta = $(this).closest(".encuesta").data("id");
        let idUsuario = $("#idUsuario").val();
        $.post("router.php?action=dislike", {idEncuesta : idEncuesta, idUsuario : idUsuario}, function(respuesta){
            if(respuesta.succes){
                alert(respuesta.succes);
            }else{
                alert(respuesta.error);
            }
            cargar();
        }, "json");
    })
});
