USE electrocopper;

DROP VIEW IF EXISTS vw_categoria;
DROP VIEW IF EXISTS vw_servicio;

CREATE VIEW vw_categoria AS
	SELECT
		categoria_id,
		nombre
	FROM categorias
	WHERE inactive_at IS NULL
	ORDER BY nombre ASC;
    

CREATE VIEW vw_servicio AS
	SELECT
		SE.servicio_id,
        SE.categoria_id,
        CA.nombre AS categoria,
        SE.nombre,
        SE.descripcion,
        SE.imagen
	FROM servicios SE
		INNER JOIN vw_categoria CA ON CA.categoria_id = SE.categoria_id
	WHERE SE.inactive_at IS NULL
	ORDER BY SE.nombre ASC;
