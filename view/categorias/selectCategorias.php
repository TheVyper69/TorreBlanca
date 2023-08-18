<?php

    session_start();
    require_once "../../clases/Conexion.php";
    $c = new Conectar();
    $conexion = $c->conexion();

    $idUsuario = $_SESSION['id'];
    
    $sql = "SELECT id, nombre FROM t_categorias";
    $result = mysqli_query($conexion, $sql);
?>

<select name="categoriasArchivos" id="categoriasArchivos" class="form-control">
    <?php
        while ($mostrar = mysqli_fetch_array($result)){
            $idCategoria = $mostrar['id'];
        

    ?>
    <option value="<?php echo $idCategoria;  ?>"><?php echo $mostrar['nombre'];  ?> </option>
    <?php
        }
    ?>
</select>