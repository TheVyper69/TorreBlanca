function agregarReporte(){
    var piso = $('#piso').val();
    if (piso == ""){
        swal(":(", "Fallo al resgistrar reporte", "error");
        return false;
    } else {
        $.ajax({
            type: "POST",
            data: $('#frmReporte').serialize(),
            url: "../procesos/reportes/guardarReporte.php",
            success: function (respuesta){
                respuesta = respuesta.trim();

                if(respuesta == 1){
                    $('#frmReporte')[0].reset();
                    $('#tablaGestorReportes').load("reportes/tablaGestor.php"); 
                    swal(";)", "Agregado con exito!", "success");
                }else{
                    swal(":(", "Fallo al agregar!", "error");
                }
            }
        });
    }
}
function eliminarReporte(idReporte){
    swal({
        title: "Estas seguro de eliminar este archivo?",
        text: "Una vez eliminado no podra recuperarse!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type:"POST",
                data:"idReporte= " + idReporte,
                url:"../../procesos/reportes/eliminarReporte.php",
                success:function(respuesta){
                    respuesta = respuesta.trim();
                    if (respuesta == 1){
                        $('#tablaGestorReportes').load("reportes/tablaReportes.php");
                        swal("Eliminado con exito!",{icon:"success",});
                    } else {
                        swal("Error al eliminar",{icon:"error",}); 
                    }
                }
            });
        } 
    });
}