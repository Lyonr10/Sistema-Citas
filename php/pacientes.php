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
            <div id="error" class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button><center><h5 id="mensajes">Paciente eliminado con exito</h5></center></div>
        		<a href="nuevopaciente.php" class="btn btn-default" style="margin-bottom: 10px;"><span class="fa fa-user-plus"></span> Add Paciente</a>
        		<div class="panel panel-success">
        			<div class="panel-heading">
        				<center><h3 style=""><strong><i>Pacientes</i></strong></h3></center>
        			</div>
        			<?php 
        			require_once("../config/conexion.php");
        			$sql="SELECT * FROM pacientes WHERE status='activo'";
        			$result=$con->query($sql);
        			 ?>
        			<div class="panel-body">
                        <div class="table-responsive">
        				<table id="tabla" class="table">
        					<thead>
        						<th>Cedula</th>
        						<th>Nombre</th>
        						<th>Apellido</th>
                                <th>Fecha Nacimiento</th>
                                <th>Nro Movil</th>
                                <th>Responsable</th>
        						<th>Operaciones</th>
        					</thead>
        					<tbody id="content">
        					<?php while($row=mysqli_fetch_assoc($result)){ ?>
        						<tr>
        							<td><?php echo $row['ced_paciente']; ?></td>
        							<td><?php echo $row['primer_nombre']; ?></td>
        							<td><?php echo $row['primer_apellido']; ?></td>
                                    <td><?php echo $row['fecha_nacimiento']; ?></td>
                                    <td><?php echo $row['telefono']; ?></td>
                                    <td><?php echo $row['responsable']; ?></td>
        							<td><a href="verpaciente.php?cedula=<?php echo $row['ced_paciente']; ?>" class="btn btn-info" style=""><span class="fa fa-eye" style=""></span></a> <a href="editarpaciente.php?cedula=<?php echo $row['ced_paciente']; ?>" class="btn btn-warning"><span class="fa fa-pencil-square-o"></span></a> <a href="javascript:eliminar_paciente('<?php echo $row['ced_paciente']; ?>');" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
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
 <?php require_once("footer.php"); ?>
 <script type="text/javascript">
 $('#error').hide(); 
     function eliminar_paciente(cedula){
        var confirmar=confirm("Seguro desea eliminar el paciente seleccionado");
        if(confirmar){
            $.ajax({
                url:"pacientes/delete.php",
                type:"POST",
                data:'cedula='+cedula,
                success:function(respuesta){
                    $('#content').html(respuesta);
                    $('#error').fadeIn('slow');
                    $('#error').fadeOut(7000);
                }
            });
        }
     }
 </script>