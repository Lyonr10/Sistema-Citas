<?php 
require_once("../../config/conexion.php");
$id=$_POST['id_usuario'];
$nombre=trim($_POST['nombre']);
$usuario=trim($_POST['usuario']);
$password=trim($_POST['password']);
$sha1=sha1($password);
$confirmar=trim($_POST['confirm_password']);
$id_tipo=$_POST['id_tipo'];
$sql2="SELECT * FROM usuarios WHERE usuario='$usuario'";
$result2=$con->query($sql2);
$rows=$result2->num_rows;
if(!$nombre){
	echo "Nombre requerido";
}else if(!$usuario){
	echo "Usuario requerido";
}else if(!$password){
	echo "Password requerido";
}else if(!$confirmar){
	echo "Confirma tu password";
}
else if(!$id_tipo){
	echo "Seleccione el tipo de usuario";
}
else if($row==0){
	$sql="UPDATE usuarios SET nombre='$nombre',usuario='$usuario',password='$sha1',id_tipo='$id_tipo' WHERE id_usuario='$id'";
$result=$con->query($sql);
	echo '<script> swal({
                        title: "Datos del usuario modificado con Exito",
                        text: "Redireccionando...",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });

                var delay = 2000;
                setTimeout(function(){ window.location = "usuarios.php"; }, delay);</script>';
}else{
	echo "El usuario ingresado ya se encuentra registrado";
}
?>
