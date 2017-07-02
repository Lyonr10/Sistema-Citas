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
</button><center><h5 id="mensajes">Sin ningun resultado</h5></center></div>
        		<div class="panel panel-success">
        			<div class="panel-heading" >
        				<center><h3 style=""><strong><i>Editar Usuario</i></strong></h3></center>
        			</div>
                      <?php require_once("../config/conexion.php"); 
                        $sql="SELECT * FROM tipo_usuario";
                        $result=$con->query($sql);
                        

                        $id=$_GET['id'];
                        $sql2="SELECT u.*,t.id_tipo,t.tipo FROM usuarios AS u INNER JOIN tipo_usuario AS t ON u.id_tipo=t.id_tipo WHERE u.id_usuario='$id'";
                        $result2=$con->query($sql2);
                        $row2=$result2->fetch_assoc();
                    ?>
        			<div class="panel-body">
        				<form action="" id="form_usuario">
                            <div class="form-group col-xs-6">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" value="<?php echo $row2['nombre']; ?>">
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="usuario">Usuario:</label>
                                <input type="text" name="usuario" id="usuario" class="form-control" placeholder="" value="<?php echo $row2['usuario']; ?>">
                            </div>     
                            <div class="form-group col-xs-6">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" class="form-control" value="<?php echo $row2['password']; ?>">
                            </div>     
                            <div class="form-group col-xs-6">
                                <label for="nombre">Confirm Password:</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" value="<?php echo $row2['password'] ?>">
                            </div> 
                            <div class="form-group col-xs-6 col-xs-offset-3">
                                <label for="id_tipo">Nivel de Usuario:</label>
                              <select name="id_tipo" id="id_tipo" class="form-control">
                                  <option value="<?php echo $row2['id_tipo']; ?>"><?php echo $row2['tipo']; ?></option>
                                  <option value="">-------------------</option>
                                  <?php while($row=$result->fetch_assoc()){ ?>
                                  <option value="<?php echo $row['id_tipo']; ?>"><?php echo $row['tipo']; ?></option>
                                  <?php } ?>
                              </select>
                            </div> 
                            <div class="form-group col-xs-12 col-xs-offset-5" style="margin-top: 20px;">
                            <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $row2['id_usuario']; ?>">
                                <button type="submit" id="editar_usuario" name="editar_usuario" class="btn btn-default">
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
        $('#editar_usuario').click(function(e){
              e.preventDefault();
            var nombre=$('#nombre').val();
            var usuario=$('#usuario').val();
            var password=$('#password').val();
            var confirm_password=$('#confirm_password').val();
            var id_tipo=$('#id_tipo').val();
            if(nombre===""){
                alert("Ingrese su nombre");
                return false;
            }else if(usuario===""){
                alert("Ingrese su nombre de usuario");
                return false;
            }else if(password===""){
                alert("Ingrese su password");
                return false;
            }else if(confirm_password===""){
                alert("Confirme el password");
                return false;
            }else if(password != confirm_password){
                alert("No coinciden los password");
                return false;
            }else if(id_tipo===""){
                alert("Seleccione el privilegio del usuario");
                return false;
            }else{
            $.ajax({
                url:"usuarios/editusuario.php",
                type:"POST",
                data:$('#form_usuario').serialize(),
                success:function(data){
                    $('#mensajes').html(data);
                    $('#error').fadeIn('slow');
                }
            });
}
        });
     });
 </script>