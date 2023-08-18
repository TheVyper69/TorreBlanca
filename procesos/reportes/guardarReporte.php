<?php

    session_start();

    require_once "../../clases/Reportes.php";
    $idUsuario = $_SESSION['id'];
    $idtorre = $_POST['idTorres'];
    $Reportes = new Reportes();

    $datos = array(
        "idUsuario" => $idUsuario,
        "torre" =>$idtorre, 
        "piso" =>$_POST['piso'], 
        "depa" =>$_POST['depa'],
        "reporte" =>$_POST['reporte']
    );
    
    echo $Reportes->agregarReporte($datos);

?>