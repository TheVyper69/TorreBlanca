
<?php

    require_once "Conexion.php";
    class Reportes extends Conectar{
        public function agregarReporte($datos){
            $conexion = Conectar::conexionReportes();
            $piso= mysqli_real_escape_string($conexion,$datos['piso']);
            $depa= mysqli_real_escape_string($conexion,$datos['depa']);
            $reporte = mysqli_real_escape_string($conexion,$datos['reporte']);
            
            $sql = "INSERT INTO t_reportes (id_usuario, id_torre,piso,habitacion,reporte) VALUES (?,?,?,?,?)";

            $query = $conexion->prepare($sql);
            $query->bind_param("iiiis",$datos['idUsuario'],$datos['torre'],$piso,$depa,$reporte);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        public function eliminarReporte($idReporte){
            $conexion = Conectar::conexionReportes();
            $sql = "DELETE FROM t_reportes WHERE id = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i',$idReporte);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }

?>