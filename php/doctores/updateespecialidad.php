<?php 
require_once("../../config/conexion.php");
$id=$_POST['id'];
$nombre_especialidad=$_POST['nombre_especialidad'];
$sql="UPDATE especialidades SET nombre_especialidad='$nombre_especialidad' WHERE id_especialidad='$id'";
$result=$con->query($sql);
echo '<script> swal({
                        title: "Especialidad modificada con exito",
                        text: "Redireccionando...",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });

                var delay = 2000;
                setTimeout(function(){ window.location = "especialidades1.php"; }, delay);</script>';
 ?>