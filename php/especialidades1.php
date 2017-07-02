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
              <div id="error" class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button><center><h5 id="mensajes">Especialidad eliminada con exito</h5></center></div>
        		<a href="nuevaespecialidad.php" class="btn btn-default" style="margin-bottom: 10px;"><span class="fa fa-user-plus"></span> Add Especialidad</a>
        		<div class="panel panel-success">
        			<div class="panel-heading">
        				<center><h3 ><strong><i>Especialidades</i></strong></h3></center>
        			</div>
        			<?php 
        			require_once("../config/conexion.php");
        			$sql="SELECT * FROM especialidades WHERE status='activo'";
        			$result=$con->query($sql);
        			 ?>
        			<div class="panel-body">
                     <div class="table-responsive">
        				<table id="tabla" class="display">
        					<thead>
        						<th>Nombre de la Especialidad</th>
        						<th>&nbsp;</th>
        					</thead>
        					<tbody id="content">
        					<?php while($row=mysqli_fetch_assoc($result)){ ?>
        						<tr>
        							<td><?php echo $row['nombre_especialidad']; ?></td>
        							<td><a href="verespecialidad.php?id=<?php echo $row['id_especialidad']; ?>" class="btn  btn-info" ><span class="fa fa-eye" style=""></span></a> <a href="editarespecialidad.php?id=<?php echo $row['id_especialidad']; ?>" class="btn  btn-warning"><span class="fa fa-pencil-square-o"></span></a> <a href="javascript:eliminar_especialidad('<?php echo $row['id_especialidad']; ?>');" class="btn  btn-danger"><span class="fa fa-trash"></span></a></td>
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
 <script type="text/javascript">
   $('#error').hide();
     function eliminar_especialidad(id){
        var confirmar=confirm("Seguro quiere eliminar esta especialidad?");
        if(confirmar){
            $.ajax({
                url:"doctores/deleteespecialidad.php",
                type:"POST",
                data:'id='+id,
                success:function(data){
                    $('#content').html(data);
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
