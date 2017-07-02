<?php 
require_once("../../config/conexion.php");
$ced_paciente=$_POST['cedula'];
$primer_nombre=$_POST['pri_nombre'];
$segundo_nombre=$_POST['seg_nombre'];
$primer_apellido=$_POST['pri_apellido'];
$segundo_apellido=$_POST['seg_apellido'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$edad=$_POST['edad'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$responsable=$_POST['responsable'];
$ocupacion=$_POST['ocupacion'];
if(!$primer_nombre && !$segundo_nombre && !$primer_apellido && !$segundo_apellido && !$fecha_nacimiento && !$edad && !$direccion && !$telefono && !$responsable && !$ocupacion)
{
  echo "Todos los campos requeridos";
}else if(!$primer_nombre)
{
echo "Ingrese Primer nombre del paciente";
}else if(!$segundo_nombre)
{
echo "Ingrese segundo Nombre del paciente";
}else if(!$primer_apellido)
{
echo "Ingrese primer apellido del paciente";
}else if(!$segundo_apellido)
{
echo "Ingrese segundo apellido del paciente";
}else if(!$fecha_nacimiento)
{
echo "Ingrese su fecha de nacimiento del paciente";
}else if(!$edad)
{
echo "Ingrese edad del paciente";
}else if(!$direccion)
{
echo "Ingrese direccion del paciente";
}else if(!$telefono)
{
echo "Ingrese Numero de telefono del paciente";
}else if(!$responsable)
{
echo "Ingrese responsable del paciente";
}else if(!$ocupacion)
{
echo "Ingrese ocupacion del paciente";
}else
{
	$sql="UPDATE pacientes SET primer_nombre='$primer_nombre',segundo_nombre='$segundo_nombre',primer_apellido='$primer_apellido',segundo_apellido='$segundo_apellido',fecha_nacimiento='$fecha_nacimiento',edad='$edad',direccion='$direccion',telefono='$telefono',ocupacion='$ocupacion',responsable='$responsable' WHERE ced_paciente='$ced_paciente'";
	$result=$con->query($sql);
	echo '<script> swal({
                        title: "Datos del paciente modificados con Exito",
                        text: "Redireccionando...",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });

                var delay = 2000;
                setTimeout(function(){ window.location = "pacientes.php"; }, delay);</script>';
}
 ?>



