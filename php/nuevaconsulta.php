<?php 
require_once("header.php");
 ?>
<?php 
require_once("../config/conexion.php");
$id_citas=$_GET['id'];
$sql="SELECT * FROM citas WHERE id_citas='$id_citas'";
$result=$con->query($sql);
$row=mysqli_fetch_assoc($result);
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
</button><center><h5 id="mensajes">* Complete los Campos Requeridos </h5></center></div>
            <div class="panel panel-success">
              <div class="panel-heading">
                <center><h3 ><strong><i>Datos de la Consulta</i></strong></h3></center>
              </div>
              <div class="panel-body">
                <form action="" id="form_consulta">
                    <div class="form-group col-xs-6">
                        <label>* Motivo de Admisi&oacute;n:</label>
                        <textarea name="motivo" id="motivo" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-xs-6">
                        <label>* Enfermedad Actual:</label>
                       <textarea id="enfermedad_actual" name="enfermedad_actual" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-xs-6">
                        <label>* Diagnostico Clinico:</label>
                        <textarea id="diagnostico_clinico" name="diagnostico_clinico" class="form-control"></textarea>
                    </div>
                     <div class="form-group col-xs-6">
                        <label>Otro diagnostico:</label>
                        <textarea id="otro_clinico" name="otro_clinico" class="form-control"></textarea>
                    </div>
                     <div class="form-group col-xs-6">
                        <label>* Intervención Principal:</label>
                        <textarea id="intervencion_principal" name="intervencion_principal" class="form-control"></textarea>
                    </div>
                     <div class="form-group col-xs-6">
                        <label>* Pago Consulta:</label>
                        <input type="text" name="pago_consulta" id="pago_consulta" class="form-control" placeholder="Pago Consulta">
                    </div>
                    <div class="form-group col-xs-6 col-xs-offset-5" style="margin-top:50px; ">
                    <input type="hidden" name="id_citas" id="id_citas" value="<?php echo $row['id_citas']; ?>">
                        <button type="submit" id="guardar_consulta" name="guardar_consulta" class="btn btn-default">Guardar</button>
                        <button type="reset" class="btn btn-default">Cancel</button>
                    </div>
                    </form>
            </div>
          </div>
        </div>
</div>
</div>
 <?php require_once("footer.php"); ?>
<script type="text/javascript">
  $(document).ready(function(){
      $('#guardar_consulta').click(function(e){
        e.preventDefault();
        var motivo=$('#motivo').val();
        var enfermedad_actual=$('#enfermedad_actual').val();
        var diagnostico_clinico=$('#diagnostico_clinico').val();
        var intervencion_principal=$('#intervencion_principal').val();
        var pago_consulta=$('#pago_consulta').val();
        if(motivo==="" && enfermedad_actual==="" && diagnostico_clinico==="" && intervencion_principal==="" && pago_consulta===""){
          swal("Complete los campos requeridos","","error");
          return false;
        }
        else if(motivo===""){
          swal("Ingrese el motivo","","error");
          return false;
        }else if(enfermedad_actual===""){
          swal("Ingrese la enfermedad actual del paciente","","error");
          return false;
        }else if(diagnostico_clinico===""){
          swal("Ingrese el diagnostico clinico del paciente","","error");
          return false;
        }else if(intervencion_principal===""){
          swal("Ingrese la intervencion Principal del paciente","","error");
          return false;
        }else if(pago_consulta===""){
          swal("Ingrese el monto a cancelar por la consulta","","error");
          return false;
        }else{
          $.ajax({
            url:"consultas/addconsulta.php",
            type:"POST",
            data:$('#form_consulta').serialize(),
            success:function(data){
              $('#mensajes').html(data);
            }
          });
        }
      });
  });
</script>