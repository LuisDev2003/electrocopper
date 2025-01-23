USE electrocopper;

DROP PROCEDURE IF EXISTS spu_menu_servicio_listar;
DROP PROCEDURE IF EXISTS spu_servicio_listar;
DROP PROCEDURE IF EXISTS spu_servicio_buscar;
DROP PROCEDURE IF EXISTS spu_servicio_registrar;
DROP PROCEDURE IF EXISTS spu_servicio_actualizar;
DROP PROCEDURE IF EXISTS spu_servicio_eliminar;

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_menu_servicio_listar()
BEGIN
    SELECT categoria_id, categoria, nombre AS servicio FROM vw_servicio;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_servicio_listar()
BEGIN
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
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_servicio_buscar(IN _servicio_id INT)
BEGIN
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
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_servicio_registrar(
    IN _nombre			VARCHAR(120),
	IN _categoria_id	INT,
    IN _descripcion		TEXT,
    IN _precio			DECIMAL(7,2),
    IN _imagen			VARCHAR(255)
)
BEGIN
    INSERT INTO servicios
		(nombre, categoria_id, descripcion, precio, imagen)
    VALUES
		(_nombre, _categoria_id, NULLIF(_descripcion, ''), _precio, NULLIF(_imagen, ''));

    SELECT LAST_INSERT_ID() AS servicio_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_servicio_actualizar(
	IN _servicio_id		INT,
    IN _categoria_id	INT,
    IN _nombre			VARCHAR(120),
    IN _descripcion		TEXT,
    IN _precio			DECIMAL(7,2),
    IN _imagen			VARCHAR(255)
)
BEGIN
    UPDATE servicios SET
		nombre			= _nombre,
        categoria_id    = _categoria_id,
		descripcion		= NULLIF(_descripcion, ''),
		precio			= _precio,
		imagen			= NULLIF(_imagen, ''),
        updated_at		= NOW()
	WHERE servicio_id = _servicio_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_servicio_eliminar(IN _servicio_id INT)
BEGIN
	UPDATE servicios
		SET inactive_at = NOW()
    WHERE servicio_id = _servicio_id;
END $$