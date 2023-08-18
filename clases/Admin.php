<?php

    require_once "Conexion.php";

    class Admin extends Conectar{
        public function agregarAdmin($datos){
            $conexion = Conectar::conexion();

            if (self::buscarAdminRepetido( mysqli_real_escape_string($conexion,$datos['username']))){
                return 2;
            } else {

                $sql="INSERT INTO t_usuarios (id_user, nombre, correo, username, contraseña) VALUES (1, ?, ?, ?, ?)";
                $query = $conexion->prepare($sql);
                $query->bind_param('ssss',  mysqli_real_escape_string($conexion,$datos['nombre']),
                                            mysqli_real_escape_string($conexion,$datos['correo']),
                                            mysqli_real_escape_string($conexion,$datos['username']),
                                            mysqli_real_escape_string($conexion,$datos['password']));
                                            
                $exito = $query->execute();
                $query->close();
                return $exito;
            }
            
        } 
        
        public function buscarAdminRepetido($usuario){
            $conexion = Conectar::conexion();

            $sql = "SELECT username FROM t_usuarios WHERE username = '$usuario'";
            $result = mysqli_query($conexion,$sql);

            $datos = mysqli_fetch_array($result);

            if( $datos['username'] != "" ||  $datos['username'] == $usuario){
                return 1;
            } else {
                return 0; 
            }
        }
        public function loginAdmin($usuario, $password){
            $conexion = Conectar::conexion();

            $sql = "SELECT count(*) as existeUsuario FROM t_usuarios WHERE username = '$usuario' AND contraseña = '$password' AND id_user = 1";
            $result = mysqli_query($conexion,$sql);

            $respuesta = mysqli_fetch_array($result)['existeUsuario'];

            if($respuesta > 0){
                $_SESSION['usuario'] = $usuario;
                $sql = "SELECT id FROM t_usuarios WHERE username = '$usuario' AND contraseña = '$password' ";
                $result = mysqli_query($conexion,$sql);
                $idUsuario = mysqli_fetch_row($result)[0];

                $_SESSION['id'] = $idUsuario;

                return 1;
            } else { 
                return 0;
            }   
        }
    }

?>