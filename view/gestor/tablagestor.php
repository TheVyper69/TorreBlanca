<?php
    session_start();
    require_once "../../clases/Conexion.php";
    $c = new Conectar;
    $conexionE = $c->conexionEvidencias();
    $idUsuario = $_SESSION['id'];
    $sqlE = "SELECT 
                archivos.id as idArchivo,
                categorias.nombre as categoria,
                archivos.nombre as nombreArchivo,
                archivos.id_usuario as iduser,
                archivos.tipo as tipoArchivo,
                archivos.ruta as rutaArchivo,                   
                archivos.fecha_insert as fecha
            FROM
                t_archivos AS archivos
                    INNER JOIN
                t_categorias AS categorias ON archivos.id_categoria = categorias.id
                ";
    

    $resultE = mysqli_query($conexionE, $sqlE);

?>



<div class="row">
    <div class="col-sm-12">
        <div class="table-reponsive">
            <table class="table table-hover table-dark table-reponsive" id="tablaGestorDataTable">
                <thead>
                    <tr style="text-align: center;">
                        <th>Nombre</th>
                        <th>Tipo de archivo</th>
                        <th>categoria</th>
                        <th>Descargar</th>
                        <th>Visualizar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    
                    $extensionesValidas = array('png', 'jpg', 'pdf', 'mp3', 'mp4');

                    while ($mostrar = mysqli_fetch_array($resultE)){
                        $idUser= $mostrar['iduser'];
                        $rutaDescarga = "../archivos/".$idUser."/".$mostrar['nombreArchivo'];
                        $nombreArchio = $mostrar['nombreArchivo'];
                        $idArchivo = $mostrar['idArchivo'];
                        
                        
                ?>

                    <tr>
                        <td><?php echo $mostrar['nombreArchivo']; ?></td>
                        <td><?php echo $mostrar['tipoArchivo']; ?></td>
                        <td><?php echo $mostrar['categoria']; ?></td>
                        <td style="text-align: center;">
                            <a href="<?php echo $rutaDescarga;?>" download="<?php echo $nombreArchio;?>"><span class="btn btn-warning btn-sm"> <span class="fas fa-download"></span> </span> </a>
                        </td>
                        <td style="text-align: center;">
                            <?php
                                for ($i=0; $i < count($extensionesValidas); $i++ ){
                                    if($extensionesValidas[$i] == $mostrar['tipoArchivo']){
                            ?>

                                <span class="btn btn-success btn-sm" data-toggle="modal" data-target="#visualizar" onclick="obtenerArchivoPorId(<?php echo $idArchivo ?>)"> <span class="fas fa-eye"></span> </span>
                                
                            <?php            
                                    }
                                }
                            ?>
                        </td>
                        
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