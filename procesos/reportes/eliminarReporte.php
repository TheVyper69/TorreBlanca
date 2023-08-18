<?php

    session_start();
    require_once "../../clases/Reportes.php";
    $Reportes = new Reportes();
    $idReporte = $_POST['idReporte'];
    
    echo $Reportes->eliminarReporte($idReporte);

?>