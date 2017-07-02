<?php
    require_once('header.php');
?>
  <!--El contenido maldito leo tiene que ir aqui en una etiqueta pagewrapper-->
<?php
    /*Datos de los graficos*/
    require_once("../config/conexion.php");
    $productos=$con->query("SELECT COUNT(*) FROM productos WHERE status_producto='Activo'");
    $chartpro=mysqli_fetch_array($productos);
    $categorias=$con->query("SELECT COUNT(*) FROM categorias WHERE status_categoria='Activo' ");
    $chartcat=mysqli_fetch_array($categorias);
    $pacientes=$con->query("SELECT COUNT(*) FROM pacientes WHERE status='activo'");
    $chartpac=mysqli_fetch_array($pacientes);
    $especialidad=$con->query("SELECT COUNT(*) FROM especialidades");
    $chartesp=mysqli_fetch_array($especialidad);
    $doctores=$con->query("SELECT COUNT(*) FROM doctores WHERE status='activo'");
    $chartdoc=mysqli_fetch_array($doctores);
    $proveedores=$con->query("SELECT COUNT(*) FROM proveedores WHERE status_proveedor='Activo'");
    $chartprove=mysqli_fetch_array($proveedores);
?>
<div class="page-content">
    <div class="bread-content">
        <div class="container">
            <h4>¡Bienvenido!</h4>
            <span class="breadcoumb"><i class="fa fa-home"></i> Inicio</span>
        </div>
    </div>
    <!--Aqui se maqueta-->
    <div class="container-fluid">
        <div class="row content-reference text-center">
            <h3>Acciones</h3>
            <hr>
            <div class="col-lg-3 col-md-12 col-xs-12 col-sm-6">
                <a href="citas.php" class="box-reference">
                    <div class="bg_txt_bc">

                        <i class="fa fa-book" style="color: #fff;"></i>
                        <h3>Citas Programadas</h3>

                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6">
                <a href="pacientes.php" class="box-reference">
                    <div class="bg_txt_md">

                        <i class="fa fa-heartbeat" style="color: #fff;"></i>
                        <h3>Pacientes</h3>

                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12 col-sm-6">
                <a href="presupuesto.php" class="box-reference">
                    <div class="bg_txt_gf">

                        <i class="fa fa-usd" style="color: #fff;"></i>
                        <h3>Presupuesto</h3>

                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-12 col-xs-12 col-sm-6">
                <a href="inventario.php" class="box-reference">
                    <div class="bg_txt_aq">

                        <i class="fa fa-medkit" style="color: #fff;"></i>
                        <h3>Inventario</h3>

                    </div>
                </a>
            </div>
        </div>
        <div class="row charts">
            <h3>Estadisticas</h3>
            <hr>
            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-4">
                <div class="container">

                    <div class="chart" id="paciente">

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-6 col-lg-4">
                <div class="container">

                    <div class="chart" id="inventario">

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 col-md-12 col-lg-4">
                <div class="container">

                    <div class="chart" id="otracosa">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="notification-panel">
                <a href="calendariocitas.php">
                    <div class="img">
                        <h3>Citas programadas: <?php echo ($citaprog[0]);?> </h3>
                        <img src="../public/multimedia/citas.png" alt="" width="100%">
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row footer">
        <div class="col-xs-12">
            <p>Sistema administrativo Cl&iacute;nica la paz &copy; 2017 (Todos los derechos reservados) Web Makers - Leoncio Requena, Cristian valera, Adrian Yaguaracuto</p>
        </div>
    </div>
    <!--Tiene que ser cerrado con 2 div-->
</div>
</div>
<script>
    var productos=<?php echo ($chartpro[0]);?>;
    var pacientes=<?php echo ($chartpac[0]);?>;
    var categorias=<?php echo ($chartcat[0]);?>;
    var especialidad=<?php echo ($chartesp[0]);?>;
    var doctores=<?php echo ($chartdoc[0]);?>;
    var citas=<?php echo ($citaprog[0]);?>;
    var proveedores=<?php echo ($chartprove[0]);?>;
</script>

<?php
    require_once('footer.php');
?>
