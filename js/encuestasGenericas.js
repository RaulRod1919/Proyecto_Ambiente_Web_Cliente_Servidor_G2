document.addEventListener("DOMContentLoaded", function(){
    function cargar(){
        $.get("router.php?action=getEncuestas", function(respuesta){
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
});
