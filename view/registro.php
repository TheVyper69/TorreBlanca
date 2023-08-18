<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/registro.css">
    <link rel="stylesheet" href="../lib/bootstrap4/css/bootstrap.min.css">
    <title>Registro</title>
</head>

<body>
    <div class="container">
        
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <form action="" id="frmRegistro" method="post" onsubmit=" return agregarUsuarioNuevo()"
                    autocomplete="off">
                    <div class="fadeIn first">
                        <p></p>
                        <center><img src="../img/logotb.png" width="50%" id="icon"
                                alt="User Icon" /></center>
                                <p></p>
                            <center>
                            <h1 style="color:black;">Condomino Torreblanca </h1>
                            <h1 style="color:black;">Registro</h1></center>
                    
                        <label for="">Nombre completo</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" maxlength='25' required>
                        <label for="">Correo Electronico</label>
                        <input type="email" name="correo" id="correo" class="form-control" maxlength='45' required>
                        <label for="">Nombre de usuario</label>
                        <input type="text" name="username" id="username" class="form-control" maxlength='12' required>
                        <label for="">Contraseña</label>
                        <input type="password" name="contraseña" id="contraseña" class="form-control" maxlength='12' required>
                        <p></p>
                        <center>
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <button class="btn btn-primary">Registrar</button>
                                </div>
                                <div class="col-sm-6" style="padding-left:0px;">
                                    <a href="../" class="btn btn-success"> Iniciar Sesión </a>
                                </div>
                            </div>
                        </center>
                    </div>
                </form>
                <br>
                <div class="fadeIn first" id="formFooter">
                    <a class="underlineHover" href="../">Iniciar sesión</a>
                </div>
            </div>
            <div class="col-sm-4"></div>

        </div>
    </div>
    <script src="../lib/jquery-3.6.0.min.js"></script>
    <script src="../lib/sweetalert/sweetalert.min.js"></script>
    <script>
        function agregarUsuarioNuevo() {
            $.ajax({
                method: "POST",
                data: $('#frmRegistro').serialize(),
                url: "../procesos/usuario/registro/agregarUsuario.php",
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

</body>

</html>