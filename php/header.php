<?php 
session_start();
require_once("../config/conexion.php");
date_default_timezone_set('America/Caracas');
$script_tz = date_default_timezone_get();
if(!isset($_SESSION['id_usuario'])){
    header("location:../index.php");
}
$idUsuario=$_SESSION['id_usuario'];
$sql="SELECT u.id_usuario,u.nombre,u.id_tipo,t.tipo FROM usuarios AS u INNER JOIN tipo_usuario AS t ON u.id_tipo=t.id_tipo WHERE u.id_usuario='$idUsuario'";
$result=$con->query($sql);
$row=$result->fetch_assoc();
$_SESSION['tipo_usuario']=$row['id_tipo'];
$fecha=date("Y".'/'."m"."/"."d");
$citasdehoy=$con->query("SELECT COUNT(*) FROM citas WHERE fecha_cita='$fecha'");
$citaprog=mysqli_fetch_array($citasdehoy);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Clínica la paz</title>
    <link rel="shortcut icon" href="../public/multimedia/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/css/sweetalert2.min.css">
    <link rel="stylesheet" href="../public/css/morris.css">
    <link rel="stylesheet" type="text/css" href="../public/fullcalendar/fullcalendar.css">
    <link rel="stylesheet" href="../public/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../public/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../public/css/estilos.css">
    <style>
        .error{
            color: #EB240C;
        }
        #calendar{
        width: px;
        height: ;
       }
    </style>
</head>

<body>
    <div id="wrapper">
        <div class="page-wrapper">
            <div class="btn-fab-user">
                <button title="Cerrar sesion" class="fab bg_txt_gf sub-fab" ><a href="../config/logout.php"><i class="fa fa-power-off"></i></a></button>
                <button title="User menu" class="fab bg_txt_aq" id="toggle-fab"><i class="fa fa-bars"></i></button>
            </div>
            <nav>
                <div class="navbar page-navigation" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Men&uacute;</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <span class="navbar-brand"><i class="fa fa-hospital-o"></i></span>
                    </div>

                    <ul class="items-nav navbar-right top-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle item-icon" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                            <ul class="dropdown-menu alert-dropdown">
                                <li>
                                    <a href="calendariocitas.php">Citas programadas <span class="label label-danger"><?php echo ($citaprog[0]);?></span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle item-icon" data-toggle="dropdown"><i class="fa fa-user-circle"></i> <b class="caret"></b></a>
                            <ul class="dropdown-menu dropdown-user-menu-top alert-dropdown">
                                <li>
                                    <center><span class="username-span" href="#"><?php echo $row['nombre']; ?>: <span class="label label-primary"> <?php echo $row['tipo']; ?></span></span></center>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="../config/logout.php">Cerrar Sesion <i class="fa fa-power-off"></i></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>