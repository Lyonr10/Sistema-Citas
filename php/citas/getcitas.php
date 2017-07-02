<?php
require_once("../../config/conexion.php"); 
$cedula=$_POST['cedula'];
$sql="SELECT p.*,c.id_citas,c.fecha_cita,c.motivo FROM pacientes AS p INNER JOIN citas AS c ON p.ced_paciente=c.ced_paciente WHERE c.status='pendiente'";
$result=$con->query($sql);
$data=[];
while($resultado = $result->fetch_assoc())
{
	$data[] = [
'title'=> $resultado['primer_nombre'],
'date'=> $resultado['fecha_cita'],
'url'=> 'nuevaconsulta.php?id='.$resultado['id_citas']
	];
}

 echo json_encode($data);
 ?>