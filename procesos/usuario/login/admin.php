<?php
    session_start();
    require_once "../../../clases/Admin.php";
   
    
    $usuario = $_POST['login'];
    $password = sha1($_POST['password']);

    $usuarioObj = new Admin();
                
    echo $usuarioObj->loginAdmin($usuario,$password);
        
    
?>