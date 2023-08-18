<?php
    session_start();
    require_once "../../../clases/Conexion.php";
    $c = new Conectar;
    $conexion = $c->conexionEvidencias();
    $idUsuario = $_SESSION['id'];
    $sql = "SELECT 
                archivos.id as idArchivo,
                categorias.nombre as categoria,
                archivos.nombre as nombreArchivo,
                archivos.tipo as tipoArchivo,
                archivos.ruta as rutaArchivo,                   
                archivos.fecha_insert as fecha
            FROM
                t_archivos AS archivos
                    INNER JOIN
                t_categorias AS categorias ON archivos.id_categoria = categorias.id
                ";

    $result = mysqli_query($conexion, $sql);

?>


<div class="row">
    <div class="col-sm-12">
        <div class="table-reponsive">
            <table class="table table-hover table-dark table-md " id="tablaGestorDataTable">
                <thead>
                    <tr style="text-align: center;">
                        <th>Nombre</th>
                        <th>Extenisión de archivo</th>
                        <th>categoria</th>
                        <th>Descargar</th>
                        <th>Visualizar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    
                    $extensionesValidas = array('png', 'jpg', 'pdf', 'mp3', 'mp4');

                    while ($mostrar = mysqli_fetch_array($result)){
                        
                        $rutaDescarga = "../../archivos/".$idUsuario."/".$mostrar['nombreArchivo'];
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
                        <td style="text-align: center;">
                            <span class="btn btn-danger btn-sm" onclick="eliminarArchivo('<?php echo $idArchivo; ?>')"> <span class="fas fa-trash-alt"></span> </span>
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