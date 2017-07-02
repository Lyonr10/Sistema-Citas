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

    <div class="container-fluid">
        <div class="row" style="margin-top: 10px;">
        	<div class="col-xs-12 col-xs-offset-">
                <div class="col-xs-12 col-xs-offset-">
              <div id="error" class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button><center><h5 id="mensajes">Usuario eliminado con exito</h5></center></div>
        		<a href="nuevodoctor.php" class="btn btn-default" style="margin-bottom: 20px;"><span class="fa fa-user-plus"></span> Add Doctor</a>
        		<div class="panel panel-success">
        			<div class="panel-heading">
        				<center><h3 ><strong><i>Doctores</i></strong></h3></center>
        			</div>
        			<?php 
        			require_once("../config/conexion.php");
        			$sql="SELECT d.*,e.nombre_especialidad FROM doctores AS d INNER JOIN especialidades AS e ON d.id_especialidad=e.id_especialidad WHERE status='activo'";
        			$result=$con->query($sql);
        			 ?>
        			<div class="panel-body">
                     <div class="table-responsive">
        				<table id="tabla" class="display">
        					<thead>
        						<th>Cedula</th>
        						<th>Nombre</th>
        						<th>Apellido</th>
        						<th>Especialidad</th>
        						<th>Operaciones</th>
        					</thead>
        					<tbody id="content">
        					<?php while($row=mysqli_fetch_assoc($result)){ ?>
        						<tr>
        							<td><?php echo $row['cedula']; ?></td>
        							<td><?php echo $row['nombre']; ?></td>
        							<td><?php echo $row['apellido'] ?></td>
        							<td><?php echo $row['nombre_especialidad']; ?></td>
        							<td><a href="verdoctor.php?id=<?php echo $row['id_doctor']; ?>" class="btn  btn-info" ><span class="fa fa-eye" style=""></span></a> <a href="editardoctor.php?id=<?php echo $row['id_doctor']; ?>" class="btn  btn-warning"><span class="fa fa-pencil-square-o"></span></a> <a href="javascript:eliminar_doctor('<?php echo $row['id_doctor']; ?>');" class="btn  btn-danger"><span class="fa fa-trash"></span></a></td>
        						</tr>
        						<?php } ?>
        					</tbody>
        				</table>
                        </div>
        			</div>
        		</div>
        	</div>
        </div>

    
  </div>
</div>
</div>
 <?php require_once("footer.php"); ?>
 <script>
 $('#error').hide();
     function eliminar_doctor(id){
        var confirmar=confirm("Seguro desea eliminar el doctor seleccionado?");
        if(confirmar==true){
            $.ajax({
                url:"doctores/deletedoctor.php",
                type:"POST",
                data:'id='+id,
                success:function(respuesta){
                    $('#content').html(respuesta);
                    $('#error').fadeIn('slow');
                    $('#error').fadeOut(5000);
                    return false;
                }
            });
            return false;
        }else{
            return false;
        }
     }
 </script>