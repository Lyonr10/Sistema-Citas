<?php 
require_once("header.php");
 ?>
<?php 
require_once("../config/conexion.php");
$id=$_GET['id'];
$sql="SELECT * FROM especialidades WHERE id_especialidad='$id'";
$result=$con->query($sql);
$rows=mysqli_fetch_assoc($result);
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
</button><center><h5 id="mensajes">Especialidad eliminada con exito</h5></center></div>
        		<a href="nuevaespecialidad.php" class="btn btn-default" style="margin-bottom: 10px;"><span class="fa fa-user-plus"></span> Add Especialidad</a>
        		<div class="panel panel-success">
        			<div class="panel-heading">
        				<center><h3 ><strong><i>Especialidades</i></strong></h3></center>
        			</div>
        			
        			<div class="panel-body">   
                    <form id="form_especialidad">
                        <div class="form-group">
                            <label>Nombre de la especialidad:</label>
                            <input type="text" name="nombre_especialidad" id="nombre_especialidad" class="form-control" value="<?php echo $rows['nombre_especialidad']; ?>">
                        </div>
                        <div class="form-group col-xs-offset-4">
                        <input type="hidden" name="id" id="id" value="<?php echo $rows['id_especialidad']; ?>">
                            <button type="submit" class="btn btn-default" id="update_especialidad">Guardar</button>
                            <a href="especialidades1.php" class="btn btn-default">Regresar</a>
                        </div>
                    </form>
        			</div>
        		</div>
        	</div>
        </div>
  </div>

</div>
 <?php require_once("footer.php"); ?>
 <script type="text/javascript">
     $(document).ready(function(){
        $('#update_especialidad').click(function(e){
            e.preventDefault();
            var nombre_especialidad=$('#nombre_especialidad').val();
            if(nombre_especialidad===""){
                swal("Ingrese el nombre de la especialidad","","error");
                return false;
            }else{
                $.ajax({
                    url:"doctores/updateespecialidad.php",
                    type:"POST",
                    data:$('#form_especialidad').serialize(),
                    success:function(data){
                        $('#mensajes').html(data);
                    }
                });
            }
        });
     });
 </script>