<?php 
require_once("../../config/conexion.php");
$id=$_POST['id'];
$sql="UPDATE doctores SET status='inactivo' WHERE id_doctor='$id'";
$result=$con->query($sql);

$sql2="SELECT d.*,e.nombre_especialidad FROM doctores AS d INNER JOIN especialidades AS e ON d.id_especialidad=e.id_especialidad WHERE d.status='activo'";
$result2=$con->query($sql2);
while($row = mysqli_fetch_array($result2)){

	echo '<tr>
				<td>'. $row['cedula']. '</td>
				<td>'. $row['nombre']. '</td>
				<td>'. $row['apellido']. '</td>
				<td>'. $row['nombre_especialidad']. '</td>
				<td><a href="verdoctor.php?id='. $row['id_doctor'] .'" class="btn btn-info"><span class="fa fa-eye"></span></a> <a href="editardoctor.php?id=' . $row['id_doctor'] . '" class="btn btn-warning"><span class="fa fa-pencil-square-o"></span></a> <a href="javascript:eliminar_doctor('. $row['id_doctor'] . '); class="btn btn_danger"><span class="fa fa-trash"></span></a></td>
		</tr>';

}
 ?>
