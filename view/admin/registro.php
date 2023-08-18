<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/registro.css">
    <link rel="stylesheet" href="../../lib/bootstrap4/css/bootstrap.min.css">
    <title>Registro</title>
</head>

<body>
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
                <div class="container">
        <br>
        <h1 style="text-align: center; color:black;">Registro de admin</h1>
        <hr>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="" id="frmRegistro" method="post" onsubmit=" return agregarUsuarioNuevo()"
                    autocomplete="off">
                    <label for="">Nombre completo</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" maxlength='30' required>
                    <label for="">Correo Electronico</label>
                    <input type="email" name="correo" id="correo" class="form-control" maxlength='35' required>
                    <label for="">Nombre de usuario</label>
                    <input type="text" name="username" id="username" class="form-control" maxlength='12' required>
                    <label for="">Contraseña</label>
                    <input type="password" name="contraseña" id="contraseña" class="form-control" maxlength='12' required>
                    <p></p>
                    <center>
                        <div class="row">
                            <div class="col-sm-6 " style="padding-left:150px;">
                                <button class="btn btn-primary">Registrar</button>
                            </div>
                        </div>
                    </center>
                </form>
                <br>
            </div>
            <div class="col-sm-4"></div>

        </div>
    </div>

    <script src="../../lib/jquery-3.6.0.min.js"></script>
    <script src="../../lib/sweetalert/sweetalert.min.js"></script>
    <script>
        function agregarUsuarioNuevo() {
            $.ajax({
                method: "POST",
                data: $('#frmRegistro').serialize(),
                url: "../../procesos/usuario/registro/agregaradmin.php",
                success: function (respuesta) {
                    respuesta = respuesta.trim();
                    if (respuesta == 1) {
                        swal(":(", "Fallo al agregar!", "error");
                    } else if (respuesta == 2) {
                        swal("", "Este usuario ya existe, pruebe con otro", "error");
                    } else {
                        $("#frmRegistro")[0].reset();
                        swal(":D", "Agregado con exito!", "success");
                    }
                }
            })
            return false;
        };
    </script>

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

</body>

</html>