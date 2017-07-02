<?php 
require_once("header.php");
 ?>

<div class="page-content">
    <div class="bread-content">
        <div class="container">
            <h4>¡Bienvenido!</h4>
            <span class="breadcoumb"><i class="fa fa-home"></i> Inicio</span>
        </div>
    </div>
    <?php  
    require_once("../config/conexion.php");
    $cedula=$_GET['cedula'];
    $sql="SELECT * FROM pacientes WHERE ced_paciente='$cedula'";
    $result=$con->query($sql);
    $row=mysqli_fetch_assoc($result);
    ?>
    <div class="container-fluid">
        <div class="row" style="margin-top: 10px;">
        	<div class="col-xs-10 col-xs-offset-1">
        		<div class="panel panel-success">
        			<div class="panel-heading">
        				<center><h3 style=""><strong><i>Datos del Paciente</i></strong></h3></center>
        			</div>
        			<div class="panel-body">
        				<ul class="list-group">
                         <li class="list-group-item"><b>Cedula: </b><?php echo $row['ced_paciente']; ?>
                            </li>
                            <li class="list-group-item"><b>Nombre: </b><?php echo $row['primer_nombre']; ?>
                            </li>
                            <li class="list-group-item"><b>Apellido: </b><?php echo $row['segundo_nombre']; ?></li>
                             <li class="list-group-item"><b>Apellido: </b><?php echo $row['primer_apellido']; ?></li>
                              <li class="list-group-item"><b>Apellido: </b><?php echo $row['segundo_apellido']; ?></li>
                            <li class="list-group-item"><b>Fecha de Nacimiento: </b><?php echo $row['fecha_nacimiento']; ?></li>
                             <li class="list-group-item"><b>Edad: </b><?php echo $row['edad']; ?>
                            </li>
                             <li class="list-group-item"><b>Nro Movil: </b><?php echo $row['telefono']; ?>
                            </li>
                             <li class="list-group-item"><b>Apellido: </b><?php echo $row['direccion']; ?></li>
                             <li class="list-group-item"><b>Responsable: </b><?php echo $row['responsable']; ?>
                            </li>
                        </ul>
        			</div>
                    <a href="pacientes.php" class="btn btn-default col-xs-offset-5" style="margin-bottom: 10px;">Regresar</a>
        		</div>
        	</div>
        </div>
</div>
</div>
 <?php require_once("footer.php"); ?>