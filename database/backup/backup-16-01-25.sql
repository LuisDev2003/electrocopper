-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-01-2025 a las 23:51:06
-- Versión del servidor: 8.0.39
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `electrocopper`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `spu_categoria_actualizar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categoria_actualizar` (IN `_categoria_id` INT, IN `_nombre` VARCHAR(120))   BEGIN
	UPDATE categorias
    SET 
		nombre 		= 	_nombre,
        updated_at 	=	 NOW()
	WHERE 
		categoria_id = _categoria_id;
END$$

DROP PROCEDURE IF EXISTS `spu_categoria_buscar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categoria_buscar` (IN `_categoria_id` INT)   BEGIN
	SELECT
		categoria_id,
        nombre
    FROM categorias
    WHERE categoria_id = _categoria_id
		AND inactive_at IS NULL;
END$$

DROP PROCEDURE IF EXISTS `spu_categoria_eliminar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categoria_eliminar` (IN `_categoria_id` INT)   BEGIN
	UPDATE categorias
		SET inactive_at = NOW()
	WHERE categoria_id = _categoria_id;
END$$

DROP PROCEDURE IF EXISTS `spu_categoria_listar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_categoria_listar` ()   BEGIN
	SELECT 
		categoria_id,
        nombre,
        created_at
	FROM categorias
	WHERE inactive_at IS NULL
    ORDER BY nombre ASC;
END$$

DROP PROCEDURE IF EXISTS `spu_cateoria_registrar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_cateoria_registrar` (IN `_nombre` VARCHAR(120))   BEGIN
	INSERT INTO categorias
		(nombre) 
    VALUE
		(_nombre);
        
    SELECT LAST_INSERT_ID() AS categoria_id;
END$$

DROP PROCEDURE IF EXISTS `spu_codigo_actualizar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_codigo_actualizar` (IN `_valor` TEXT)   BEGIN
	UPDATE configuraciones SET valor = _valor
	WHERE clave = "codigo-comentario";
END$$

