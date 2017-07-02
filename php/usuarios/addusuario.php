<?php 
require_once("../../config/conexion.php");
$nombre=trim($_POST['nombre']);
$usuario=trim($_POST['usuario']);
$password=trim($_POST['password']);
$sha1=sha1($password);
$confirmar=trim($_POST['confirm_password']);
$id_tipo=$_POST['id_tipo'];

$sql="SELECT * FROM usuarios WHERE usuario='$usuario'";
$result=$con->query($sql);
$rows=$result->num_rows;
if(!$nombre){
	echo "Nombre requerido";
}else if(!$usuario){
	echo "Usuario requerido";
}else if(!$password){
	echo "Password requerido";
}else if(!$confirmar){
	echo "Confirma tu password";
}else if(!$id_tipo){
	echo "Seleccione el tipo de usuario";
}else if($rows==0){
	$sql2="INSERT INTO usuarios(nombre,usuario,password,id_tipo) VALUES('$nombre','$usuario','$sha1','$id_tipo')";
	$result2=$con->query($sql2);
	echo '<script> swal({
                        title: "Usuario guardado con exito",
                        text: "Redireccionando...",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });

                var delay = 2000;
                setTimeout(function(){ window.location = "usuarios.php"; }, delay);</script>';
}

 ?>