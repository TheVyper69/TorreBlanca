<?php

    session_start();
    require_once "../../clases/Gestor.php";
    $Gestor = new Gestor();
    $idArchivo = $_POST['idArchivo'];
    $idUsuario = $_SESSION['id'];

    $nombreArchivo = $Gestor->obtenNombreArchivo($idArchivo);

    $rutaEliminar = "../../archivos/" . $idUsuario . "/" . $nombreArchivo;
    if (unlink($rutaEliminar)){
        echo $Gestor->eliminarRegistroArchivo($idArchivo);

    } else {
        echo 0;
    }


?>