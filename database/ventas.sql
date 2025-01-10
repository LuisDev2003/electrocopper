USE electrocopper;

DROP PROCEDURE IF EXISTS spu_ventas_listar;
DROP PROCEDURE IF EXISTS spu_ventas_buscar;
DROP PROCEDURE IF EXISTS spu_ventas_registrar;
DROP PROCEDURE IF EXISTS spu_ventas_eliminar;

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_venta_listar()
BEGIN
	SELECT
		venta_id,
        empleado_id,
        fecha
    FROM ventas
    WHERE inactive_at IS NULL;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_venta_buscar(IN _venta_id INT)
BEGIN
	SELECT
		venta_id,
        empleado_id,
        fecha
    FROM ventas
    WHERE venta_id = _venta_id
    AND inactive_at IS NULL;
END $$

CALL spu_venta_buscar(1)