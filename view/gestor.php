<?php 
    session_start();
    if (isset($_SESSION['usuario'])){

    include "header.php"; 
    
?>
<html>
    <div class="jumbotron jumbotron-fluid" >
        <div class="container" >
            <h1 class="display-4">Evidencias</h1>
            <hr>
            <br>
           <div class="table-responsive" id="tablaGestorArchivos">
                
           </div>
        </div>
    </div>
    <div class="modal fade" id="agregarAchivos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar archivos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <form id="frmArchivos" enctype="multipart/form-data" method="post">
                        <label for="">Categoría</label>
                        <div id="categoriasLoad">

                        </div>
                        <label for="">Selecciona archivos</label>
                        <input type="file" name="archivos[]" id="archivos[]" class="form-control" multiple="">
                    </form>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="btnGuardarArchivos">Subir</button>
                    </div>
                </div>
            </div>
        </div>


    <!-- Modal -->
    <div class="modal fade" id="visualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">archivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="archivoObtenido">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                
            </div>
            </div>
        </div>
    </div>



</html>
<?php include "footer.php"; ?>
<script src="../js/gestor2.js"></script>

<script>
        $(document).ready(function(){
            $('#tablaGestorArchivos').load("gestor/tablagestor.php");
            $('#categoriasLoad').load("categorias/selectCategorias.php");

            $('#btnGuardarArchivos').click(function(){
                agregarArchivosGestor();
            });
        });
</script>
<?php

    } else{
        header("location:../../");
    }

?>