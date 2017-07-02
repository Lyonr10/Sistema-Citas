<?php 
require_once("conexion.php");
if(isset($_SESSION['id_usuario'])){
	header("location:php/inicio.php");
}
if(!empty($_POST)){
$usuario=$_POST['usuario'];
$password=$_POST['password'];
$sha1_pass=sha1($password);

$sql="SELECT id_usuario,id_tipo FROM usuarios WHERE usuario='$usuario' AND password='$sha1_pass'";
$result=$con->query($sql);
$rows=$result->num_rows;
$fetch=$result->fetch_assoc();

if(!$usuario && !$password){
	echo "Todo los campos Requeridos";
}else if(!$usuario){
	echo "Ingrese su nombre usuario";
}else if(!$password){
	echo "Ingrese su Password";
}else if($rows==0){
	echo "Usuario y Password son invalidos";
}else{
	session_start();
	$_SESSION['id_usuario']=$fetch['id_usuario'];
	$_SESSION['tipo_usuario']=$fetch['id_tipo'];
	echo '<script> swal({
                        title: "Bienvenido",
                        text: "Redireccionando...",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });

                var delay = 2000;
                setTimeout(function(){ window.location = "php/inicio.php"; }, delay);</script>';
}

}

 ?>