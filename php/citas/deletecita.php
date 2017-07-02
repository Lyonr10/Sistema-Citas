<?php 
require_once("../../config/conexion.php");
$id=$_POST['id'];
$sql="DELETE FROM citas WHERE id_citas='$id'";
$result=$con->query($sql);


 ?>