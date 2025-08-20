document.addEventListener("DOMContentLoaded", function(){

    function limpiar(){
        $("input").val("");
    }

    $("#id").on("change", function(){
        if($("#id").val() != ""){
            $("button").removeAttr("disabled");
        }else{
            $("button").attr("disabled", "disabled");
        }
    });

    function carga(){
        $.get("router.php?action=getReportes", function(respuesta){
            console.log(respuesta.reportes);
            $(".reports").html("");
            let reporte;
            for(let i = 0; i < respuesta.reportes.length; i++){
                reporte = respuesta.reportes[i];
                $(".reports")
                .append("<section class='sect'>"+
                    "<div class='opt bg-dark report'>"+
                        "<input type='hidden' value='"+reporte[0]+"'>"+
                        "<p>"+reporte[3]+"</p><p></p><p>"+reporte[6]+"</p>"+
                        "<p>"+reporte[5]+"</p>"+
                        "</div>"+
                    "</section>");
            }
        }, "json");
    }
    carga();

    $("#eliminar").on("click", function(){
        let idReporte = $("#id").val();
        $.post("router.php?action=deleteReporte", {idReporte : idReporte} ,function(respuesta){
            console.log(respuesta);
            limpiar();
            carga();
        });
    });

    $("#editar").on("click", function(){
        let idReporte = $("#id").val();
        $("#popup").css("display", "flex");
        $.post("router.php?action=getReporte", {idReporte : idReporte} ,function(respuesta){
            console.log(respuesta.reporte);
            $("#idReporte").val(respuesta.reporte.id_reporte);
            $("#titulo").val(respuesta.reporte.titulo);
            $("#descripcion").val(respuesta.reporte.descripcion);
            $("#imagenReporte").attr("src",respuesta.reporte.ruta_imagen);
        }, "json");
    });

    $("#reporte").on("submit", function(e){
        e.preventDefault();
        let idReporte = $("#idReporte").val();
        let prioridad = $("#prioridad").val();
        let estado = $("#estado").val();
        $.post("router.php?action=updateReporte", {prioridad : prioridad, estado : estado, idReporte : idReporte} ,function(respuesta){
            if(respuesta.succes){
                alert(respuesta.succes);
            }else{
                alert(respuesta.error);
            }
            limpiar();
            carga();
            $("#popup").css("display", "none");
        }, "json");
    });

    $("#cerrar").on("click", function(){
        $("#popup").css("display", "none");
    });

    $("main").on("click", ".report", function(){
        let id = $(this).find("input[type=hidden]").val();
        $("#id").val(id).trigger("change");
    });

});