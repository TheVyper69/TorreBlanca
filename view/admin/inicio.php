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

            <?php 
            include "footer.php";
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

    

?>
