<?php

    session_start();
    require_once "../../clases/Conexion.php";
    $idUsuario = $_SESSION['id'];
    $conexion = new Conectar();
    $conexion = $conexion->conexion();

?>


<div class="table-responsive ">
    <table class="table table-hover table-dark table-reponsive" id="tablaCategoriasDataTable">
        <thead style="text-align: center;">
            <tr>
                <th>Nombre</th>
                <th>Fecha de creación</th>
                <th>Editar</th>
                <th>Elimiar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT id, nombre, fecha_insert FROM t_categorias";
                $result = mysqli_query($conexion, $sql);
                while($mostrar = mysqli_fetch_array($result)){
                    $idCategoria = $mostrar['id'];
            ?>
            <tr>
                <td style="text-align: center;"><?php echo $mostrar['nombre']; ?></td>
                <td style="text-align: center;"><?php echo $mostrar['fecha_insert']; ?></td>
                <td style="text-align: center;">
                    <span class="btn btn-warning btn-sm" onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')" data-toggle="modal" data-target="#modalActualizarCategoria">
                        <span class="fas fa-edit"></span>
                    </span>
                </td>
                <td style="text-align: center;">
                    <span class="btn btn-danger btn-sm" onclick="eliminarCategoria('<?php echo $idCategoria ?>')">
                        <span class="fas fa-trash-alt"></span>
                    </span>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>

</div>

<script>
    $(document).ready(function(){
       $('#tablaCategoriasDataTable').DataTable(); 
    });
</script>