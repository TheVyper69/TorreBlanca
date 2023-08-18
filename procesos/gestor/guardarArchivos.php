<?php

    session_start();
    require_once "../../clases/Gestor.php";
    $Gestor = new Gestor;
    $idCategoria = $_POST['categoriasArchivos'];
    $idUsuario = $_SESSION['id'];

    if ($_FILES['archivos']['size'] > 0){
        $carpetaUsuario = '../../archivos/'.$idUsuario;

        if (!file_exists($carpetaUsuario)){
            mkdir($carpetaUsuario, 0777, true);
        }

        $totalArchivos = count($_FILES['archivos']['name']);

        for ($i = 0; $i < $totalArchivos; $i++ ){
            
            $nombreArchivo = $_FILES['archivos']['name'][$i];
            $explode = explode('.', $nombreArchivo);
            $tipoArchivo = array_pop($explode);

            $rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];
            $rutaFinal = $carpetaUsuario . "/" . $nombreArchivo;

            $datosRegistroArchivo = array(
                                          "idUsuario" => $idUsuario,
                                          "idCategoria" => $idCategoria,
                                          "nombreArchivo" => $nombreArchivo,
                                          "tipo" => $tipoArchivo,
                                          "ruta" => $rutaFinal  
                                        );

            if (move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
                $respuesta = $Gestor->agregarRegistroArchivo($datosRegistroArchivo);
            }
 
        }
        echo $respuesta;
    } else {
        echo 0;
    }



?>