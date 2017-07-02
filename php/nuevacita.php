<?php 
require_once("header.php");
 ?>
<?php 
require_once("../config/conexion.php");
$sql="SELECT * FROM pacientes";

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
               <div id="errno" class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button><center><h5 id="mensajes">Complete todos los Campos requeridos *</h5></center></div>
        		<div class="panel panel-success">
        			<div class="panel-heading">
        				<center><h3 ><strong><i>Datos del Paciente</i></strong></h3></center>
        			</div>
        			<div class="panel-body">
        				<form action="" id="form_cita">
                            <div class="col-xs-6 form-group" ">
                                <label for="cedula ">* Cedula:</label>
                                <div class="input-group ">
                                <input type="number" class="form-control" id="cedula" name="cedula" placeholder="ej. 24924739" maxlength="9">
                                <span class="input-group-btn ">
                                <button class="btn btn-default " type="button" onclick="buscar_cedula();"><span class="fa fa-search"></span></button>
                                </span>
                            </div>
                    </div>
                            <div class="form-group col-xs-6">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" disabled>
                            </div>     
                            <div class="form-group col-xs-6">
                                <label for="password">Apellido:</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido" disabled>
                            </div>     
                             <div class="form-group col-xs-6">
                                 <label for="">Responsable</label>
                                <input type="text" class="form-control" id="responsable" name="responsable" placeholder="Responsable del Paciente" disabled>
                                </div> 
                            </div>                      
        			</div>

                    <div class="panel panel-success">
                    <div class="panel-heading" >
                        <center><h3 ><strong><i>Datos de la Cita</i></strong></h3></center>
                    </div>
                    <div class="panel-body">
                    <?php 
                    require_once("../config/conexion.php");
                    $sql="SELECT id_especialidad,nombre_especialidad FROM especialidades";
                    $result=$con->query($sql);
                     ?>
                            <div class="form-group col-xs-6">
                                <label for="nombre">* Especialidad:</label>
                                <select name="id_especialidad" id="id_especialidad" class="form-control">
                                    <option value="">* Elegir Especialidad</option>
                                    <?php while($row=mysqli_fetch_assoc($result)){ ?>
                                    <option value="<?php echo $row['id_especialidad']; ?>"><?php echo $row['nombre_especialidad']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>     
                            <div class="form-group col-xs-6">
                                <label for="id_doctor">* Doctor:</label>
                                <select name="id_doctor" id="id_doctor" class="form-control">
                                   <option value="">Seleccione Doctor</option>
                                </select>
                            </div>     
                             <div class="form-group col-xs-6 ">
                                 <label for="">* Fecha:</label>
                                <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" placeholder="00/00/0000">
                                </div> 
                                 <div class="form-group col-xs-6">
                                 <label for="">Motivo:</label>
                                <textarea name="motivo" id="motivo" cols="30" rows="2" class="form-control"></textarea>
                                </div>
                             <div class="form-group col-xs-12 col-xs-offset-4" style="margin-top: 20px;">
                                <button type="submit" id="guardar_cita" name="guardar_cita" class="btn btn-default"">
                                    Guardar
                                </button>
                                <a href="citascalendario.php" class="btn btn-default ">Regresar</a>
                            </div>                      
                        </form>
                            </div>                      
                    </div>


        		</div>
        	</div>
        </div>
</div>
</div>
 <?php require_once("footer.php"); ?>
<script>
    $(document).ready(function(){

        $('#id_especialidad').on('change',function(){
            var id=$('#id_especialidad').val();
            $.ajax({
                url:"citas/cargardoctores.php",
                type:"POST",
                data:{'id': id},
                success:function(respuesta){
                    $('#id_doctor').html(respuesta);
                }
            });
        });

    });
</script>
<script>
    function buscar_cedula(){
        var cedula=$('#cedula').val();
        if(cedula===""){
            swal("Ingrese su numero de cedula","","error");
        }
        $.ajax({
            url:"citas/buscarcedula.php",
            type:"POST",
            data:{'cedula':cedula},
            dataType:"JSON",
            success:function(data){
                $('#nombre').val(data.primer_nombre);
                $('#apellido').val(data.primer_apellido);
                $('#responsable').val(data.responsable);
            }
        });
    }

</script>
<script>
    $(document).ready(function(){
    $('#guardar_cita').click(function(e){
        e.preventDefault();
        var cedula=$('#cedula').val();
        var especialidad=$('#id_especialidad').val();
        var doctor=$('#id_doctor').val();
        var fecha_cita=$('#fecha_cita').val();
        var motivo=$('#motivo').val();
        if(cedula==="" && especialidad==="" && doctor==="" && fecha_cita===""){
            swal("Todos los campos requeridos","","error");
        }
        else if(cedula===""){
            swal("Ingresa su numero de cedula","","error");
            return false;
        }else if(especialidad===""){
            swal("Seleccione su especialidad","","error");
            return false;
        }else if(doctor===""){
            swal("Seleccione su doctor","","error");
            return false;

        }else if(fecha_cita===""){
            swal("Ingrese la fecha de la cita","","error");
        }else{
            $.ajax({
            url:"citas/addcita.php",
            type:"POST",
            data:$('#form_cita').serialize(),
            success:function(data){
                $('#mensajes').html(data);
            }
        })
    }
    });


    });
</script>