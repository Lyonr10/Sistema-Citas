<?php 
require_once("../../config/conexion.php");
$id=$_POST['id'];
$sql="UPDATE usuarios SET status='inactivo' WHERE id_usuario='$id'";
$result=$con->query($sql);

$sql2="SELECT u.*,t.tipo FROM usuarios AS u INNER JOIN tipo_usuario AS t ON U.id_tipo=t.id_tipo WHERE status='activo'";
$result2=$con->query($sql2);
while($row = mysqli_fetch_array($result2)){
	echo '<tr>
				<td>'. $row['nombre'] . '</td>
				<td>'. $row['usuario'] . '</td>
				<td>'. $row['tipo'].'</td>
				<td><a href="verusuario.php?id='. $row['id_usuario'] . '" class="btn btn-info"><span class="fa fa-eye"></span></a> <a href="editarusuario.php?id='. $row['id_usuario'] . '" class="btn btn-warning"><span class="fa fa-pencil-square-o"></span></a> <a href="javascript:eliminar_usuario(' . $row['id_usuario'] . ');" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
			</tr>';

}
 ?>
