<?php 
require_once("../../config/conexion.php");
$id_citas=$_POST['id_citas'];
$datos_admision=$_POST['motivo'];
$enfermedad_actual=$_POST['enfermedad_actual'];
$diagnostico_clinico=$_POST['diagnostico_clinico'];
$otro_clinico=$_POST['otro_clinico'];
$intervencion_principal=$_POST['intervencion_principal'];
$pago_consulta=$_POST['pago_consulta'];

if(!$datos_admision && !$enfermedad_actual && !$diagnostico_clinico && !$intervencion_prinicipal && !$pago_consulta)
{
	echo 'Complete los campos requeridos';
}else if(!$datos_admision){
	echo 'Ingrese los datos de admision del paciente';
}else if(!$enfermedad_actual){
	echo 'Ingrese la enfermedad actual del paciente';
}else if(!$diagnostico_clinico){
	echo 'Ingrese el diagnostico clinico del paciente';
}else if(!$intervencion_principal){
	echo 'Ingrese la intervencion prinicipal del paciente';
}else if(!$pago_consulta){
	echo 'Ingrese el pago de la consulta';
}else{
	$sql="INSERT INTO consultas(id_cita,motivo_admision,enfermedad_actual,diagnostico_clinico,otro_diagnostico,intervencion_principal,pago_consulta) VALUES('$id_citas','$datos_admision','$enfermedad_actual','$diagnostico_clinico','$otro_clinico','$intervencion_principal','$pago_consulta')";
	$sql2="UPDATE citas SET status='pagado' WHERE id_citas='$id_citas'";
	$result=$con->query($sql);
	$result2=$con->query($sql2);
	echo '<script> swal({
                        title: "Consulta guardada con exito",
                        text: "Redireccionando...",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });

                var delay = 2000;
                setTimeout(function(){ window.location = "citascalendario.php"; }, delay);</script>';
}

 ?>
