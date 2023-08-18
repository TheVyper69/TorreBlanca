<?php

    session_start();
    require_once "../../clases/Gestor2.php";
    $Gestor = new Gestor();
    $idArchivo = $_POST['idArchivo'];
    
    echo $Gestor->obtenerRutaArchivo($idArchivo);

?>