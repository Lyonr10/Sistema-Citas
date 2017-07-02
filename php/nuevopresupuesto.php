<?php 
require_once("header.php");
 ?>
<?php 
require_once("../config/conexion.php");


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
</button><center><h5 id="mensajes">Sin ningun resultado</h5></center></div>
        		<div class="panel panel-success">
        			<div class="panel-heading">
        				<center><h3 ><strong><i>Datos del Paciente</i></strong></h3></center>
        			</div>
        			<div class="panel-body">
        				<form action="presupuestos/addpresupuesto.php" id="form_cita">
                            <div class="col-xs-6 form-group" ">
                                <label for="cedula ">Cedula:</label>
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

                    <div class="panel panel-default">
                    <div class="panel-heading" >
                        <center><h3 ><strong><i>Datos del Presupuesto</i></strong></h3></center>
                    </div>
                    <div class="panel-body">
                        <div class="form-group col-xs-6">
                            <label for="">Fecha del Presupuesto</label>
                            <input type="date" name="fecha" id="fecha" class="form-control">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="">Tipo de Intervención</label>
                            <input type="text" name="Intervencion" id="Intervencion" class="form-control" placeholder="Ejm: Operacion de fractura de tibia">
                        </div>
                        <div class="form-group col-xs-6">
                            <label for="">Honorarios del cirujano y su equipo en quirófano:</label>
                            <input type="text" name="honorarios_cirugano" id="honorarios_cirugano" placeholder="25000.00" class="form-control">
                        </div>
                         <div class="form-group col-xs-6">
                            <label for="">Honorarios de los médicos de anestesia:</label>
                            <input type="text" name="honorarios_anestecia" id="honorarios_anestecia" placeholder="40000.00" class="form-control">
                        </div>
                         <div class="form-group col-xs-6">
                            <label for="">Gastos clínicos:</label>
                            <input type="text" name="gastos_clinicos" id="gastos_clinicos" placeholder="30000" class="form-control">
                        </div>
                         <div class="form-group col-xs-6">
                            <label for="">Estancia en habitacion por días:</label>
                            <input type="text" name="estancia_habitacion" id="estancia_habitacion" placeholder="" class="form-control">
                        </div>
                         <div class="form-group col-xs-6">
                            <label for="">Otros conceptos:</label>
                            <input type="text" name="otros" id="otros" placeholder="40000" class="form-control">
                        </div>
                         <div class="form-group col-xs-6">
                            <label for="">Costo Total:</label>
                            <input type="text" name="otros" id="otros" placeholder="40000" class="form-control">
                        </div>
                         <div class="form-group col-xs-6 col-xs-offset-5" style="margin-top: 20px;">
                            <button type="submit" id="guardar_presupuesto" name="guardar_presupuesto" class="btn btn-default">Guardar</button>
                            <a href="presupuesto.php" class=" btn btn-default">Regresar</a>
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
    function buscar_cedula(){
        var cedula=$('#cedula').val();
        if(cedula===""){
            alert("Ingrese su numero de cedula");
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
        $('#errno').hide();
    });
</script>