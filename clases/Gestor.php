<?php

    require_once "Conexion.php";

    class Gestor extends Conectar {
        public function agregarRegistroArchivo($datos){
            $conexion = Conectar::conexionEvidencias();
            
            $sql = "INSERT INTO t_archivos (id_usuario, id_categoria, nombre, tipo, ruta) VALUES (?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iisss",$datos['idUsuario'],
                                       $datos['idCategoria'],
                                       $datos['nombreArchivo'],
                                       $datos['tipo'],
                                       $datos['ruta']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        
        }
        public function obtenNombreArchivo($idArchivo){
            $conexion = Conectar::conexionEvidencias();
            $sql = "SELECT nombre FROM t_archivos WHERE id = '$idArchivo'";
            $result = mysqli_query($conexion,$sql);

            return mysqli_fetch_array($result)['nombre'];
        }

        public function eliminarRegistroArchivo($idArchivo){
            $conexion = Conectar::conexionEvidencias();
            $sql = "DELETE FROM t_archivos WHERE id = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i',$idArchivo);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function obtenerRutaArchivo($idArchivo){
            $conexion = Conectar::conexionEvidencias();
            $sql = "SELECT id_usuario, nombre, tipo FROM t_archivos WHERE id = '$idArchivo'";
            $result = mysqli_query($conexion,$sql);
            $datos = mysqli_fetch_array($result);
            $nombreArchivo = $datos['nombre'];
            $extension = $datos['tipo'];
            $idUser = $datos['id_usuario'];
            return self::tipoArchivo($nombreArchivo, $extension, $idUser);
        }
        public function tipoArchivo($nombreArchivo, $extension, $idUser){

            $ruta = "../../archivos/".$idUser."/".$nombreArchivo;

            switch ($extension) {
                case 'png':
                    return '<center><img src="'.$ruta.'"width="50%"></center>';
                    break;
                case 'jpg':
                    return '<center><img src="'.$ruta.'"width="50%"></center>';
                    break; 
                case 'pdf':
                    return '<embed src="' . $ruta . '#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />';
                    break;  
                case 'mp3':
                    return '<center><audio controls width="100%" src="' . $ruta . '" ></audio></center>';
                    break;  
                case 'mp4':
                    return '<video src="'. $ruta . '" controls width="100%"></video>';
                    break;
                case 'docx':
                    return '<iframe src="https://docs.google.com/document/d/1gf5BBsyBrjz1z8ZLac4GXIxDCNAIpEyh6vO52LRCIaM/edit?usp=sharing" style="width:100%; height:50%; border: none;min-height:500px;"></iframe>';
                    break;             
                default:
                    # code...
                    break;
            }
        }
    }

?>