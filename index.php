<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="lib/bootstrap4/css/bootstrap.min.css">
    <link rel="shortcut icon" href="img/icons/gopuram-solid.svg" type="image/x-icon">
    <title>Inicio de sesión</title>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">


            
            <div class="fadeIn first">
            <p></p>
                <img src="img/logotb.png" width="50%" id="icon"
                    alt="User Icon" />
                    <p></p>
                <h1 style="color:black;">Condominios TorreBlanca</h1>
            </div>

            <form method="post" id="frmLogin" onsubmit="return logear()">
                
                <input type="text" id="login" class="fadeIn second" name="login" placeholder="username" maxlength='12' autocomplete="off" required>
                <input type="password" id="password" class="fadeIn third" name="password" maxlength='12' placeholder="password"
                    required>
                <input type="submit" class="fadeIn fourth" value="Entrar">
            </form>

            <div id="formFooter">
                <a class="underlineHover" href="view/registro.php">Registrar</a>
                
            </div>

        </div>
    </div>
    <script src="lib/jquery-3.6.0.min.js"></script>
    <script src="lib/sweetalert/sweetalert.min.js"></script>
    <script>
        function logear() {
            $.ajax({
                type: "POST",
                data: $('#frmLogin').serialize(),
                url: "procesos/usuario/login/login.php",
                success: function (respuesta) {
                    respuesta = respuesta.trim();
                    
                    if (respuesta == 1) {
                        window.location = "view/inicio.php";
                    } else if(respuesta == 2) {
                        window.location = "view/admin/inicio.php";
                    }else{
                        swal(":(", "Fallo al iniciar sesión", "error");
                        console.log(respuesta);
                    }
                }
            });

            return false;

        }
    </script>
</body>

</html>