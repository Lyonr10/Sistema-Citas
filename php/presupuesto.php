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
                        <button class="btn btn-default " type="button" onclick="buscar_presupuesto();"><span class="fa fa-search"></span></button>
                        </span>
            </div>
          </div>
                </form>
        		<a href="nuevopresupuesto.php" class="btn btn-default  col-xs-offset-4"><span class="fa fa-user-plus"></span> Add Presupuesto</a>
                </div>
        		<div class="panel panel-success" id="oculto" style="margin-top: 10px;">
        			<div class="panel-heading">
        				<center><h3 style=""><strong><i>Presupuestos Asignados</i></strong></h3></center>
        			</div>
        			<?php
        			require_once("../config/conexion.php");
        			$sql="SELECT p.*,pr.tipo_presupuesto,pr.costo_total FROM pacientes AS p INNER JOIN presupuestos AS pr ON p.ced_paciente=pr.ced_paciente";
                    $result=$con->query($sql);
        			 ?>
        			<div class="panel-body" id="">
                     <div class="table-responsive">
        				<table id="tabla" class="display">
        					<thead>
        						<th>Cedula</th>
        						<th>Nombre</th>
                                <th>Apellido</th>
        						<th>Tipo de Intervencion</th>
                                <th>Costo Total</th>
                                <th>&nbsp;</th>
        					</thead>
        					<tbody id="content">
                            <?php while($row = mysqli_fetch_assoc($result)){ ?>
        						<tr>
        							<td><?php echo $row['ced_paciente'];  ?></td>
        							<td><?php echo $row['primer_nombre']; ?></td>
                                      <td><?php echo $row['primer_apellido']; ?></td>
                                      <td><?php echo $row['tipo_presupuesto']; ?></td>
                                      <td><?php echo $row['costo_total']; ?></td>
        							<td><a href="verpresupuesto.php?id=<?php echo $row['nro_presupuesto'] ;?>" class="btn btn-info" style=""><span class="fa fa-eye" style=""></span></a> <a href="editarpresupuesto.php?id=<?php echo $row['nro_presupuesto']; ?>" class="btn btn-warning"><span class="fa fa-pencil-square-o"></span></a> <a href="deletepresupuesto.php?id=<?php echo $row['nro_presupuesto'] ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a> <a href="" class="btn btn-default">Reporte PDF</a></td>
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
