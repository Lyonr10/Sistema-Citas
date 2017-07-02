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
             
        		<a href="nuevacita.php" class="btn btn-default"><span class="fa fa-user-plus"></span> Add Cita</a>
            </div>
            <div id="calendar" class="col-xs-10 col-xs-offset-1" style="margin-top: 10px;">
                


            </div>
            
        </div>
    </div>
</div>
<?php require_once("footer.php"); ?>
