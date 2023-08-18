<?php

    require_once "../../../clases/Usuario.php";

    $password =  sha1($_POST['contraseña']);
    
    $datos = array(
     
        "nombre" =>$_POST['nombre'], 
        "correo" =>$_POST['correo'], 
        "username" =>$_POST['username'],  
        "password" =>$password
    );

    $usuario = new Usuario();

    echo $usuario->agregarUsuario($datos);

?>