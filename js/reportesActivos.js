document.addEventListener("DOMContentLoaded",function(){
    function cargar(){
        $.get("router.php?action=getReportesActivos", function(respuesta){
            console.log(respuesta.reportes);
            $(".reports").html("");
            let reporte;
            for(let i = 0; i < respuesta.reportes.length; i++){
                reporte = respuesta.reportes[i];
                console.log(reporte);
                $(".tarjetas")
                .append("<article class='reporte-cont'>"+
                "<img src='"+reporte[4]+"' alt='img del reporte'>"+
                "<div>"+
                    "<h2>"+reporte[1]+"</h2>"+
                    "<p>Localidad: "+reporte[5]+"/"+reporte[6]+"</p>"+
                    "<p>"+reporte[2]+"</p>"+
                "</div>"+
            "</article>");
            }
        }, "json");
    }
    cargar();
});