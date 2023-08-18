<?php
$servidor="localhost";
$usuario="u351430033_willian";
$password="Willian123";
$base="u351430033_torreblanca";

$conexion = new mysqli("$servidor","$usuario","$password","$base");
$name="willian";
$pass="wili123";
$contra =  sha1($pass);
$sql="INSERT INTO t_usuarios (id_user, nombre, correo, username, contraseña) VALUES (2,'$name','wili@gmail.com','wili123','$contra')";
$ejecutarinsertar = mysqli_query($conexion, $sql);
if(!$ejecutarinsertar){
   echo 'error';

}else{
    echo $name;
    echo $contra;
}

$sql="SELECT*FROM t_usuarios WHERE nombre = ?";

$stmt=$conexion->prepare($sql);
$stmt->bind_param('s',$name);
$stmt->execute();
$stmt->bind_result($name);

if(!$stmt->fetch()){
    echo'error';
}else{
    echo $name;
}

?>