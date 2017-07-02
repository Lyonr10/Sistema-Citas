<?php 
require_once("../../config/conexion.php");
$cedula=trim($_POST['cedula']);
$pri_nombre=trim($_POST['pri_nombre']);
$seg_nombre=trim($_POST['seg_nombre']);
$pri_apellido=trim($_POST['pri_apellido']);
$seg_apellido=trim($_POST['seg_apellido']);
$fecha_nacimiento=trim($_POST['fecha_nacimiento']);
$edad=trim($_POST['edad']);
$direccion=trim($_POST['direccion']);
$telefono=trim($_POST['telefono']);
$responsable=trim($_POST['responsable']);
$ocupacion=trim($_POST['ocupacion']);

$sql="SELECT * FROM pacientes WHERE ced_paciente='cedula'";
$result=$con->query($sql);
$rows=$result->num_rows;
$row=$result->
if(!$cedula && !$pri_nombre && !$seg_nombre && !$pri_apellido && !$seg_apellido && !$fecha_nacimiento && !$fecha_nacimiento && !$edad && !$direccion && !$telefono && !$responsable && !$ocupacion){
	echo "Todos los campos son requeridos";
}else if(!$cedula){
	echo "Ingrese su numero de cedula";
}else if(!$pri_nombre){
	echo "Ingrese su primer nombre";
}else if(!$seg_nombre){
	echo "Ingrese su segundo nombre";
}else if(!$pri_apellido){
	echo "Ingrese su primer apellido";
}else if(!$seg_apellido){
	echo "Ingrese su segundo apellido";
}else if(!$fecha_nacimiento){
	echo "Ingrese su fecha de nacimiento";
}else if(!$edad){
	echo "Ingrese su edad";
}else if(!$direccion){
	echo "Ingrese su direccion";
}else if(!$telefono){
	echo "Ingrese su numero de telefono";
}else if(!$responsable){
	echo "Ingrese el responsable del paciente";
}else if(!$ocupacion){
	echo "Ingrese la ocupacion del paciente";
}else if($rows==0){
	$sql2="INSERT INTO pacientes(ced_paciente,primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,fecha_nacimiento,edad,direccion,telefono,ocupacion,responsable) VALUES('$cedula','$pri_nombre','$seg_nombre','$pri_apellido','$seg_apellido','$fecha_nacimiento','$edad','$direccion','$telefono','$responsable','$ocupacion')";
	$result2=$con->query($sql2);
	echo '<script> swal({
                        title: "Doctor guardado con exito",
                        text: "Redireccionando...",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });

                var delay = 2000;
                setTimeout(function(){ window.location = "pacientes.php?id='. $row; }, delay);</script>;
}else{
	echo "La cedula del paciente ingresado ya se encuentra registrado";
}
?>
