<?php

    require_once "Conexion.php";

    class Usuario extends Conectar{

        public function agregarUsuario($datos){
            $conexion = Conectar::conexion();

            if (self::buscarUsuarioRepetido($datos['username'])){
                return 2;
            } else {

                $sql="INSERT INTO t_usuarios (id_user, nombre, correo, username, contraseña) VALUES (2, ?, ?, ?, ?)";
                $query = $conexion->prepare($sql);
                $query->bind_param('ssss', mysqli_real_escape_string($conexion,$datos['nombre']),
                                           mysqli_real_escape_string($conexion,$datos['correo']),
                                           mysqli_real_escape_string($conexion,$datos['username']),
                                           mysqli_real_escape_string($conexion,$datos['password']));
                                            
                $exito = $query->execute();
                $query->close();
                return $exito;
            }
            
        } 
        
        public function buscarUsuarioRepetido($usuario){
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

        public function login($usuario, $password){
            $conexion = Conectar::conexion();
            $contra = mysqli_real_escape_string($conexion,$password);
            $user = mysqli_real_escape_string($conexion,$usuario);


            $sql = "SELECT count(*) as existeUsuario FROM t_usuarios WHERE username = '$user' AND contraseña = '$contra'";
            $result = mysqli_query($conexion,$sql);

            $respuesta = mysqli_fetch_array($result)['existeUsuario'];

            if($respuesta > 0){
                $_SESSION['usuario'] = $usuario;
                $sql = "SELECT id, id_user FROM t_usuarios WHERE username = '$user' AND contraseña = '$contra'";
                $result = mysqli_query($conexion,$sql);
                $idUsuario = mysqli_fetch_array($result);

                $_SESSION['id'] =  $idUsuario['id'];
                if($idUsuario['id_user']==2){
                    return 1; 
                }else {
                    return 2; 
                }
                
                
            } else { 
                return 0;
            }   
        }
        
    }

?>