-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2015 a las 09:37:26
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `drivehouse`
--

--
-- Truncar tablas antes de insertar `actividad`
--

TRUNCATE TABLE `actividad`;
--
-- Truncar tablas antes de insertar `cliente`
--

TRUNCATE TABLE `cliente`;
--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `documento`, `telefono`, `celular`, `email_1`, `email_2`, `estado`, `usuario_creacion_id`, `usuario_actualizacion_id`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(13, 'Jhonatan', 'Quilca', '1004476568', '2939344', '0981550525', 'jhosy25000@hotmail.com', 'jhonatand,quilca@gmail.com', 'ACTIVO', 1, NULL, '2015-07-12 19:14:59', NULL);

--
-- Truncar tablas antes de insertar `cruge_authassignment`
--

TRUNCATE TABLE `cruge_authassignment`;
--
-- Truncar tablas antes de insertar `cruge_authitem`
--

TRUNCATE TABLE `cruge_authitem`;
--
-- Volcado de datos para la tabla `cruge_authitem`
--

INSERT INTO `cruge_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('action_cliente_admin', 0, '', NULL, 'N;'),
('action_cliente_create', 0, '', NULL, 'N;'),
('action_cliente_update', 0, '', NULL, 'N;'),
('action_cliente_view', 0, '', NULL, 'N;'),
('action_dashboard_index', 0, '', NULL, 'N;'),
('action_descripcionPalntilla_admin', 0, '', NULL, 'N;'),
('action_descripcionPalntilla_create', 0, '', NULL, 'N;'),
('action_descripcionPalntilla_update', 0, '', NULL, 'N;'),
('action_descripcionPalntilla_view', 0, '', NULL, 'N;'),
('action_deuda_admin', 0, '', NULL, 'N;'),
('action_deuda_create', 0, '', NULL, 'N;'),
('action_deuda_update', 0, '', NULL, 'N;'),
('action_deuda_view', 0, '', NULL, 'N;'),
('action_movilUser_admin', 0, '', NULL, 'N;'),
('action_movilUser_create', 0, '', NULL, 'N;'),
('action_movilUser_view', 0, '', NULL, 'N;'),
('action_pago_admin', 0, '', NULL, 'N;'),
('action_pago_create', 0, '', NULL, 'N;'),
('action_pago_update', 0, '', NULL, 'N;'),
('action_pago_view', 0, '', NULL, 'N;'),
('action_ui_usermanagementadmin', 0, '', NULL, 'N;'),
('admin', 0, '', NULL, 'N;'),
('Cruge.ui.*', 0, '', NULL, 'N;');

--
-- Truncar tablas antes de insertar `cruge_authitemchild`
--

TRUNCATE TABLE `cruge_authitemchild`;
--
-- Truncar tablas antes de insertar `cruge_field`
--

TRUNCATE TABLE `cruge_field`;
--
-- Truncar tablas antes de insertar `cruge_fieldvalue`
--

TRUNCATE TABLE `cruge_fieldvalue`;
--
-- Truncar tablas antes de insertar `cruge_session`
--

TRUNCATE TABLE `cruge_session`;
--
-- Volcado de datos para la tabla `cruge_session`
--

INSERT INTO `cruge_session` (`idsession`, `iduser`, `created`, `expire`, `status`, `ipaddress`, `usagecount`, `lastusage`, `logoutdate`, `ipaddressout`) VALUES
(2, 1, 1436746065, 1436747865, 1, '::1', 1, 1436746065, NULL, NULL),
(3, 1, 1445178757, 1445180557, 0, '::1', 1, 1445178757, 1445178806, '::1'),
(4, 2, 1445178813, 1445180613, 1, '::1', 2, 1445178831, NULL, NULL),
(5, 1, 1445178903, 1445180703, 1, '::1', 1, 1445178903, NULL, NULL);

--
-- Truncar tablas antes de insertar `cruge_system`
--

TRUNCATE TABLE `cruge_system`;
--
-- Volcado de datos para la tabla `cruge_system`
--

INSERT INTO `cruge_system` (`idsystem`, `name`, `largename`, `sessionmaxdurationmins`, `sessionmaxsameipconnections`, `sessionreusesessions`, `sessionmaxsessionsperday`, `sessionmaxsessionsperuser`, `systemnonewsessions`, `systemdown`, `registerusingcaptcha`, `registerusingterms`, `terms`, `registerusingactivation`, `defaultroleforregistration`, `registerusingtermslabel`, `registrationonlogin`) VALUES
(1, 'default', NULL, 30, 10, 1, -1, -1, 0, 0, 0, 0, '', 0, '', '', 1);

--
-- Truncar tablas antes de insertar `cruge_user`
--

TRUNCATE TABLE `cruge_user`;
--
-- Volcado de datos para la tabla `cruge_user`
--

INSERT INTO `cruge_user` (`iduser`, `regdate`, `actdate`, `logondate`, `username`, `email`, `password`, `authkey`, `state`, `totalsessioncounter`, `currentsessioncounter`) VALUES
(1, NULL, NULL, 1445178903, 'admin', 'admin@tucorreo.com', 'admin', NULL, 1, 0, 0),
(2, NULL, NULL, NULL, 'invitado', 'invitado', 'nopassword', NULL, 1, 0, 0);

--
-- Truncar tablas antes de insertar `descripcion_palntilla`
--

TRUNCATE TABLE `descripcion_palntilla`;
--
-- Volcado de datos para la tabla `descripcion_palntilla`
--

INSERT INTO `descripcion_palntilla` (`id`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Por copias', 'Falta de dinero para pagar las copias numero de copias 10', 'ACTIVO');

--
-- Truncar tablas antes de insertar `deuda`
--

TRUNCATE TABLE `deuda`;
--
-- Volcado de datos para la tabla `deuda`
--

INSERT INTO `deuda` (`id`, `monto`, `usuario_creacion_id`, `fecha_creacion`, `usuario_actualizacion_id`, `fecha_actualizacion`, `observaciones`, `descripcion_palntilla_id`, `cliente_id`) VALUES
(1, 50, 1, '2015-07-12 19:18:49', NULL, NULL, NULL, NULL, 13);

--
-- Truncar tablas antes de insertar `mail`
--

TRUNCATE TABLE `mail`;
--
-- Truncar tablas antes de insertar `mail_plantilla`
--

TRUNCATE TABLE `mail_plantilla`;
--
-- Truncar tablas antes de insertar `movil_user`
--

TRUNCATE TABLE `movil_user`;
--
-- Volcado de datos para la tabla `movil_user`
--

INSERT INTO `movil_user` (`id_user`, `estado`) VALUES
(1, 'IN'),
(2, 'OUT');

--
-- Truncar tablas antes de insertar `pago`
--

TRUNCATE TABLE `pago`;
--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id`, `monto`, `usuario_creacion_id`, `fecha_creacion`, `usuario_actualizacion`, `fecha_actualizacion`, `obserbaciones`, `descripcion_palntilla_id`, `cliente_id`) VALUES
(1, 25, 1, '2015-07-12 19:19:15', NULL, NULL, NULL, NULL, 13);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