DROP PROCEDURE IF EXISTS `spu_codigo_obtener`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_codigo_obtener` ()   BEGIN
	SELECT * FROM configuraciones
    WHERE clave = "codigo-comentario";
END$$

DROP PROCEDURE IF EXISTS `spu_comentario_eliminar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_comentario_eliminar` (IN `_comentario_id` INT)   BEGIN
	UPDATE comentarios
		SET inactive_at = NOW()
    WHERE comentario_id = _comentario_id;
END$$

DROP PROCEDURE IF EXISTS `spu_comentario_listar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_comentario_listar` ()   BEGIN
	SELECT
		comentario_id,
		nombre_cliente,
        comentario,
        created_at
    FROM comentarios
    WHERE inactive_at IS NULL
    ORDER BY created_at DESC;
END$$

DROP PROCEDURE IF EXISTS `spu_comentario_registrar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_comentario_registrar` (IN `_nombre_cliente` VARCHAR(125), IN `_comentario` TEXT)   BEGIN
    INSERT INTO comentarios (nombre_cliente, comentario)
    VALUES (_nombre_cliente, _comentario);

    SELECT LAST_INSERT_ID() AS comentario_id;
END$$

DROP PROCEDURE IF EXISTS `spu_detalle_venta_registrar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_detalle_venta_registrar` (IN `_venta_id` INT, IN `_servicio_id` INT)   BEGIN
	INSERT INTO detalle_ventas (venta_id, servicio_id)
    VALUES (_venta_id, _servicio_id);
END$$

DROP PROCEDURE IF EXISTS `spu_empleado_actualizar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_empleado_actualizar` (IN `_empleado_id` INT, IN `_nombres` VARCHAR(50), IN `_apellidos` VARCHAR(50), IN `_correo` VARCHAR(255))   BEGIN
    UPDATE empleados SET
		nombres			= _nombres,
		apellidos		= _apellidos,
		correo			= _correo,
        updated_at		= NOW()
	WHERE empleado_id = _empleado_id;
END$$

DROP PROCEDURE IF EXISTS `spu_empleado_buscar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_empleado_buscar` (IN `_empleado_id` INT)   BEGIN
	SELECT
		empleado_id,
        apellidos,
        nombres,
        correo
    FROM empleados
    WHERE empleado_id = _empleado_id
		AND inactive_at IS NULL;
END$$

DROP PROCEDURE IF EXISTS `spu_empleado_eliminar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_empleado_eliminar` (IN `_empleado_id` INT)   BEGIN
	UPDATE empleados
		SET inactive_at = NOW()
    WHERE empleado_id = _empleado_id;
END$$

DROP PROCEDURE IF EXISTS `spu_empleado_listar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_empleado_listar` ()   BEGIN
	SELECT
		empleado_id,
        apellidos,
        nombres,
        correo
    FROM empleados
    WHERE inactive_at IS NULL
    ORDER BY apellidos ASC, nombres ASC;
END$$

DROP PROCEDURE IF EXISTS `spu_empleado_registrar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_empleado_registrar` (IN `_nombres` VARCHAR(50), IN `_apellidos` VARCHAR(50), IN `_correo` VARCHAR(255))   BEGIN
	DECLARE clave_defecto VARCHAR(60);

    SELECT valor INTO clave_defecto
	FROM configuraciones
    WHERE clave = 'clave-defecto';
    
    INSERT INTO empleados
		(nombres, apellidos, correo, clave)
	VALUES
		(_nombres, _apellidos, _correo, clave_defecto);

    SELECT LAST_INSERT_ID() AS empleado_id;
END$$

DROP PROCEDURE IF EXISTS `spu_empresa_actualizar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_empresa_actualizar` (IN `_empresa_id` INT, IN `_ruc` CHAR(11), IN `_razon_social` VARCHAR(255), IN `_correo` VARCHAR(255), IN `_telefono` VARCHAR(20), IN `_direccion` TEXT)   BEGIN
    UPDATE empresas SET
		ruc				= _ruc,
		razon_social	= _razon_social,
		correo			= _correo,
		telefono		= _telefono,
		direccion		= NULLIF(_direccion, ""),
        updated_at		= NOW()
	WHERE empresa_id = _empresa_id;
END$$

DROP PROCEDURE IF EXISTS `spu_empresa_buscar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_empresa_buscar` (IN `_empresa_id` INT)   BEGIN
	SELECT * FROM vw_cliente_empresa
    WHERE empresa_id = _empresa_id;
END$$

DROP PROCEDURE IF EXISTS `spu_empresa_eliminar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_empresa_eliminar` (IN `_empresa_id` INT)   BEGIN
	UPDATE empresas SET inactive_at = NOW()
    WHERE empresa_id = _empresa_id;
END$$

DROP PROCEDURE IF EXISTS `spu_empresa_listar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_empresa_listar` ()   BEGIN
	SELECT * FROM vw_cliente_empresa
    ORDER BY razon_social ASC;
END$$

DROP PROCEDURE IF EXISTS `spu_empresa_registrar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_empresa_registrar` (IN `_ruc` CHAR(11), IN `_razon_social` VARCHAR(255), IN `_correo` VARCHAR(255), IN `_telefono` VARCHAR(20), IN `_direccion` TEXT)   BEGIN
	DECLARE _empresa_id INT;

	INSERT INTO empresas (ruc, razon_social, correo, telefono, direccion)
	VALUES (_ruc, _razon_social, _correo, _telefono, NULLIF(_direccion, ""));

    SET _empresa_id = LAST_INSERT_ID();
    
	INSERT INTO clientes (empresa_id, tipo) 
	VALUES (_empresa_id, 'natural');

    SELECT LAST_INSERT_ID() AS cliente_id;
END$$

DROP PROCEDURE IF EXISTS `spu_formulario_contacto_actualizar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_formulario_contacto_actualizar` (IN `_formulario_contacto_id` INT, IN `_nombres` VARCHAR(60), IN `_correo` VARCHAR(120), IN `_mensaje` TEXT)   BEGIN
	UPDATE formulario_contacto
    SET 
		nombre 		= 	_nombres,
        correo		=	_correo,
        mensaje		=	_mensaje,
        updated_at 	=	NOW()
	WHERE 
		formulario_contacto_id = _formulario_contacto_id;
END$$

DROP PROCEDURE IF EXISTS `spu_formulario_contacto_eliminar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_formulario_contacto_eliminar` (IN `_formulario_contacto_id` INT)   BEGIN
	UPDATE formulario_contacto
		SET inactive_at = NOW()
	WHERE formulario_contacto_id = _formulario_contacto_id;
END$$

DROP PROCEDURE IF EXISTS `spu_formulario_contacto_listar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_formulario_contacto_listar` ()   BEGIN
	SELECT 
		formulario_contacto_id,
        nombre,
        correo,
        mensaje,
		created_at
	FROM formulario_contacto
	WHERE inactive_at IS NULL
    ORDER BY created_at ASC;
END$$

DROP PROCEDURE IF EXISTS `spu_formulario_contacto_registrar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_formulario_contacto_registrar` (IN `_nombres` VARCHAR(60), IN `_correo` VARCHAR(120), IN `_mensaje` TEXT)   BEGIN
	INSERT INTO formulario_contacto
		(nombre, correo, mensaje) 
    VALUE
		(_nombres, _correo, _mensaje);
        
    SELECT LAST_INSERT_ID() AS formulario_contacto_id;
END$$

DROP PROCEDURE IF EXISTS `spu_iniciar_sesion`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_iniciar_sesion` (IN `_correo` VARCHAR(255))   BEGIN
	SELECT
		empleado_id,
        apellidos,
        nombres,
        correo,
        clave
    FROM empleados
    WHERE correo = _correo
		AND inactive_at IS NULL;
