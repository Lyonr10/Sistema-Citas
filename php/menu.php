

<div class="side-nav">
    <div class="side-nav-header">
        <a href="inicio.html"><img src="../public/multimedia/clinica-logo-min.png" height="19" width="22" alt="">Cl&iacute;nica la paz</a>
    </div>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="side-menu">
            <li><a href="inicio.php"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="submenu-content">
                <a href="#"><i class="fa fa-wheelchair"></i> Pacientes<i class="fa fa-fw fa-caret-down"></i></a>
                <ul class="submenu">
                    <li>
                        <a href="nuevopaciente.php"><i class="fa fa-user-plus"></i> Nuevo Pacientes</a>
                    </li>
                    <li>
                        <a href="pacientes.php"><i class="fa fa-child"></i >Listado de Pacientes</a>
                    </li>
                </ul>
            </li>
            <li class="submenu-content">
                <a href="#"><i class="fa fa-user-md"></i> Doctores<i class="fa fa-fw fa-caret-down"></i></a>
                <ul class="submenu">
                    <li>
                        <a href="nuevodoctor.php"><i class="fa fa-plus-circle"></i> Nuevo Doctor</a>
                    </li>
                    <li>
                        <a href="doctores.php"><i class="fa fa-user-circle"></i> Listado de Doctores</a>
                    </li>
                     <li>
                        <a href="especialidades1.php"><i class=""></i> Especialidades</a>
                    </li>
                </ul>
            </li>
            <li class="submenu-content">
                <a href="#"><i class="fa fa-address-book"></i> Control de Citas<i class="fa fa-fw fa-caret-down"></i></a>
                <ul class="submenu">
                    <li>
                        <a href="nuevacita.php"><i class="fa fa-calendar-minus-o"></i> Nueva Cita</a>
                    </li>
                    <li>
                        <a href="citas.php"><i class=""></i> Lista de Citas</a>
                    </li>
                    <li>
                        <a href="citascalendario.php"><i class="fa fa-address-book-o"></i> Consultas</a>
                    </li>
                </ul>
            </li>
            <li class="submenu-content">
                <a href="#"><i class="fa fa-briefcase"></i> Inventario<i class="fa fa-fw fa-caret-down"></i></a>
                <ul class="submenu">
                    <li>
                        <a href="#"><i class="fa fa-barcode"></i> Lista de productos</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-folder-o"></i> Categorias</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-archive"></i> Lotes</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-universal-access"></i> Proveedores</a>
                    </li>
                </ul>
            </li>
             <li class="submenu-content">
                <a href="#"><i class="fa fa-usd"></i> Presupuesto<i class="fa fa-fw fa-caret-down"></i></a>
                <ul class="submenu">
                    <li>
                        <a href="#"><i class="fa fa-line-chart"></i> Nuevo Presupuesto</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-industry"></i> Listado de Presupuestos</a>
                    </li>
                </ul>
            </li>
            <?php if($_SESSION['tipo_usuario']==1){ ?>
            <li class="submenu-content">
                <a href="#"><i class="fa fa-user"></i> Usuarios<i class="fa fa-fw fa-caret-down"></i></a>
                <ul class="submenu">
                    <li>
                        <a href="nuevousuario.php"><i class="fa fa-user-o"> Nuevo Usuario</i></a>
                    </li>
                    <li>
                        <a href="usuarios.php"><i class="fa fa-users"></i> Listado de usuarios</a>
                    </li>
                </ul>
            </li>
               <li class="submenu-content">
                <a href="#"><i class="fa fa-cogs"></i> Config<i class="fa fa-fw fa-caret-down"></i></a>
                <ul class="submenu">
                    <li>
                        <a href="respaldo.php"><i class="fa fa-database"> Respaldo</i></a>
                    </li>
                    <li>
                        <a href="bitacora.php"><i class="fa fa-user-o"></i> Bitacora</a>
                    </li>
                </ul>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
</div>
</body>
