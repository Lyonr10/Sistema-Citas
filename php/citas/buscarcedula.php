<?php
require_once("../../config/conexion.php"); 
$cedula=$_POST['cedula'];
$sql="SELECT * FROM pacientes WHERE ced_paciente='$cedula'";
$result=$con->query($sql);
$data=$result->fetch_assoc();
 echo json_encode($data);
 ?>