END$$

DROP PROCEDURE IF EXISTS `spu_persona_actualizar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_persona_actualizar` (IN `_persona_id` INT, IN `_nombres` VARCHAR(50), IN `_apellidos` VARCHAR(50))   BEGIN
    UPDATE personas SET
		nombres		= _nombres,
		apellidos	= _apellidos,
        updated_at	= NOW()
	WHERE persona_id = _persona_id;
END$$

DROP PROCEDURE IF EXISTS `spu_persona_buscar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_persona_buscar` (IN `_persona_id` INT)   BEGIN
	SELECT * FROM vw_cliente_persona
    WHERE persona_id = _persona_id;
END$$

DROP PROCEDURE IF EXISTS `spu_persona_eliminar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_persona_eliminar` (IN `_persona_id` INT)   BEGIN
	UPDATE personas SET inactive_at = NOW()
    WHERE persona_id = _persona_id;
END$$

DROP PROCEDURE IF EXISTS `spu_persona_listar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_persona_listar` ()   BEGIN
	SELECT * FROM vw_cliente_persona
    ORDER BY apellidos ASC, nombres ASC;
END$$

DROP PROCEDURE IF EXISTS `spu_persona_registrar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_persona_registrar` (IN `_nombres` VARCHAR(50), IN `_apellidos` VARCHAR(50))   BEGIN
	DECLARE _persona_id INT;
    
    INSERT INTO personas (nombres, apellidos)
	VALUES (_nombres, _apellidos);
    
    SET _persona_id = LAST_INSERT_ID();
    
	INSERT INTO clientes (persona_id, tipo) 
	VALUES (_persona_id, 'natural');

    SELECT LAST_INSERT_ID() AS cliente_id;
END$$

DROP PROCEDURE IF EXISTS `spu_servicio_actualizar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicio_actualizar` (IN `_servicio_id` INT, IN `_categoria_id` INT, IN `_nombre` VARCHAR(120), IN `_descripcion` TEXT, IN `_precio` DECIMAL(7,2), IN `_imagen` VARCHAR(255))   BEGIN
    UPDATE servicios SET
		nombre			= _nombre,
        categoria_id    = _categoria_id,
		descripcion		= NULLIF(_descripcion, ''),
		precio			= _precio,
		imagen			= NULLIF(_imagen, ''),
        updated_at		= NOW()
	WHERE servicio_id = _servicio_id;
END$$

DROP PROCEDURE IF EXISTS `spu_servicio_buscar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicio_buscar` (IN `_servicio_id` INT)   BEGIN
	SELECT
		servicio_id,
        categoria_id,
        nombre,
        descripcion,
        precio,
        imagen
    FROM servicios
    WHERE servicio_id = _servicio_id
		AND inactive_at IS NULL;
END$$

