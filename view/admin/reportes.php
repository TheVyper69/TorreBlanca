<?php

    session_start();

    if(isset($_SESSION['usuario'])){
        require_once "../../clases/Conexion.php";
        $conexion = Conectar::conexion();
        $iduser = $_SESSION['usuario'];
        $sql = "SELECT count(*) as existeUsuario FROM t_usuarios WHERE username = '$iduser' AND id_user=1";
        $result = mysqli_query($conexion,$sql);
        $respuesta = mysqli_fetch_array($result)['existeUsuario'];
        if($respuesta==true){
        include "header.php";
        ?>
<html>
    <div class="jumbotron jumbotron-fluid" >
        <div class="container" >
            <h1 class="display-4">Reportes</h1>
            <hr>

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
                        <input type="text" name="piso" id="piso"class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" requiered>
                        <label for="">Habitación</label>
                        <input type="text" name="depa" id="depa" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" requiered>
                        <label for="">Causa de reporte</label>
                        <textarea class="form-control" name="reporte" id="reporte" aria-label="With textarea"></textarea>
                    </form>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-danger" id="btnGuardarReporte">Reportar</button>
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

            <script src="../../js/reportes.js"></script>
            <script>
            $(document).ready(function(){
            $('#tablaGestorReportes').load("reportes/tablaReportes.php");
            
            $('#btnGuardarReporte').click(function(){
                    agregarReporte();
                });
            
           
        });
</script>


        <?php
        }else{
            ?>
                <script type="text/javascript">
                    alert("ACCESO DENEGADO");    
                    window.location.href="../inicio.php";
                </script>
            <?php
        }
    } else{
        header("location:../../");
    }

