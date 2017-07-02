<?php 
require_once("../../config/conexion.php");
$cedula=trim($_POST['cedula']);
$doctor=trim($_POST['id_doctor']);
$fecha=trim($_POST['fecha_cita']);
$motivo=trim($_POST['motivo']);
if(!$cedula && !$doctor && $fecha && $motivo){
	echo "Todos los campos son requeridos";
}else if(!$cedula){
	echo "Inserte  numero de cedula";
}else if(!$doctor){
	echo "Seleccione el doctor a consultar";
}
else if(!$fecha){
	echo "Ingrese una fecha para la cita";
}else if(!$motivo){
	echo "Ingrese motivo de la cita";
}else{
$sql="INSERT INTO citas(ced_paciente,id_doctor,fecha_cita,motivo) VALUES ('$cedula','$doctor','$fecha','$motivo')";
$result=$con->query($sql);
echo '<script>swal({
                        title: "Cita guardada con exito",
                        text: "Redireccionando...",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });

                var delay = 2000;
                setTimeout(function(){ window.location = "citascalendario.php"; }, delay);</script>';
}
 ?>