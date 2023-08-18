<?php

    session_start();
    if(isset($_SESSION['usuario'])){
        include "header.php";
        ?>
        <html>
    <div class="jumbotron jumbotron-fluid" >
        <div class="container" >
            <h1 class="display-4">Mis reportes</h1>
            <hr>
            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-dark" data-toggle="modal" data-target="#agregarReporte">
                        <span class="fas fa-plus" ></span> Agregar reporte
                    </span>
                </div>
            </div>
            <br>
           <div class="table-responsive" id="tablaGestorReportes">
                
           </div>
        </div>
    </div>
    <div class="modal fade" id="agregarReporte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar reporte</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <form id="frmReporte" enctype="multipart/form-data" method="post">
                        <label for="">Torre</label>
                        <div id="idTorre">
                        </div>
                        <label for="" >Piso</label>
                        <input type="text" name="piso" id="piso"class="form-control" placeholder="Introduzca en que piso está ospedado" aria-label="Username" aria-describedby="basic-addon1" requiered>
                        <label for="">Habitación</label>
                        <input type="text" name="depa" id="depa" class="form-control" placeholder="Introduzca en que habitación está ospedado" aria-label="Username" aria-describedby="basic-addon1" requiered>
                        <label for="">Causa de reporte</label>
                        <input type="text" class="form-control" name="reporte" id="reporte" pattern="[A-Za-z0-9]+" title="Ya no lo intentes" maxlength='100' placeholder="Introduzca de forma breve lo que quiere reportar" aria-label="With textarea"  requiered>
                    </form>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        
                        <button type="button" class="btn btn-danger" id="btnGuardarReporte"><input type="submit" class="form-control" value="Reportar"></button>
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
        <?php 
        include "footer.php";?>

            <script src="../js/reportes.js"></script>
            <script>
            $(document).ready(function(){
            $('#tablaGestorReportes').load("reportes/tablaGestor.php");
            $('#idTorre').load("categorias/selectTorre.php");
            
            $('#btnGuardarReporte').click(function(){
                    agregarReporte();
                });
            
           
        });
</script>


        <?php
        
    } else{
        header("location:../");
        
    }

?>
