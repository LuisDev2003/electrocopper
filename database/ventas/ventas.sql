USE electrocopper;

DROP PROCEDURE IF EXISTS spu_venta_listar;
DROP PROCEDURE IF EXISTS spu_venta_detalle_listar;
DROP PROCEDURE IF EXISTS spu_venta_buscar;
DROP PROCEDURE IF EXISTS spu_venta_detalle_buscar;
DROP PROCEDURE IF EXISTS spu_venta_registrar;
DROP PROCEDURE IF EXISTS spu_detalle_venta_registrar;
DROP PROCEDURE IF EXISTS spu_venta_eliminar;

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_venta_listar()
BEGIN
	SELECT * FROM vw_venta;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_venta_detalle_listar()
BEGIN
	SELECT * FROM vw_venta_detalle;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_venta_buscar(IN _venta_id INT)
BEGIN
	SELECT * FROM vw_venta
    WHERE venta_id = _venta_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_venta_detalle_buscar(IN _venta_id INT)
BEGIN
	SELECT * FROM vw_venta_detalle
    WHERE venta_id = _venta_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_venta_registrar(
	IN _empleado_id	INT,
    IN _fecha		DATETIME
)
BEGIN
	INSERT INTO ventas (empleado_id, fecha)
    VALUES (_empleado_id, _fecha);
    
	SELECT LAST_INSERT_ID() AS venta_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_detalle_venta_registrar(
	IN _venta_id	INT,
    IN _servicio_id	INT
)
BEGIN
	INSERT INTO detalle_ventas (venta_id, servicio_id)
    VALUES (_venta_id, _servicio_id);
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_venta_eliminar(IN _venta_id INT)
BEGIN
	DELETE FROM detalle_ventas
    WHERE venta_id = _venta_id;
END $$
