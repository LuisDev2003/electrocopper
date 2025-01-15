USE electrocopper;

DROP PROCEDURE IF EXISTS spu_persona_listar;
DROP PROCEDURE IF EXISTS spu_persona_buscar;
DROP PROCEDURE IF EXISTS spu_persona_registrar;
DROP PROCEDURE IF EXISTS spu_persona_actualizar;
DROP PROCEDURE IF EXISTS spu_persona_eliminar;

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_persona_listar()
BEGIN
	SELECT * FROM vw_cliente_persona
    ORDER BY apellidos ASC, nombres ASC;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_persona_buscar(IN _persona_id INT)
BEGIN
	SELECT * FROM vw_cliente_persona
    WHERE persona_id = 1;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_persona_registrar(
    IN _nombres		VARCHAR(50),
    IN _apellidos	VARCHAR(50)
)
BEGIN
    INSERT INTO personas (nombres, apellidos)
	VALUES (_nombres, _apellidos);

    SELECT LAST_INSERT_ID() AS persona_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_persona_actualizar(
	IN _persona_id	INT,
    IN _nombres		VARCHAR(50),
    IN _apellidos	VARCHAR(50)
)
BEGIN
    UPDATE personas SET
		nombres		= _nombres,
		apellidos	= _apellidos,
        updated_at	= NOW()
	WHERE persona_id = _persona_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_persona_eliminar(IN _persona_id INT)
BEGIN
	UPDATE personas SET inactive_at = NOW()
    WHERE persona_id = _persona_id;
END $$