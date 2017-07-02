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
              <div id="error" class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button><center><h5 id="mensajes">Usuario eliminado con exito</h5></center></div>
        		<a href="nuevousuario.php" class="btn btn-default" style="margin-bottom: 20px;"><span class="fa fa-user-plus"></span> Add Usuario</a>
        		<div class="panel panel-success">
        			<div class="panel-heading" style="">
        				<center><h3 style=""><strong><i>Usuarios</i></strong></h3></center>
        			</div>
        			<?php 
        			require_once("../config/conexion.php");
        			$sql="SELECT u.*,t.tipo FROM usuarios AS u INNER JOIN tipo_usuario AS t ON u.id_tipo=t.id_tipo WHERE status='activo'";
        			$result=$con->query($sql);
        			 ?>
        			<div class="panel-body">
                     <div class="table-responsive">
        				<table id="tabla" class="display">
        					<thead>
        						<th>Nombre</th>
        						<th>Usuario</th>
        						<th>Nivel Usuario</th>
        						<th>Operaciones</th>
        					</thead>
        					<tbody id="content">
        					<?php while($row=mysqli_fetch_array($result)){ ?>
        						<tr>
        							<td><?php echo $row['nombre']; ?></td>
        							<td><?php echo $row['usuario']; ?></td>
        							<td><?php echo $row['tipo']; ?></td>
        							<td><a href="verusuario.php?id=<?php echo $row['id_usuario']; ?>" class="btn btn-info" style=""><span class="fa fa-eye" style=""></span></a> <a href="editarusuario.php?id=<?php echo $row['id_usuario']; ?>" class="btn btn-warning"><span class="fa fa-pencil-square-o"></span></a> <a href="javascript:eliminar_usuario('<?php echo $row['id_usuario']; ?>');" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
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
 <script>
 $('#error').hide();
     function eliminar_usuario(id){
       var confirmar=confirm("Desea eliminar el usuario seleccionado?");
       if(confirmar==true){
        $.ajax({
            url:"usuarios/deleteusuario.php",
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