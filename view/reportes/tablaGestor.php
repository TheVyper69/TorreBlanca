<?php
    session_start();
    require_once "../../clases/Conexion.php";
    $c = new Conectar;
    $conexion = $c->conexionReportes();
    
    $idUsuario = $_SESSION['id'];
    
    
    
    $sql = "SELECT 
                torres.nombre as nombreTorre,
                reportes.piso as piso,
                reportes.habitacion as depa,
                reportes.fecha_reporte as fecha,                   
                reportes.reporte as reporte
            FROM
                t_reportes AS reportes  
                    INNER JOIN
                t_torres AS torres ON reportes.id_torre = torres.id WHERE reportes.id_usuario = '$idUsuario'
                ";

    $result = mysqli_query($conexion, $sql);

?>



<div class="row">
    <div class="col-sm-12">
        <div class="table-reponsive">
            <table class="table table-hover table-dark table-reponsive" id="tablaGestorDataTable">
                <thead>
                    <tr style="text-align: center;">
                        <th style=" width:15%;">Condómino</th>
                        <th style=" width:15%;">Torre</th>
                        <th style=" width:10%;">Piso</th>
                        <th style=" width:10%;">Departamento</th>
                        <th style=" width:18%;">Fecha de reporte</th>
                        <th>Reporte</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    
                    //$extensionesValidas = array('png');//

                    while ($mostrar = mysqli_fetch_array($result)){
                        
                        
                ?>

                    <tr>
                        <td style="text-align: center;"><?php
                        $conexionU = $c->Conexion();
                        $sqlU="SELECT id, nombre FROM t_usuarios WHERE id = '$idUsuario'";
                        $resultU = mysqli_query($conexionU, $sqlU);
                        while ($mostrarU = mysqli_fetch_array($resultU)){
                            
                            $nombre= $mostrarU['nombre'];
                        

                        echo $mostrarU['nombre'];} ?></td>
                        <td style="text-align: center;"><?php echo $mostrar['nombreTorre']; ?></td>
                        <td style="text-align: center;"><?php echo $mostrar['piso']; ?></td>
                        <td style="text-align: center;"><?php echo $mostrar['depa']; ?></td>
                        <td style="text-align: center;"><?php echo $mostrar['fecha']; ?></td>
                        <td><?php echo $mostrar['reporte']; ?></td>
                        
                    </tr>
                    <?php

                        }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
       $('#tablaGestorDataTable').DataTable(); 
    });
</script>