document.addEventListener("DOMContentLoaded", function(){

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
        $.post("router.php?action=saveReport", {idUsuario : 1, idCategoria : idCategoria, titulo : titulo,
            descripcion : descripcion, estado : "N/D", prioridad : "N/D", idCanton : idCanton}, function(respuesta){
                console.log(respuesta);
        });
    });
});
