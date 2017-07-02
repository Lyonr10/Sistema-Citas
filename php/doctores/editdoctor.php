<?php
require_once("../../config/conexion.php");
$id=trim($_POST['id_doctor']);
$nombre=trim($_POST['nombre']);
$apellido=trim($_POST['apellido']);
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$id_especialidad=$_POST['id_especialidad'];
 if(!$nombre){
 	echo "Ingrese el nombre del doctor";
 }else if(!$apellido){
 	echo "Ingrese el apellido del doctor";
 }else if(!$fecha_nacimiento){
 	echo "Ingrese la Fecha de nacimiento";
 }else if(!$id_especialidad){
 	echo "Seleccione la especialidad del doctor";
 }else{
 	$sql2="UPDATE doctores SET nombre='$nombre',apellido='$apellido',fecha_nacimiento='$fecha_nacimiento',id_especialidad='$id_especialidad' WHERE id_doctor='$id'";
 	$result2=$con->query($sql2);
 	echo '<script> swal({
                        title: "Datos del doctor modificados con Exito",
                        text: "Redireccionando...",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });

                var delay = 2000;
                setTimeout(function(){ window.location = "doctores.php"; }, delay);</script>';
 }
 ?>