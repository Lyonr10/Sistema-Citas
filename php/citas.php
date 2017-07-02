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
            <div class="" style="">
               <form action="" class="form-inline">
                     <div class="col-xs-6 form-group" ">
                 <label for="cedula" style="font-size: 18px;">Fecha:</label>
                     <div class="input-group ">
                        <input type="date" class="form-control" id="fecha" name="fecha" placeholder="00/00/0000 ">
                        <span class="input-group-btn ">
                        <button class="btn btn-default " type="button" onclick="buscar_cita();"><span class="fa fa-search"></span></button>
                        </span>
            </div>
          </div>
                </form>
        		<a href="nuevacita.php" class="btn btn-default  col-xs-offset-4"><span class="fa fa-user-plus"></span> Add Cita</a>
                </div>
        		<div class="panel panel-success" id="oculto" style="margin-top: 10px;">
        			<div class="panel-heading">
        				<center><h3 style="color:"><strong><i>Citas</i></strong></h3></center>
        			</div>
        			<?php
        			require_once("../config/conexion.php");
        			$sql="SELECT p.ced_paciente,p.primer_nombre,p.primer_apellido,d.nombre,e.nombre_especialidad,c.id_citas,c.fecha_cita,c.motivo FROM citas AS c INNER JOIN pacientes AS p ON c.ced_paciente=p.ced_paciente INNER JOIN doctores AS d ON d.id_doctor=c.id_doctor INNER JOIN especialidades AS e ON e.id_especialidad=d.id_especialidad WHERE c.status='pendiente'";
        			$result=$con->query($sql);
        			 ?>
        			<div class="panel-body" id="">
                     <div class="table-responsive">
        				<table id="tabla" class="display">
        					<thead>
        						<th>Cedula</th>
        						<th>Nombre</th>
        						<th>Apellido</th>
                                <th>Especialidad</th>
                                <th>Doctor</th>
                                <th>Motivo</td>
        						<th>Operaciones</th>
        					</thead>
        					<tbody id="content">
        					<?php while($row=mysqli_fetch_array($result)){ ?>
        						<tr>
        							<td><?php echo $row['ced_paciente']; ?></td>
        							<td><?php echo $row['primer_nombre']; ?></td>
        							<td><?php echo $row['primer_apellido']; ?></td>
                                    <td><?php echo $row['nombre_especialidad']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                      <td><?php echo $row['fecha_cita']; ?></td>
        							<td><a href="vercita.php?id=<?php echo $row['id_citas'] ;?>" class="btn btn-info" style=""><span class="fa fa-eye" style=""></span></a> <a href="editarcita.php?id=<?php echo $row['id_citas']; ?>" class="btn btn-warning"><span class="fa fa-pencil-square-o"></span></a> <a href="javascript:eliminar_cita('<?php echo $row['id_citas']; ?>')" class="btn btn-danger"><span class="fa fa-trash"></span></a></td>
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

function buscar_cita(){
var fecha=$('#fecha').val();
if(fecha===""){
    alert("Ingrese una fecha");
    return false;
}
$.ajax({
 url:"citas/buscar_cita.php",
 typr:"GET",
 data:'fecha='+fecha,
 success:function(registro){
    $('#content').html(registro);
     $('#oculto').fadeIn('slow');
    return false;
 }

});
return false;
}
</script>
<script>
    function eliminar_cita(id){
        var pregunta=confirm("Seguro quiere eliminar?");
        if(pregunta==true){
            $.ajax({
                url:"citas/deletecita.php",
                type:"POST",
                data:'id='+id,
                success:function(respuesta){
                    $('#content').html(respuesta);

                    return false
                }
            });
            return false;
        }else{
            return false;
        }

    }

</script>