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
</button><center><h5 id="mensajes"> *Todos lo campos Obligatorios</h5></center></div>
        		<div class="panel panel-default">
        			<div class="panel-heading" style="">
        				<center><h3 style=""><strong><i>Registro Usuario</i></strong></h3></center>
        			</div>
                    <?php require_once("../config/conexion.php"); 
                        $sql="SELECT * FROM tipo_usuario";
                        $result=$con->query($sql);
                    ?>
        			<div class="panel-body">
        				<form action="" id="form_usuario">
                            <div class="form-group col-xs-6">
                                <label for="nombre">*Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="usuario">*Usuario:</label>
                                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Nombre de usuario">
                            </div>     
                            <div class="form-group col-xs-6">
                                <label for="password">*Password:</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>     
                            <div class="form-group col-xs-6">
                                <label for="confirm_password">*Confirm Password:</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                            </div> 
                            <div class="form-group col-xs-6 col-xs-offset-3">
                                <label for="id_tipo">*Nivel de Usuario:</label>
                              <select name="id_tipo" id="id_tipo" class="form-control">
                                  <option value="">Seleccione el Nivel de Ususario</option>
                                  <?php while($row=$result->fetch_assoc()){ ?>
                                  <option value="<?php echo $row['id_tipo']; ?>"><?php echo $row['tipo']; ?></option>
                                  <?php } ?>
                              </select>
                            </div> 
                            <div class="form-group col-xs-12 col-xs-offset-5" style="margin-top: 20px;">
                                <button type="submit" id="guardar_usuario" name="guardar_usuario" class="btn btn-default">
                                    Guardar
                                </button>
                                <a href="usuarios.php" class="btn btn-default ">Regresar</a>
                            </div>                      
                        </form>
        			</div>
        		</div>
        	</div>
        </div>
</div>
</div>
 <?php require_once("footer.php"); ?>
 <script>
     $(document).ready(function(){
        $('#error').hide();
        $('#guardar_usuario').click(function(e){
            e.preventDefault();
            var nombre=$('#nombre').val();
            var usuario=$('#usuario').val();
            var password=$('#password').val();
            var confirm_password=$('#confirm_password').val();
            var id_tipo=$('#id_tipo').val();
            if(nombre===""){
                swal("Ingrese su nombre","","error");
                return false;
            }else if(usuario===""){
                swal("Ingrese su nombre de usuario","","error");
                return false;
            }else if(password===""){
                swal("Ingrese su password","","error");
                return false;
            }else if(confirm_password===""){
                swal("Confirme el password","","error");
                return false;
            }else if(password != confirm_password){
                swal("No coinciden los password","","error");
                return false;
            }else if(id_tipo===""){
                swal("Seleccione el privilegio del usuario","","");
                return false;
            }else{
            $.ajax({
                url:"usuarios/addusuario.php",
                type:"POST",
                data:$('#form_usuario').serialize(),
                success:function(data){
                    $('#mensajes').html(data);
                    $('#error').fadeIn('slow');
                    $('#error').fadeOut(5000);
                  
                }
            });
}
        });
       });
 </script>