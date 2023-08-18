<?php

    require_once "Conexion.php";
    class Categorias extends Conectar{
        public function agragarCategoria($datos){
            $conexion = Conectar::conexionEvidencias();
            $iduser=mysqli_real_escape_string($conexion,$datos['idUsuario']);
            $cat=mysqli_real_escape_string($conexion,$datos['categoria']);
            $sql = "INSERT INTO t_categorias (id_usuario, nombre) VALUES (?,?)";

            $query = $conexion->prepare($sql);
            $query->bind_param("is",$iduser,$cat);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        public function eliminarCategoria($idCategoria){
            $conexion = Conectar::conexionEvidencias();

            $sql = " DELETE FROM t_categorias WHERE id = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idCategoria);
            $respuesta = $query->execute();
            $query->close();

            return $respuesta;

        }
        public function obtenerCategoria($idCategoria){
            $conexion = Conectar::conexionEvidencias();

            $sql = "SELECT id, nombre FROM t_categorias WHERE id = '$idCategoria'";

            $result = mysqli_query($conexion,$sql);

            $categoria = mysqli_fetch_array($result);

            $datos = array(
                "idCategoria" => $categoria['id'],
                "nombreCategoria" => $categoria['nombre']
            );
            return $datos;
        }

        public function actualizarCategoria($datos){
            $conexion = Conectar::conexionEvidencias();
            $cat2=mysqli_real_escape_string($conexion,$datos['categoria']);
            $idcat=mysqli_real_escape_string($conexion,$datos['idCategoria']);

            $sql = "UPDATE t_categorias SET nombre = ? WHERE id= ?";

            $query = $conexion->prepare($sql);
            $query->bind_param("si",$cat2,$idcat);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }

?>