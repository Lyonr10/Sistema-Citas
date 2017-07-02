<?php 
require_once("../../config/conexion.php");
$cedula=$_POST['cedula'];
$sql="UPDATE pacientes SET status='inactivo' WHERE ced_paciente='$cedula'";
$result=$con->query($sql);


$sql2="SELECT * FROM pacientes WHERE status='activo'";
$result2=$con->query($sql2);
$rows = mysqli_fetch_array($result2);

while($rows)
{
	echo '<tr>
				<td>'. $rows['ced_paciente']. '</td>
				<td>'. $rows['primer_nombre']. '</td>
				<td>'. $rows['primer_apellido'].'</td>
				<td>'. $rows['fecha_nacimiento'].'</td>
				<td>'. $rows['telefono']. '</td>
				<td>'. $rows['responsable']. '</td>
				<td><a hred=verpaciente.php?id='. $rows['ced_paciente'].'" class="btn btn-info"><span class="fa fa-eye"></span></a> <a href=editarpaciente.php?id='.$rows['ced_paciente']. '" class="btn btn-warning"><span class="fa fa-pencil-square-o"></span></a> <a href="javascript:eliminar_paciente('.$rows['ced_paciente'].');" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
		</tr>';
}	
 ?>