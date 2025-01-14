## PROCEDIMIENTOS
USE electrocopper;

DROP PROCEDURE IF EXISTS spu_formulario_contacto_listar;
DROP PROCEDURE IF EXISTS spu_formulario_contacto_registrar;
DROP PROCEDURE IF EXISTS spu_formulario_contacto_actualizar;
DROP PROCEDURE IF EXISTS spu_formulario_contacto_eliminar;

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_formulario_contacto_listar()
BEGIN
	SELECT 
		formulario_contacto_id,
        nombre,
        correo,
        mensaje,
		created_at
	FROM formulario_contacto
	WHERE incative_at IS NULL
    ORDER BY created_at ASC;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_formulario_contacto_registrar(
	IN 	_nombres 	VARCHAR(60),
    IN 	_correo 	VARCHAR(120),
    IN  _mensaje	TEXT
)
BEGIN
	INSERT INTO formulario_contacto
		(nombres, correo, mensaje) 
    VALUE
		(_nombres, _correo, _mensaje);
        
    SELECT LAST_INSERT_ID() AS formulario_contacto_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_formulario_contacto_actualizar(
	IN	_formulario_contacto_id	INT,
    IN 	_nombres 				VARCHAR(60),
    IN 	_correo 				VARCHAR(120),
    IN  _mensaje				TEXT
)
BEGIN
	UPDATE formulario_contacto
    SET 
		nombre 		= 	_nombres,
        correo		=	_correo,
        mensaje		=	_mensaje,
        updated_at 	=	NOW()
	WHERE 
		formulario_contacto_id = _formulario_contacto_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_formulario_contacto_eliminar(
	IN 	_formulario_contacto_id 	INT
)
BEGIN
	UPDATE categoria
		SET inactive_at = NOW()
	WHERE formulario_contacto_id = _formulario_contacto_id;
END $$
