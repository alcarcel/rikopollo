-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2017 a las 19:24:41
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rikopollo`
--
CREATE DATABASE IF NOT EXISTS `rikopollo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rikopollo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

DROP TABLE IF EXISTS `articulos`;
CREATE TABLE IF NOT EXISTS `articulos` (
  `arti_id` int(10) NOT NULL AUTO_INCREMENT,
  `arti_nombre` varchar(50) NOT NULL,
  `arti_registradopor` varchar(50) NOT NULL,
  `arti_fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`arti_id`),
  KEY `arti_id` (`arti_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `articulos`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulossucursal`
--

DROP TABLE IF EXISTS `articulossucursal`;
CREATE TABLE IF NOT EXISTS `articulossucursal` (
  `arsu_id` int(10) NOT NULL AUTO_INCREMENT,
  `sucr_id` int(10) NOT NULL,
  `arti_id` int(10) NOT NULL,
  `arsu_cantidadcompra` int(10) NOT NULL,
  `arsu_preciocompra` int(10) NOT NULL,
  `arsu_registradopor` varchar(50) NOT NULL,
  `arsu_fechacompra` datetime NOT NULL,
  `arsu_fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`arsu_id`),
  KEY `arsu_id` (`arsu_id`),
  KEY `sucr_id` (`sucr_id`),
  KEY `arti_id` (`arti_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `articulossucursal`:
--   `sucr_id`
--       `sucursal` -> `sucr_id`
--   `arti_id`
--       `articulos` -> `arti_id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_nombre` varchar(50) NOT NULL,
  `cate_registradopor` varchar(50) NOT NULL,
  `cate_fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cate_id`),
  KEY `cate_id` (`cate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `categoria`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

DROP TABLE IF EXISTS `inventario`;
CREATE TABLE IF NOT EXISTS `inventario` (
  `inve_id` int(10) NOT NULL AUTO_INCREMENT,
  `sucr_id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `inve_cantidad` int(10) NOT NULL,
  `inve_precioInventario` float NOT NULL,
  `inve_fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`inve_id`),
  KEY `inve_id` (`inve_id`),
  KEY `sucr_id` (`sucr_id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `inventario`:
--   `sucr_id`
--       `sucursal` -> `sucr_id`
--   `prod_id`
--       `productos` -> `prod_id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medida`
--

DROP TABLE IF EXISTS `medida`;
CREATE TABLE IF NOT EXISTS `medida` (
  `medi_id` int(10) NOT NULL AUTO_INCREMENT,
  `medi_nombre` varchar(50) NOT NULL,
  `medi_registradopor` varchar(50) NOT NULL,
  `medi_fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`medi_id`),
  KEY `medi_id` (`medi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `medida`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `menu_nombre` varchar(50) NOT NULL,
  `menu_registradopor` varchar(50) NOT NULL,
  `menu_fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`menu_id`),
  KEY `menu_id` (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `menu`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `pedi_id` int(10) NOT NULL AUTO_INCREMENT,
  `prod_id` int(10) NOT NULL,
  `sucr_id` int(10) NOT NULL,
  `pedi_cantidad` int(10) NOT NULL,
  `pedi_medida` int(10) NOT NULL,
  `pedi_estado` int(10) NOT NULL,
  `pedi_fechamodificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `pedi_usuarioModificacion` varchar(50) NOT NULL,
  `pedi_registradopor` varchar(50) NOT NULL,
  `pedi_fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pedi_id`),
  KEY `pedi_id` (`pedi_id`),
  KEY `sucr_id` (`sucr_id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `pedido`:
--   `sucr_id`
--       `sucursal` -> `sucr_id`
--   `prod_id`
--       `productos` -> `prod_id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productomenu`
--

DROP TABLE IF EXISTS `productomenu`;
CREATE TABLE IF NOT EXISTS `productomenu` (
  `prme_id` int(10) NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `prme_medida` varchar(50) NOT NULL,
  `prme_registradopor` varchar(50) NOT NULL,
  `prme_fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`prme_id`),
  KEY `prme_id` (`prme_id`),
  KEY `menu_id` (`menu_id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `productomenu`:
--   `menu_id`
--       `menu` -> `menu_id`
--   `prod_id`
--       `productos` -> `prod_id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) NOT NULL,
  `medi_id` int(11) NOT NULL,
  `prod_nombre` VARCHAR(50) NOT NULL,
  `prod_precioCompra` int(11) NOT NULL,
  `prod_minimoAlerta` int(11) NOT NULL,
  `prod_promocion` int(11) NOT NULL,
  `prod_registradopor` VARCHAR(50) NOT NULL,
  `prod_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`prod_id`),
  KEY `prod_id` (`prod_id`),
  KEY `cate_id` (`cate_id`),
  KEY `medi_id` (`medi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `productos`:
--   `cate_id`
--       `categoria` -> `cate_id`
--   `medi_id`
--       `medida` -> `medi_id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `prov_id` int(10) NOT NULL AUTO_INCREMENT,
  `prov_nombreEmpresa` varchar(50) NOT NULL,
  `prov_nombreContacto` varchar(50) NOT NULL,
  `prov_telefonoContacto` int(10) NOT NULL,
  `prov_direccion` varchar(50) NOT NULL,
  `prov_tipoPago` int(10) NOT NULL,
  `prov_facturacion` int(10) NOT NULL,
  `prov_estado` int(10) NOT NULL,
  `prov_registradopor` varchar(50) NOT NULL,
  `prov_fechaModificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `prov_fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`prov_id`),
  KEY `prov_id` (`prov_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `proveedor`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `sucr_id` int(10) NOT NULL AUTO_INCREMENT,
  `sucr_descripcion` varchar(50) NOT NULL,
  `sucr_telefono` int(10) NOT NULL,
  `sucr_direccion` varchar(50) NOT NULL,
  `sucr_estado` tinyint(1) NOT NULL,
  `sucr_registradopor` varchar(50) NOT NULL,
  `sucr_fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sucr_id`),
  UNIQUE KEY `sucr_id` (`sucr_id`),
  KEY `sucr_id_2` (`sucr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `sucursal`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `tius_id` int(11) NOT NULL AUTO_INCREMENT,
  `tius_descripción` varchar(50) NOT NULL,
  `tius_estado` int(1) NOT NULL,
  `tius_registro` varchar(50) NOT NULL,
  `tius_fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tius_id`),
  UNIQUE KEY `tius_id` (`tius_id`),
  KEY `tius_id_2` (`tius_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `tipo_usuario`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usua_id` int(10) NOT NULL AUTO_INCREMENT,
  `tius_id` int(10) NOT NULL,
  `sucr_id` int(10) NOT NULL,
  `usua_nombre` varchar(50) NOT NULL,
  `usua_usuario` varchar(50) NOT NULL,
  `usua_clave` varchar(50) NOT NULL,
  `usua_telefono` int(10) NOT NULL,
  `usua_registradopor` varchar(50) NOT NULL,
  `usua_fecharegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usua_id`),
  UNIQUE KEY `usua_id` (`usua_id`),
  UNIQUE KEY `usua_usuario` (`usua_usuario`),
  KEY `usua_id_2` (`usua_id`),
  KEY `usua_usuario_2` (`usua_usuario`),
  KEY `tius_id` (`tius_id`),
  KEY `sucr_id` (`sucr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `usuarios`:
--   `tius_id`
--       `tipo_usuario` -> `tius_id`
--   `sucr_id`
--       `sucursal` -> `sucr_id`
--

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulossucursal`
--
ALTER TABLE `articulossucursal`
  ADD CONSTRAINT `articulossucursal_ibfk_1` FOREIGN KEY (`sucr_id`) REFERENCES `sucursal` (`sucr_id`),
  ADD CONSTRAINT `articulossucursal_ibfk_2` FOREIGN KEY (`arti_id`) REFERENCES `articulos` (`arti_id`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`sucr_id`) REFERENCES `sucursal` (`sucr_id`),
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `productos` (`prod_id`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`sucr_id`) REFERENCES `sucursal` (`sucr_id`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `productos` (`prod_id`);

--
-- Filtros para la tabla `productomenu`
--
ALTER TABLE `productomenu`
  ADD CONSTRAINT `productomenu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`),
  ADD CONSTRAINT `productomenu_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `productos` (`prod_id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `categoria` (`cate_id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`medi_id`) REFERENCES `medida` (`medi_id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`tius_id`) REFERENCES `tipo_usuario` (`tius_id`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`sucr_id`) REFERENCES `sucursal` (`sucr_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