DROP PROCEDURE IF EXISTS `spu_servicio_eliminar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicio_eliminar` (IN `_servicio_id` INT)   BEGIN
	UPDATE servicios
		SET inactive_at = NOW()
    WHERE servicio_id = _servicio_id;
END$$

DROP PROCEDURE IF EXISTS `spu_servicio_listar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicio_listar` ()   BEGIN
	SELECT
		SER.servicio_id,
        SER.nombre,
        CAT.nombre as categoria,
        CAT.categoria_id,
        SER.descripcion,
        SER.precio,
        imagen
    FROM servicios SER
    LEFT JOIN categorias CAT ON SER.categoria_id = CAT.categoria_id
    WHERE SER.inactive_at IS NULL
    ORDER BY nombre ASC;
END$$

DROP PROCEDURE IF EXISTS `spu_servicio_registrar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_servicio_registrar` (IN `_nombre` VARCHAR(120), IN `_categoria_id` INT, IN `_descripcion` TEXT, IN `_precio` DECIMAL(7,2), IN `_imagen` VARCHAR(255))   BEGIN
    INSERT INTO servicios
		(nombre, categoria_id, descripcion, precio, imagen)
    VALUES
		(_nombre, _categoria_id, NULLIF(_descripcion, ''), _precio, NULLIF(_imagen, ''));

    SELECT LAST_INSERT_ID() AS servicio_id;
END$$

DROP PROCEDURE IF EXISTS `spu_venta_buscar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_venta_buscar` (IN `_venta_id` INT)   BEGIN
	SELECT * FROM vw_venta
    WHERE venta_id = _venta_id;
END$$

DROP PROCEDURE IF EXISTS `spu_venta_detalle_buscar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_venta_detalle_buscar` (IN `_venta_id` INT)   BEGIN
	SELECT * FROM vw_venta_detalle
    WHERE venta_id = _venta_id;
END$$

DROP PROCEDURE IF EXISTS `spu_venta_detalle_listar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_venta_detalle_listar` ()   BEGIN
	SELECT * FROM vw_venta_detalle;
END$$

DROP PROCEDURE IF EXISTS `spu_venta_eliminar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_venta_eliminar` (IN `_venta_id` INT)   BEGIN
	DELETE FROM detalle_ventas
    WHERE venta_id = _venta_id;
END$$

DROP PROCEDURE IF EXISTS `spu_venta_listar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_venta_listar` ()   BEGIN
	SELECT * FROM vw_venta;
END$$

DROP PROCEDURE IF EXISTS `spu_venta_registrar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_venta_registrar` (IN `_empleado_id` INT, IN `_fecha` DATETIME)   BEGIN
	INSERT INTO ventas (empleado_id, fecha)
    VALUES (_empleado_id, _fecha);
    
	SELECT LAST_INSERT_ID() AS venta_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `categoria_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`categoria_id`),
  UNIQUE KEY `un_nombre_cat` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `nombre`, `created_at`, `updated_at`, `inactive_at`) VALUES
(1, 'Control y automatización', '2025-01-16 18:41:55', NULL, NULL),
(2, 'Domotica', '2025-01-16 18:41:55', NULL, NULL),
(3, 'Electricidad', '2025-01-16 18:41:55', NULL, NULL),
(4, 'Telecomunicaciones', '2025-01-16 18:41:55', NULL, NULL),
(5, 'Update', '2025-01-16 18:47:19', '2025-01-16 18:47:24', '2025-01-16 18:47:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `cliente_id` int NOT NULL AUTO_INCREMENT,
  `persona_id` int DEFAULT NULL,
  `empresa_id` int DEFAULT NULL,
  `tipo` enum('natural','juridica') NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`cliente_id`),
  UNIQUE KEY `un_persona_cli` (`persona_id`),
  UNIQUE KEY `un_empresa_cli` (`empresa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `persona_id`, `empresa_id`, `tipo`, `created_at`, `updated_at`, `inactive_at`) VALUES
