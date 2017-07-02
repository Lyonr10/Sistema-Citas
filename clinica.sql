-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-07-2017 a las 02:45:51
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion_categoria` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `status_categoria` enum('activo','inactivo','','') COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_citas` int(11) NOT NULL,
  `ced_paciente` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `fecha_cita` date NOT NULL,
  `motivo` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `status` enum('pendiente','pagado','','') COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_citas`, `ced_paciente`, `id_doctor`, `fecha_cita`, `motivo`, `status`) VALUES
(1, 24924739, 6, '2017-08-21', 'Dolor de Espalda', 'pendiente'),
(2, 24924739, 7, '2017-06-15', 'Dolor de Muela', 'pendiente'),
(3, 24924739, 7, '2017-07-14', 'Ok', 'pagado'),
(4, 24924739, 7, '2017-08-20', 'Leoncio Requena', 'pendiente'),
(5, 24924739, 10, '2017-08-20', 'Leoncio', 'pendiente'),
(6, 24924739, 7, '2017-09-12', 'dolor de pierna', 'pendiente'),
(7, 24924739, 7, '2017-07-01', 'fsdf', 'pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `id_cita` int(11) NOT NULL,
  `motivo_admision` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `enfermedad_actual` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `diagnostico_clinico` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `otro_diagnostico` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `intervencion_principal` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `pago_consulta` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `id_cita`, `motivo_admision`, `enfermedad_actual`, `diagnostico_clinico`, `otro_diagnostico`, `intervencion_principal`, `pago_consulta`) VALUES
(6, 3, 'adsdsa', 'asdasad', 'dsdfasd', 'asd', 'ada', '2000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_lotes`
--

CREATE TABLE `detalle_lotes` (
  `id_lote` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `id_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id_doctor` int(11) NOT NULL,
  `cedula` int(100) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `status` enum('activo','inactivo','','') COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_especialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id_doctor`, `cedula`, `nombre`, `apellido`, `fecha_nacimiento`, `status`, `id_especialidad`) VALUES
(6, 17716571, 'Julio', 'Requena', '2017-06-29', 'inactivo', 1),
(7, 6874441, 'Jhulmar ', 'Gonzalez', '2017-06-26', 'activo', 1),
(9, 23678998, 'Leonardo', 'Padilla', '1992-03-19', 'inactivo', 5),
(10, 3213123, 'leo', 'fsdfdsfds', '2017-03-12', 'activo', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id_especialidad` int(11) NOT NULL,
  `nombre_especialidad` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `status` enum('activo','inactivo','','') COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id_especialidad`, `nombre_especialidad`, `status`) VALUES
(1, 'Traumatología', 'activo'),
(2, 'Odontologia', 'activo'),
(4, 'Quiropedia ', 'activo'),
(5, 'Psicología ', 'activo'),
(6, 'Psiquiatria', 'activo'),
(7, 'Ginecobstrecia', 'activo'),
(8, 'dksldk', 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

CREATE TABLE `lotes` (
  `id_lote` int(11) NOT NULL,
  `nombre_lote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `ced_paciente` int(11) NOT NULL,
  `primer_nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `segundo_nombre` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `primer_apellido` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `segundo_apellido` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` int(50) NOT NULL,
  `direccion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ocupacion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `status` enum('activo','inactivo','','') COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`ced_paciente`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `fecha_nacimiento`, `edad`, `direccion`, `telefono`, `ocupacion`, `responsable`, `status`) VALUES
(24924739, 'Leoncio', 'Enrique', 'Requena', 'Gonzalez', '1995-08-14', 21, 'Vista Hermosa', '12345', 'SOY UNA LAKRAAAAAA                                ', 'Omaira Josefina', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuestos`
--

CREATE TABLE `presupuestos` (
  `nro_presupuesto` int(11) NOT NULL,
  `ced_paciente` int(11) NOT NULL,
  `fecha_presupuesto` date NOT NULL,
  `tipo_presupuesto` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `honorarios_cirugano` float(10,0) NOT NULL,
  `honorarios_medicos_anestecia` float(10,0) NOT NULL,
  `gastos_clinicos` float(10,0) NOT NULL,
  `estancia_dias` float(10,0) NOT NULL,
  `otros_conceptos` float(10,0) NOT NULL,
  `costo_total` float(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `presupuestos`
--

INSERT INTO `presupuestos` (`nro_presupuesto`, `ced_paciente`, `fecha_presupuesto`, `tipo_presupuesto`, `honorarios_cirugano`, `honorarios_medicos_anestecia`, `gastos_clinicos`, `estancia_dias`, `otros_conceptos`, `costo_total`) VALUES
(1, 24924739, '2017-06-30', 'operacion de la tibia ', 20000, 40000, 30000, 20000, 10000, 120000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` int(50) NOT NULL,
  `descripcion_producto` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `stock` int(50) NOT NULL,
  `status_producto` enum('activo','inactivo','','') COLLATE utf8mb4_spanish_ci NOT NULL,
  `categorias_id` int(11) NOT NULL,
  `proveedores_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `status_proveedor` enum('activo','inactivo','','') COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Doctor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `status` enum('activo','inactivo','','') COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `usuario`, `password`, `status`, `id_tipo`) VALUES
(12, 'Leoncio Requena', 'leo', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'activo', 2),
(13, 'lkldksladk', 'laklkdlsakdl', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'inactivo', 1),
(14, 'Leoncio Requena', 'lion10', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'activo', 1),
(15, 'Lionel Colón', 'lio10', '209d5fae8b2ba427d30650dd0250942af944a0c9', 'activo', 3),
(16, 'zczcsadsd', 'zxczasdasd', '8b8f14ffc4261a9a764d0b09a5d347c5d06d51a7', 'activo', 2),
(17, 'adasd', 'asdasd', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'activo', 3),
(18, 'fdadsa', 'lio123', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'activo', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_citas`),
  ADD KEY `id_paciente` (`ced_paciente`),
  ADD KEY `id_doctor` (`id_doctor`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `id_cita` (`id_cita`);

--
-- Indices de la tabla `detalle_lotes`
--
ALTER TABLE `detalle_lotes`
  ADD KEY `id_lote` (`id_lote`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id_doctor`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `lotes`
--
ALTER TABLE `lotes`
  ADD PRIMARY KEY (`id_lote`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`ced_paciente`);

--
-- Indices de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD PRIMARY KEY (`nro_presupuesto`),
  ADD KEY `ced_paciente` (`ced_paciente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categorias_id` (`categorias_id`),
  ADD KEY `proveedores_id` (`proveedores_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_citas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id_doctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `lotes`
--
ALTER TABLE `lotes`
  MODIFY `id_lote` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  MODIFY `nro_presupuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id_doctor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_4` FOREIGN KEY (`ced_paciente`) REFERENCES `pacientes` (`ced_paciente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`id_cita`) REFERENCES `citas` (`id_citas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_lotes`
--
ALTER TABLE `detalle_lotes`
  ADD CONSTRAINT `detalle_lotes_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_lotes_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_lotes_ibfk_3` FOREIGN KEY (`id_lote`) REFERENCES `lotes` (`id_lote`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD CONSTRAINT `doctores_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidades` (`id_especialidad`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD CONSTRAINT `presupuestos_ibfk_1` FOREIGN KEY (`ced_paciente`) REFERENCES `pacientes` (`ced_paciente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`proveedores_id`) REFERENCES `proveedores` (`id_proveedor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_usuario` (`id_tipo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
