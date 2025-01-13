USE electrocopper;

DROP PROCEDURE IF EXISTS spu_servicio_listar;
DROP PROCEDURE IF EXISTS spu_servicio_buscar;
DROP PROCEDURE IF EXISTS spu_servicio_registrar;
DROP PROCEDURE IF EXISTS spu_servicio_actualizar;
DROP PROCEDURE IF EXISTS spu_servicio_eliminar;

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_servicio_listar()
BEGIN
	SELECT
		servicio_id,
        nombre,
        descripcion,
        precio,
        imagen
    FROM servicios
    WHERE inactive_at IS NULL
    ORDER BY nombre ASC;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_servicio_buscar(IN _servicio_id INT)
BEGIN
	SELECT
		servicio_id,
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
    IN _descripcion		TEXT,
    IN _precio			DECIMAL(7,2),
    IN _imagen			VARCHAR(255)
)
BEGIN
    INSERT INTO servicios
		(nombre, descripcion, precio, imagen)
    VALUES
		(_nombre, NULLIF(_descripcion, ''), _precio, NULLIF(_imagen, ''));

    SELECT LAST_INSERT_ID() AS servicio_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_servicio_actualizar(
	IN _servicio_id		INT,
    IN _nombre			VARCHAR(120),
    IN _descripcion		TEXT,
    IN _precio			DECIMAL(7,2),
    IN _imagen			VARCHAR(255)
)
BEGIN
    UPDATE servicios SET
		nombre			= _nombre,
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