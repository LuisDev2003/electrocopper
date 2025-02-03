USE electrocopper;

DROP PROCEDURE IF EXISTS spu_formulario_presupuesto_listar;
DROP PROCEDURE IF EXISTS spu_formulario_presupuesto_registrar;
DROP PROCEDURE IF EXISTS spu_formulario_presupuesto_actualizar;
DROP PROCEDURE IF EXISTS spu_formulario_presupuesto_eliminar;

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_formulario_presupuesto_listar()
BEGIN
	SELECT 
		formulario_presupuesto_id,
        servicios, 
		fecha,
		precio,
		nombre,
		telefono,
		correo,
		mensaje,
        created_at AS fecha_registro
	FROM formulario_presupuesto
	WHERE inactive_at IS NULL
    ORDER BY created_at ASC;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_formulario_presupuesto_registrar(
	IN 	_servicios	TEXT, 
	IN 	_fecha		VARCHAR(50),
	IN 	_precio		VARCHAR(50),
	IN 	_nombre		VARCHAR(100),
	IN 	_telefono	VARCHAR(15),
	IN 	_correo		VARCHAR(255),
	IN 	_mensaje	TEXT
)
BEGIN
	INSERT INTO formulario_presupuesto
		(servicios, fecha, precio, nombre, telefono, correo, mensaje)
    VALUE
		(_servicios, _fecha, _precio, _nombre, _telefono, _correo, NULLIF(_mensaje, ""));
        
    SELECT LAST_INSERT_ID() AS formulario_presupuesto_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_formulario_presupuesto_actualizar(
	IN	_formulario_presupuesto_id	INT,
	IN 	_servicios	TEXT, 
	IN 	_fecha		VARCHAR(50),
	IN 	_precio		VARCHAR(50),
	IN 	_nombre		VARCHAR(100),
	IN 	_telefono	VARCHAR(15),
	IN 	_correo		VARCHAR(255),
	IN 	_mensaje	TEXT
)
BEGIN
	UPDATE formulario_presupuesto SET
		servicios 	= 	_servicios,
        fecha		=	_fecha,
        precio		=	_precio,
		nombre 		= 	_nombre,
        telefono	=	_telefono,
        correo		=	_correo,
        mensaje		=	_mensaje,
        updated_at 	=	NOW()
	WHERE formulario_presupuesto_id = _formulario_presupuesto_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_formulario_presupuesto_eliminar(
	IN 	_formulario_presupuesto_id 	INT
)
BEGIN
	UPDATE formulario_presupuesto SET inactive_at = NOW()
	WHERE formulario_presupuesto_id = _formulario_presupuesto_id;
END $$
