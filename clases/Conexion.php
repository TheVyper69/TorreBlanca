<?php

    class Conectar{
        public function conexion(){
            $servidor="localhost";
            $usuario="root";
            $password="";
            $base="gestor_login";
            
            $conexion = mysqli_connect("$servidor","$usuario","$password","$base") or die ("error de conexion");

            return $conexion;
        }
        public function conexionEvidencias(){
            $servidor="localhost";
            $usuario="root";
            $password="";
            $base="gestor_evidencias";
            
            $conexion = mysqli_connect("$servidor","$usuario","$password","$base") or die ("error de conexion");

            return $conexion;
        }
        public function conexionReportes(){
            $servidor="localhost";
            $usuario="root";
            $password="";
            $base="gestor_reporte";
            
            $conexion = mysqli_connect("$servidor","$usuario","$password","$base") or die ("error de conexion");

            return $conexion;
        }
    }

?>