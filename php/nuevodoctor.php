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
</button><center><h5 id="mensajes">Todos los campos son requeridos</h5></center></div>
        		<div class="panel panel-success">
        			<div class="panel-heading" style="">
        				<center><h3 ><strong><i>Registro Doctor</i></strong></h3></center>
        			</div>
        			<div class="panel-body">
        				<form action="" id="form_doctor">
                            <div class="form-group col-xs-6">
                                <label for="nombre">*Cedula:</label>
                                <input type="number" name="cedula" id="cedula" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="nombre">*Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
                            </div>     
                            <div class="form-group col-xs-6">
                                <label for="password">*Apellido:</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido">
                            </div>     
                             <div class="form-group col-xs-6">
                                 <label for="">*Fecha de nacimiento:</label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"  placeholder="00/00/0000">
                                </div> 
                             <div class="form-group col-xs-6 col-xs-offset-3">
                                <label for="nombre">*Especialidad:</label>
                                <?php require_once("../config/conexion.php");
                                $sql="SELECT * FROM especialidades";
                                $result=$con->query($sql);
                                 ?>
                               <select name="id_especialidad" id="id_especialidad" class="form-control">
                               <option value="">Seleccione La Especialidad</option>
                               <?php while($row=$result->fetch_assoc()){ ?>
                                   <option value="<?php echo $row['id_especialidad']; ?>"><?php echo $row['nombre_especialidad']; ?></option>
                                   <?php } ?>
                               </select>
                            </div> 
                            <div class="form-group col-xs-12 col-xs-offset-4" style="margin-top: 20px;">
                                <button type="submit" id="guardar_doctor" name="guardar_doctor" class="btn btn-default" style="">
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
      
        $('#guardar_doctor').click(function(e){
          e.preventDefault();
          var cedula=$('#cedula').val();
          var nombre=$('#nombre').val();
          var apellido=$('#apellido').val();
          var fecha=$('#fecha_nacimiento').val();
          var especialidad=$('#id_especialidad').val();
          if(cedula===""){
            swal("Ingrese el nro de cedula del doctor","","error");
            return false;
          }else if(nombre===""){
            swal("Ingrese el nombre del doctor","","error");
            return false;
          }else if(apellido===""){
            swal("Ingrese el apellido del doctor","","error");
            return false;
          }else if(fecha===""){
            swal("Ingrese la fecha de nacimiento del doctor","","error");
            return false;
          }else if(especialidad===""){
            swal("Seleccione la especialidad del doctor","","error");
            return false;
          }
          else{
            $.ajax({
                url:"doctores/adddoctor.php",
                type:"POST",
                data:$('#form_doctor').serialize(),
                success:function(data){
                    $('#mensajes').html(data);
                  
                }
            });
          }

        });
    });
 </script>