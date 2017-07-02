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
    $id=$_GET['id'];
    $sql="SELECT u.*,t.tipo FROM usuarios AS u INNER JOIN tipo_usuario AS t ON u.id_tipo=t.id_tipo WHERE id_usuario='$id'";
    $result=$con->query($sql);
    $row=mysqli_fetch_assoc($result);
    ?>
    <div class="container-fluid">
        <div class="row" style="margin-top: 10px;">
        	<div class="col-xs-10 col-xs-offset-1">
        		<div class="panel panel-success">
        			<div class="panel-heading">
        				<center><h3 style="color: #fff;"><strong><i>Datos del Usuario</i></strong></h3></center>
        			</div>
        			<div class="panel-body">
        				<ul class="list-group">
                            <li class="list-group-item"><b>Nombre: </b><?php echo $row['nombre']; ?>
                            </li>
                            <li class="list-group-item"><b>Usuario: </b><?php echo $row['usuario']; ?></li>
                            <li class="list-group-item"><b>Nivel: </b><?php echo $row['tipo']; ?></li>
                        </ul>
        			</div>
                    <a href="usuarios.php" class="btn btn-default col-xs-offset-5" style="margin-bottom: 10px;">Regresar</a>
        		</div>
        	</div>
        </div>
</div>
</div>
 <?php require_once("footer.php"); ?>