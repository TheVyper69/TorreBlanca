
function obtenerArchivoPorId(idArchivo){
    $.ajax({
        type:"POST",
        data:"idArchivo=" + idArchivo,
        url: "../procesos/gestor/obtenerArchivo2.php",
        success:function(respuesta){

            $('#archivoObtenido').html(respuesta);

        }
    });
}