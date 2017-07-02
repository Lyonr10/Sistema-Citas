<?php 
require_once("../../config/conexion.php");
$cedula=trim($_POST['cedula']);
$nombre=trim($_POST['nombre']);
$apellido=trim($_POST['apellido']);
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$especialidad=$_POST['id_especialidad'];

$sql="SELECT * FROM doctores WHERE cedula='$cedula'";
$result=$con->query($sql);
$rows=$result->num_rows;
if(!$cedula){
	echo "Ingrese el numero de cedula";
 }else if(!$nombre){
 	echo "Ingrese el nombre del doctor";
 }else if(!$apellido){
 	echo "Ingrese el apellido del doctor";
 }else if(!$fecha_nacimiento){
 	echo "Ingrese la Fecha de nacimiento";
 }else if(!$especialidad){
 	echo "Seleccione la especialidad del doctor";
 }else if($rows==0){
 	$sql2="INSERT INTO doctores(cedula,nombre,apellido,fecha_nacimiento,id_especialidad) VALUES ('$cedula','$nombre','$apellido','$fecha_nacimiento',$especialidad)";
 	$result2=$con->query($sql2);
 	echo '<script> swal({
                        title: "Doctor guardado con exito",
                        text: "Redireccionando...",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });

                var delay = 2000;
                setTimeout(function(){ window.location = "doctores.php"; }, delay);</script>';
 }else{
 	echo "El doctor ya se encuentra registrado";
 }

 ?>
