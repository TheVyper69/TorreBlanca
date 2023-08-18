<?php

    session_start();
    require_once "../../clases/Conexion.php";
    $c = new Conectar();
    $conexion = $c->conexionReportes();

    $idUsuario = $_SESSION['id'];
    
    $sql = "SELECT id, nombre FROM t_torres";
    $result = mysqli_query($conexion, $sql);
?>

<select name="idTorres" id="IdTorres" class="form-control">
    <?php
        while ($mostrar = mysqli_fetch_array($result)){
            $idTorre = $mostrar['id'];
        

    ?>
    <option value="<?php echo $idTorre;  ?>"><?php echo $mostrar['nombre'];  ?> </option>
    <?php
        }
    ?>
</select>