(1, NULL, 1, 'juridica', '2025-01-16 18:43:19', NULL, NULL),
(2, NULL, 2, 'juridica', '2025-01-16 18:43:19', NULL, NULL),
(3, NULL, 3, 'juridica', '2025-01-16 18:43:19', NULL, NULL),
(4, NULL, 4, 'juridica', '2025-01-16 18:43:19', NULL, NULL),
(5, NULL, 5, 'juridica', '2025-01-16 18:43:19', NULL, NULL),
(6, 1, NULL, 'natural', '2025-01-16 18:43:19', NULL, NULL),
(7, 2, NULL, 'natural', '2025-01-16 18:43:19', NULL, NULL),
(8, 3, NULL, 'natural', '2025-01-16 18:43:19', NULL, NULL),
(9, 4, NULL, 'natural', '2025-01-16 18:43:19', NULL, NULL),
(10, 5, NULL, 'natural', '2025-01-16 18:43:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `comentario_id` int NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(125) NOT NULL,
  `comentario` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`comentario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`comentario_id`, `nombre_cliente`, `comentario`, `created_at`, `updated_at`, `inactive_at`) VALUES
(1, 'Carlos López', 'El servicio fue excelente, llegaron a tiempo y resolvieron el problema rápidamente.', '2025-01-16 18:41:55', NULL, NULL),
(2, 'Ana Martínez', 'Muy profesionales, arreglaron mi sistema eléctrico en menos tiempo del esperado.', '2025-01-16 18:41:55', NULL, NULL),
(3, 'Jorge Ramírez', 'Buen trabajo, aunque podrían mejorar la atención al cliente en el teléfono.', '2025-01-16 18:41:55', NULL, NULL),
(4, 'Luisa Fernández', 'Los recomiendo, precios justos y explican todo el trabajo realizado.', '2025-01-16 18:41:55', NULL, NULL),
(5, 'Ricardo Gómez', 'Servicio rápido y eficiente, estoy muy satisfecho con los resultados.', '2025-01-16 18:41:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuraciones`
--

DROP TABLE IF EXISTS `configuraciones`;
CREATE TABLE IF NOT EXISTS `configuraciones` (
  `configuracion_id` int NOT NULL AUTO_INCREMENT,
  `clave` varchar(125) NOT NULL,
  `valor` text,
  PRIMARY KEY (`configuracion_id`),
  UNIQUE KEY `un_clave_con` (`clave`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `configuraciones`
--

INSERT INTO `configuraciones` (`configuracion_id`, `clave`, `valor`) VALUES
(1, 'codigo-comentario', 'Y78YI4'),
(2, 'clave-defecto', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

DROP TABLE IF EXISTS `cotizaciones`;
CREATE TABLE IF NOT EXISTS `cotizaciones` (
  `cotizacion_id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(15) DEFAULT NULL,
  `cliente_id` int DEFAULT NULL,
  `empleado_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`cotizacion_id`),
  KEY `fk_cliente_cot` (`cliente_id`),
  KEY `fk_empleado_cot` (`empleado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cotizaciones`
--

DROP TABLE IF EXISTS `detalle_cotizaciones`;
CREATE TABLE IF NOT EXISTS `detalle_cotizaciones` (
  `detalle_cotizacion_id` int NOT NULL AUTO_INCREMENT,
  `cotizacion_id` int NOT NULL,
  `servicio_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`detalle_cotizacion_id`),
  KEY `fk_cotizacion_d_cot` (`cotizacion_id`),
  KEY `fk_servicio_d_cot` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

DROP TABLE IF EXISTS `detalle_ventas`;
CREATE TABLE IF NOT EXISTS `detalle_ventas` (
  `detalle_venta_id` int NOT NULL AUTO_INCREMENT,
  `venta_id` int NOT NULL,
  `servicio_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`detalle_venta_id`),
  KEY `fk_venta_d_v` (`venta_id`),
  KEY `fk_servicio_d_v` (`servicio_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`detalle_venta_id`, `venta_id`, `servicio_id`, `created_at`, `updated_at`, `inactive_at`) VALUES
(10, 1, 1, '2025-01-16 18:42:51', NULL, NULL),
(20, 1, 1, '2025-01-16 18:43:15', NULL, NULL),
(21, 1, 2, '2025-01-16 18:43:15', NULL, NULL),
(22, 1, 3, '2025-01-16 18:43:15', NULL, NULL),
(23, 2, 4, '2025-01-16 18:43:15', NULL, NULL),
(24, 2, 5, '2025-01-16 18:43:15', NULL, NULL),
(25, 2, 6, '2025-01-16 18:43:15', NULL, NULL),
(26, 3, 7, '2025-01-16 18:43:15', NULL, NULL),
(27, 3, 8, '2025-01-16 18:43:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

DROP TABLE IF EXISTS `empleados`;
CREATE TABLE IF NOT EXISTS `empleados` (
  `empleado_id` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `clave` varchar(60) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`empleado_id`),
  UNIQUE KEY `un_correo_emp` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`empleado_id`, `nombres`, `apellidos`, `correo`, `clave`, `created_at`, `updated_at`, `inactive_at`) VALUES
(1, 'Carlos', 'García', 'carlos.garcia@example.com', '$2y$10$AMkimEU3DxlmfC9u8QlIUeEvEjFPohmA3h01WH3CmvBkyoaWhM346', '2025-01-16 18:41:55', NULL, NULL),
(2, 'María', 'Lopez', 'maria.lopez@example.com', '$2y$10$AMkimEU3DxlmfC9u8QlIUeEvEjFPohmA3h01WH3CmvBkyoaWhM346', '2025-01-16 18:41:55', NULL, NULL),
(3, 'Juan', 'Martínez', 'juan.martinez@example.com', '$2y$10$AMkimEU3DxlmfC9u8QlIUeEvEjFPohmA3h01WH3CmvBkyoaWhM346', '2025-01-16 18:41:55', NULL, NULL),
(4, 'Ana', 'Gómez', 'ana.gomez@example.com', '$2y$10$AMkimEU3DxlmfC9u8QlIUeEvEjFPohmA3h01WH3CmvBkyoaWhM346', '2025-01-16 18:41:55', NULL, NULL),
(5, 'Luis', 'Hernández', 'luis.hernandez@example.com', '$2y$10$AMkimEU3DxlmfC9u8QlIUeEvEjFPohmA3h01WH3CmvBkyoaWhM346', '2025-01-16 18:41:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `empresa_id` int NOT NULL AUTO_INCREMENT,
  `ruc` char(11) NOT NULL,
  `razon_social` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`empresa_id`),
  UNIQUE KEY `un_ruc_emp` (`ruc`),
  UNIQUE KEY `un_razon_social_emp` (`razon_social`),
  UNIQUE KEY `un_correo_emp` (`correo`),
  UNIQUE KEY `un_telefono_emp` (`telefono`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`empresa_id`, `ruc`, `razon_social`, `correo`, `telefono`, `direccion`, `created_at`, `updated_at`, `inactive_at`) VALUES
(1, '20512345678', 'Empresa Alpha SAC', 'contacto@alpha.com', '987654321', 'Av. Siempre Viva 123, Lima', '2025-01-16 18:43:19', NULL, NULL),
(2, '20698765432', 'Beta Corporation', 'info@beta.com', '912345678', 'Jr. Independencia 456, Arequipa', '2025-01-16 18:43:19', NULL, NULL),
(3, '20711122233', 'Gamma y Asociados', 'admin@gamma.com', '921234567', 'Calle Las Flores 789, Trujillo', '2025-01-16 18:43:19', NULL, NULL),
(4, '20833344455', 'Delta Logistics', 'logistica@delta.com', '934567890', 'Av. Los Pinos 101, Piura', '2025-01-16 18:43:19', NULL, NULL),
(5, '20955566677', 'Epsilon Tech', 'soporte@epsilon.com', '945678901', 'Jr. El Sol 202, Cusco', '2025-01-16 18:43:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario_contacto`
--

DROP TABLE IF EXISTS `formulario_contacto`;
CREATE TABLE IF NOT EXISTS `formulario_contacto` (
  `formulario_contacto_id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `correo` varchar(120) NOT NULL,
  `mensaje` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`formulario_contacto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `persona_id` int NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`persona_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`persona_id`, `nombres`, `apellidos`, `created_at`, `updated_at`, `inactive_at`) VALUES
(1, 'Juan', 'Perez', '2025-01-16 18:43:19', NULL, NULL),
(2, 'Maria', 'Lopez', '2025-01-16 18:43:19', NULL, NULL),
(3, 'Carlos', 'Gomez', '2025-01-16 18:43:19', NULL, NULL),
(4, 'Ana', 'Torres', '2025-01-16 18:43:19', NULL, NULL),
(5, 'Luis', 'Martinez', '2025-01-16 18:43:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

DROP TABLE IF EXISTS `servicios`;
CREATE TABLE IF NOT EXISTS `servicios` (
  `servicio_id` int NOT NULL AUTO_INCREMENT,
  `categoria_id` int DEFAULT NULL,
  `nombre` varchar(120) NOT NULL,
  `descripcion` text,
  `precio` decimal(7,2) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`servicio_id`),
  UNIQUE KEY `un_nombre_ser` (`nombre`),
  KEY `fk_categoria_ser` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`servicio_id`, `categoria_id`, `nombre`, `descripcion`, `precio`, `imagen`, `created_at`, `updated_at`, `inactive_at`) VALUES
(1, 1, 'Instalaciones eléctricas domiciliarias e industriales', NULL, NULL, NULL, '2025-01-16 18:41:55', NULL, NULL),
(2, 2, 'Mantenimiento industrial preventivo y correctivo', NULL, NULL, NULL, '2025-01-16 18:41:55', NULL, NULL),
(3, 3, 'Instalación de sistemas de telecomunicaciones', NULL, NULL, NULL, '2025-01-16 18:41:55', NULL, NULL),
(4, 4, 'Domótica', NULL, NULL, NULL, '2025-01-16 18:41:55', NULL, NULL),
(5, 1, 'Automatización de procesos industriales', NULL, NULL, NULL, '2025-01-16 18:41:55', NULL, NULL),
(6, 2, 'Emisión de boletines eléctricos', NULL, NULL, NULL, '2025-01-16 18:41:55', NULL, NULL),
(7, 3, 'Diseño y ejecución de proyectos electricos', NULL, NULL, NULL, '2025-01-16 18:41:55', NULL, NULL),
(8, 2, 'Asesoramiento', NULL, 0.00, NULL, '2025-01-16 18:41:55', '2025-01-16 18:46:58', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `venta_id` int NOT NULL AUTO_INCREMENT,
  `empleado_id` int NOT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `inactive_at` datetime DEFAULT NULL,
  PRIMARY KEY (`venta_id`),
  KEY `fk_empleado_v` (`empleado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`venta_id`, `empleado_id`, `fecha`, `created_at`, `updated_at`, `inactive_at`) VALUES
(1, 1, '2025-01-16 18:41:55', '2025-01-16 18:41:55', NULL, NULL),
(2, 2, '2025-01-16 18:41:55', '2025-01-16 18:41:55', NULL, NULL),
(3, 3, '2025-01-16 18:41:55', '2025-01-16 18:41:55', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_cliente_empresa`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vw_cliente_empresa`;
CREATE TABLE IF NOT EXISTS `vw_cliente_empresa` (
`cliente_id` int
,`empresa_id` int
,`tipo` enum('natural','juridica')
,`ruc` char(11)
,`razon_social` varchar(255)
,`correo` varchar(255)
,`telefono` varchar(20)
,`direccion` text
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_cliente_persona`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vw_cliente_persona`;
CREATE TABLE IF NOT EXISTS `vw_cliente_persona` (
`cliente_id` int
,`persona_id` int
,`tipo` enum('natural','juridica')
,`nombres` varchar(50)
,`apellidos` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_detalle_venta`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vw_detalle_venta`;
CREATE TABLE IF NOT EXISTS `vw_detalle_venta` (
`detalle_venta_id` int
,`venta_id` int
,`servicio_id` int
,`nombre` varchar(120)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_venta`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vw_venta`;
CREATE TABLE IF NOT EXISTS `vw_venta` (
`venta_id` int
,`empleado_id` int
,`nombres` varchar(50)
,`apellidos` varchar(50)
,`fecha` datetime
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_venta_detalle`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vw_venta_detalle`;
CREATE TABLE IF NOT EXISTS `vw_venta_detalle` (
`venta_id` int
,`empleado_id` int
,`nombres` varchar(50)
,`apellidos` varchar(50)
,`fecha` datetime
,`detalle` text
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_cliente_empresa`
--
DROP TABLE IF EXISTS `vw_cliente_empresa`;

DROP VIEW IF EXISTS `vw_cliente_empresa`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_cliente_empresa`  AS SELECT `cl`.`cliente_id` AS `cliente_id`, `cl`.`empresa_id` AS `empresa_id`, `cl`.`tipo` AS `tipo`, `em`.`ruc` AS `ruc`, `em`.`razon_social` AS `razon_social`, `em`.`correo` AS `correo`, `em`.`telefono` AS `telefono`, `em`.`direccion` AS `direccion` FROM (`clientes` `cl` join `empresas` `em` on((`em`.`empresa_id` = `cl`.`empresa_id`))) WHERE ((`cl`.`inactive_at` is null) AND (`em`.`inactive_at` is null)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_cliente_persona`
--
DROP TABLE IF EXISTS `vw_cliente_persona`;

DROP VIEW IF EXISTS `vw_cliente_persona`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_cliente_persona`  AS SELECT `cl`.`cliente_id` AS `cliente_id`, `cl`.`persona_id` AS `persona_id`, `cl`.`tipo` AS `tipo`, `pe`.`nombres` AS `nombres`, `pe`.`apellidos` AS `apellidos` FROM (`clientes` `cl` join `personas` `pe` on((`pe`.`persona_id` = `cl`.`persona_id`))) WHERE ((`cl`.`inactive_at` is null) AND (`pe`.`inactive_at` is null)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_detalle_venta`
--
DROP TABLE IF EXISTS `vw_detalle_venta`;

DROP VIEW IF EXISTS `vw_detalle_venta`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_detalle_venta`  AS SELECT `dv`.`detalle_venta_id` AS `detalle_venta_id`, `dv`.`venta_id` AS `venta_id`, `se`.`servicio_id` AS `servicio_id`, `se`.`nombre` AS `nombre` FROM (`detalle_ventas` `dv` join `servicios` `se` on((`se`.`servicio_id` = `dv`.`servicio_id`))) WHERE (`dv`.`inactive_at` is null) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_venta`
--
DROP TABLE IF EXISTS `vw_venta`;

DROP VIEW IF EXISTS `vw_venta`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_venta`  AS SELECT `ve`.`venta_id` AS `venta_id`, `ve`.`empleado_id` AS `empleado_id`, `em`.`nombres` AS `nombres`, `em`.`apellidos` AS `apellidos`, `ve`.`fecha` AS `fecha` FROM (`ventas` `ve` join `empleados` `em` on((`em`.`empleado_id` = `ve`.`empleado_id`))) WHERE (`ve`.`inactive_at` is null) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_venta_detalle`
--
DROP TABLE IF EXISTS `vw_venta_detalle`;

DROP VIEW IF EXISTS `vw_venta_detalle`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_venta_detalle`  AS SELECT `ve`.`venta_id` AS `venta_id`, `ve`.`empleado_id` AS `empleado_id`, `ve`.`nombres` AS `nombres`, `ve`.`apellidos` AS `apellidos`, `ve`.`fecha` AS `fecha`, concat('[',group_concat(concat('{"servicio_id":"',`dv`.`servicio_id`,'", "nombre":"',`dv`.`nombre`,'"}') separator ','),']') AS `detalle` FROM (`vw_venta` `ve` join `vw_detalle_venta` `dv` on((`dv`.`venta_id` = `ve`.`venta_id`))) GROUP BY `ve`.`venta_id` ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_empresa_cli` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`empresa_id`),
  ADD CONSTRAINT `fk_persona_cli` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`persona_id`);

--
-- Filtros para la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD CONSTRAINT `fk_cliente_cot` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`),
  ADD CONSTRAINT `fk_empleado_cot` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`empleado_id`);

--
-- Filtros para la tabla `detalle_cotizaciones`
--
ALTER TABLE `detalle_cotizaciones`
  ADD CONSTRAINT `fk_cotizacion_d_cot` FOREIGN KEY (`cotizacion_id`) REFERENCES `cotizaciones` (`cotizacion_id`),
  ADD CONSTRAINT `fk_servicio_d_cot` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`servicio_id`);

--
-- Filtros para la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD CONSTRAINT `fk_servicio_d_v` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`servicio_id`),
  ADD CONSTRAINT `fk_venta_d_v` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`venta_id`);

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `fk_categoria_ser` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`categoria_id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_empleado_v` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`empleado_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
