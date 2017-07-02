<?php 
require_once("header.php");
 ?>
<?php 
require_once("../config/conexion.php");
$id=$_GET['id'];
$sql="SELECT * FROM especialidades WHERE id_especialidad='$id'";
$result=$con->query($sql);
$row = $result->fetch_assoc();
 ?>
<div class="page-content">
    <div class="bread-content">
        <div class="container">
            <h4>¡Bienvenido!</h4>
            <span class="breadcoumb"><i class="fa fa-home"></i> Inicio</span>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row" style="margin-top: 10px;">
        	<div class="col-xs-12 col-xs-offset-">
               
             
        		
        		<div class="panel panel-success">
        			<div class="panel-heading">
        				<center><h3 ><strong><i>Especialidades</i></strong></h3></center>
        			</div>
        			<?php 
        			require_once("../config/conexion.php");
        			$sql="SELECT * FROM especialidades";
        			$result=$con->query($sql);
        			 ?>
        			<div class="panel-body">
                     <div class="table-responsive">
        				<ul class="list-group">
                            <li class="list-group-item"><b>Nombre de la Especialidad: </b> <?php  echo $row['nombre_especialidad'];?></li>                   
                        </ul>
                            <a href="especialidades1.php" class="btn btn-default col-xs-offset-5">Regresar</a>
                        </div>
        			</div>
        		</div>
        	</div>
        </div>

    
  </div>
</div>
</div>
 <?php require_once("footer.php"); ?>
 