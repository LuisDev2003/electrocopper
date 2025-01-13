USE electrocopper;

DROP VIEW IF EXISTS vw_detalle_venta;
DROP VIEW IF EXISTS vw_venta;
DROP VIEW IF EXISTS vw_venta_detalle;

CREATE VIEW vw_detalle_venta AS
	SELECT
		DV.detalle_venta_id,
        DV.venta_id,
        SE.servicio_id,
        SE.nombre
    FROM detalle_ventas DV
		INNER JOIN servicios SE ON SE.servicio_id = DV.servicio_id
    WHERE DV.inactive_at IS NULL;


CREATE VIEW vw_venta AS
	SELECT
		VE.venta_id,
        VE.empleado_id,
        EM.nombres,
        EM.apellidos,
        VE.fecha
	FROM ventas VE
        INNER JOIN empleados EM ON EM.empleado_id = VE.empleado_id
	WHERE VE.inactive_at IS NULL;


CREATE VIEW vw_venta_detalle AS
	SELECT
        VE.*,
		CONCAT('[',
			GROUP_CONCAT(
				CONCAT('{\"servicio_id\":\"', DV.servicio_id, '\", \"nombre\":\"', DV.nombre, '\"}')
				SEPARATOR ','
			)
		,']') AS detalle
	FROM vw_venta VE
		INNER JOIN vw_detalle_venta DV ON DV.venta_id = VE.venta_id
	GROUP BY VE.venta_id;
