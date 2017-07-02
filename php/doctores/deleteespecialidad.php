<?php 
require_once("../../config/conexion.php");
$id=$_POST['id'];
$sql="UPDATE especialidades SET status='inactivo' WHERE id_especialidad='$id'";
$result=$con->query($sql);

$sql2="SELECT * FROM especialidades WHERE status='activo'";
$result2=$con->query($sql2);
while($rows= mysqli_fetch_array($result2)){
	echo '<tr>
			<td>'. $rows['nombre_especialidad']. '</td>
			<td><a href="verespecialidad.php?id='.$rows['id_especialidad'].'" class="btn btn-info"><span class="fa fa-eye"></span></a> <a href="editarespecialidad.php?id='.$row['id_especialidad'].'" class="btn btn-warning"><span class="fa fa-pencil-square-o"></span></a> <a href="javascript:eliminar_especialidad('.$rows['id_especialidad'].');" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
		</tr>';
}