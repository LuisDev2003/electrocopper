USE electrocopper;

DROP PROCEDURE IF EXISTS spu_iniciar_sesion;
DROP PROCEDURE IF EXISTS spu_empleado_listar;
DROP PROCEDURE IF EXISTS spu_empleado_buscar;
DROP PROCEDURE IF EXISTS spu_empleado_registrar;
DROP PROCEDURE IF EXISTS spu_empleado_actualizar;
DROP PROCEDURE IF EXISTS spu_empleado_eliminar;

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_iniciar_sesion(IN _correo VARCHAR(255))
BEGIN
	SELECT
		empleado_id,
        apellidos,
        nombres,
        correo,
        clave
    FROM empleados
    WHERE correo = _correo
		AND inactive_at IS NULL;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_empleado_listar()
BEGIN
	SELECT
		empleado_id,
        apellidos,
        nombres,
        correo
    FROM empleados
    WHERE inactive_at IS NULL
    ORDER BY apellidos ASC, nombres ASC;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_empleado_buscar(IN _empleado_id INT)
BEGIN
	SELECT
		empleado_id,
        apellidos,
        nombres,
        correo
    FROM empleados
    WHERE empleado_id = _empleado_id
		AND inactive_at IS NULL;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_empleado_registrar(
    IN _nombres		VARCHAR(50),
    IN _apellidos	VARCHAR(50),
    IN _correo		VARCHAR(255)
)
BEGIN
	DECLARE clave_defecto VARCHAR(60);

    SELECT valor INTO clave_defecto
	FROM configuraciones
    WHERE clave = 'clave-defecto';
    
    INSERT INTO empleados
		(nombres, apellidos, correo, clave)
	VALUES
		(_nombres, _apellidos, _correo, clave_defecto);

    SELECT LAST_INSERT_ID() AS empleado_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_empleado_actualizar(
	IN _empleado_id	INT,
    IN _nombres		VARCHAR(50),
    IN _apellidos	VARCHAR(50),
    IN _correo		VARCHAR(255)
)
BEGIN
    UPDATE empleados SET
		nombres			= _nombres,
		apellidos		= _apellidos,
		correo			= _correo,
        updated_at		= NOW()
	WHERE empleado_id = _empleado_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_empleado_eliminar(IN _empleado_id INT)
BEGIN
	UPDATE empleados
		SET inactive_at = NOW()
    WHERE empleado_id = _empleado_id;
END $$