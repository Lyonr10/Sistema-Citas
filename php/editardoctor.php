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
</button><center><h5 id="mensajes">Complete los campos requeridos para continuar</h5></center></div>
        		<div class="panel panel-default">
        			<div class="panel-heading" style="">
        				<center><h3><strong><i>Editar Doctor</i></strong></h3></center>
        			</div>
                       <?php require_once("../config/conexion.php");
                       $id=$_GET['id'];
                                $sql="SELECT * FROM especialidades";
                                $result=$con->query($sql);
                                $sql2="SELECT d.*,e.nombre_especialidad FROM doctores AS d INNER JOIN especialidades AS e ON d.id_especialidad=e.id_especialidad WHERE id_doctor='$id'";
                                $result2=$con->query($sql2);
                                $row2=$result2->fetch_assoc();
                                 ?>
        			<div class="panel-body">
        				<form action="" id="form_doctor">
                            <div class="form-group col-xs-6">
                                <label for="nombre">Cedula:</label>
                                <input type="text" name="cedula" id="cedula" class="form-control" placeholder="Nombre" value="<?php echo $row2['cedula']; ?>" disabled>
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" value="<?php echo $row2['nombre']; ?>">
                            </div>     
                            <div class="form-group col-xs-6">
                                <label for="password">Apellido:</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido" value="<?php echo $row2['apellido']; ?>">
                            </div>     
                            <div class="form-group col-xs-6">
                                <label for="nombre">Fecha de Nacimiento:</label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder="Fecha de Nacimiento " value="<?php echo $row2['fecha_nacimiento']; ?>">
                            </div> 
                             <div class="form-group col-xs-6 col-xs-offset-3">
                                <label for="nombre">Especialidad:</label>
                               
                               <select name="id_especialidad" id="id_especialidad" class="form-control">
                                   <option value="<?php echo $row2['id_especialidad']; ?>"><?php echo $row2['nombre_especialidad']; ?></option>
                                   <option value="">-----------------</option>
                                   <?php while($row=$result->fetch_assoc()){ ?>
                                   <option value="<?php echo $row['id_especialidad']; ?>"><?php echo $row['nombre_especialidad'] ?></option>
                                   <?php } ?>
                               </select>
                            </div> 
                            <div class="form-group col-xs-12 col-xs-offset-5" style="margin-top: 20px;">
                            <input type="hidden" id="id_doctor" name="id_doctor" value="<?php echo $row2['id_doctor'];  ?>">
                                <button type="submit" id="editar_doctor" name="editar_doctor" class="btn btn-default">
                                    Guardar
                                </button>
                                <a href="doctores.php" class="btn btn-default ">Regresar</a>
                            </div>                      
                        </form>
        			</div>
        		</div>
        	</div>
        </div>
</div>



</div>
 <?php require_once("footer.php"); ?>
  <script >
    $(document).ready(function(){
        $('#error').hide();
        $('#editar_doctor').click(function(e){
          e.preventDefault();
          var cedula=$('#cedula').val();
          var nombre=$('#nombre').val();
          var apellido=$('#apellido').val();
          var fecha=$('#fecha_nacimiento').val();
          var especialidad=$('#id_especialidad').val();
         if(nombre===""){
            alert("Ingrese el nombre del doctor");
            return false;
          }else if(apellido===""){
            alert("Ingrese el apellido del doctor");
            return false;
          }else if(fecha===""){
            alert("Ingrese la fecha de nacimiento del doctor");
            return false;
          }else if(especialidad===""){
            alert("Seleccione la especialidad del doctor");
            return false;
          }
          else{
            $.ajax({
                url:"doctores/editdoctor.php",
                type:"POST",
                data:$('#form_doctor').serialize(),
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