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
</button><center><h5 id="mensajes">* Complete los campos requeridos</h5></center></div>
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <center><h3 style="color:""><strong><i>Registro Paciente</i></strong></h3></center>
                    </div>
                    <div class="panel-body">
                        <form action="" id="form_paciente">
                            <div class="form-group col-xs-6">
                                <label for="nombre">*Cedula:</label>
                                <input type="text" name="cedula" id="cedula" class="form-control" placeholder="Nombre">
                            </div>
                            <div class="form-group col-xs-6">
                                <label for="pri_nombre">*Primer Nombre:</label>
                                <input type="text" name="pri_nombre" id="pri_nombre" class="form-control" placeholder=" Primer Nombre">
                            </div>    
                             <div class="form-group col-xs-6">
                                <label for="seg_nombre">*Segundo Nombre:</label>
                                <input type="text" name="seg_nombre" id="pri_nombre" class="form-control" placeholder="Segundo Nombre">
                            </div>    
                             <div class="form-group col-xs-6">
                                <label for="primer_apellido">*Primer Apellido:</label>
                                <input type="text" name="pri_apellido" id="pri_apellido" class="form-control" placeholder=" Primer Apellido">
                            </div>    
                             <div class="form-group col-xs-6">
                                <label for="seg_apellido">*Segundo Apellido:</label>
                                <input type="text" name="seg_apellido" id="seg_apellido" class="form-control" placeholder="Segundo Nombre">
                            </div>    
                             <div class="form-group col-xs-6">
                                <label for="fecha_nacimiento">*Fecha de Nacimiento:</label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder="">
                            </div>
                             <div class="form-group col-xs-6">
                                <label for="edad">*Edad:</label>
                                <input type="number" name="edad" id="edad" class="form-control" placeholder="edad">
                            </div>     
                             <div class="form-group col-xs-6">
                                <label for="direccion">*Direcci&oacute;n</label>
                                <input type="text" name="direccion" id="direccion" class="form-control" placeholder="ejp: Vista Hermosa Parcela 12  casa #17">
                            </div>    
                             <div class="form-group col-xs-6">
                                <label for="edad">*Telefono:</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingrese su edad">
                            </div>     
                             <div class="form-group col-xs-6">
                                <label for="responsable">*Responsable:</label>
                                <input type="text" name="seg_apellido" id="seg_apellido" class="form-control" placeholder="Segundo Nombre">
                            </div>     
                            <div class="form-group col-xs-6 col-xs-offset-3">
                                <label for="ocupacion">Ocupaci&oacute;n:</label>
                              <textarea name="ocupacion" id="ocupacion" cols="3" rows="2" class="form-control">
                             </textarea>
                            </div>     
                            <div class="form-group col-xs-12 col-xs-offset-4" style="margin-top: 20px;">                           
                                <button type="submit" id="guardar_paciente" name="guardar_paciente" class="btn btn-default" style="">
                                    Guardar
                                </button>
                                <a type="reset" class="btn btn-default ">Cancel</a>
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
        
        $('#guardar_paciente').click(function(e){
            e.preventDefault();
            var pri_nombre=$('#pri_nombre').val();
            var seg_nombre=$('#seg_nombre').val();
            var pri_apellido=$('#pri_apellido').val();
            var seg_apellido=$('#seg_apellido').val();
            var fecha_nacimiento=$('#fecha_nacimiento').val();
            var edad=$('#edad').val();
            var direccion=$('#direccion').val();
            var telefono=$('#telefono').val();
            var responsable=$('#responsable').val();
            var ocupacion=$('#ocupacion').val();
            if(pri_nombre==="" && seg_nombre==="" && pri_apellido==="" && seg_apellido==="" && fecha_nacimiento==="" && edad==="" && direccion==="" && telefono==="" && responsable==="" && ocupacion===""){
                swal("Todos los campos requeridos","","error");
                return false;
            }else if(pri_nombre===""){
                swal("Ingrese su primer nombre","","error");
                return false;
            }else if(seg_nombre===""){
                swal("Ingrese su segundo nombre","","error");
                return false;
            }else if(pri_apellido===""){
                swal("Ingrese su segundo apellido","","error");
                return false;
            }else if(seg_apellido===""){
                swal("Ingrese su segundo apellido","","error");
                return false;
            }else if(fecha_nacimiento===""){
                swal("Ingrese su fecha de Nacimiento","","error");
                return false;
            }else if(edad===""){
                swal("Ingrese su edad","","error");
                return false;
            }else if(direccion===""){
                swal("Ingrese su direccion","","error");
                return false;
            }else if(telefono===""){
                swal("Ingrese su numero de telefono","","error");
                return false;
            }else if(responsable===""){
                swal("Ingrese el responsable del Paciente","","error");
                return false;
            }else if(ocupacion===""){
                swal("Ingrese su ocupacion","","error");
                return false;
            }else{
                $.ajax({

                url:"pacientes/addpacientes.php",
                type:"POST",
                data:$('#form_paciente').serialize(),
                success:function(data){
                    $('#mensajes').html();
                }

                });

            }
        });
    });
</script>