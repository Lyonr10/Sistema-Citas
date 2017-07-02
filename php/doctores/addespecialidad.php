<?php 
require_once("../../config/conexion.php");
$nombre=$_POST['nombre_especialidad'];
if(!$nombre){
	echo "Ingrese el Nombre de la especialidad";
}else{
$sql="INSERT INTO especialidades(nombre_especialidad) VALUES ('$nombre')";
$result=$con->query($sql);
echo '<script> swal({
                        title: "Especialidad guardada con exito",
                        text: "Redireccionando...",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });

                var delay = 2000;
                setTimeout(function(){ window.location = "especialidades1.php"; }, delay);</script>';
}