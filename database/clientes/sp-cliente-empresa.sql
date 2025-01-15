USE electrocopper;

DROP PROCEDURE IF EXISTS spu_empresa_listar;
DROP PROCEDURE IF EXISTS spu_empresa_buscar;
DROP PROCEDURE IF EXISTS spu_empresa_registrar;
DROP PROCEDURE IF EXISTS spu_empresa_actualizar;
DROP PROCEDURE IF EXISTS spu_empresa_eliminar;

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_empresa_listar()
BEGIN
	SELECT * FROM vw_cliente_empresa
    ORDER BY razon_social ASC;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_empresa_buscar(IN _empresa_id INT)
BEGIN
	SELECT * FROM vw_cliente_empresa
    WHERE empresa_id = _empresa_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_empresa_registrar(
	IN _ruc				CHAR(11),
	IN _razon_social	VARCHAR(255),
	IN _correo			VARCHAR(255),
	IN _telefono		VARCHAR(20),
	IN _direccion		TEXT
)
BEGIN
	DECLARE _empresa_id INT;

	INSERT INTO empresas (ruc, razon_social, correo, telefono, direccion)
	VALUES (_ruc, _razon_social, _correo, _telefono, NULLIF(_direccion, ""));

    SET _empresa_id = LAST_INSERT_ID();
    
	INSERT INTO clientes (empresa_id, tipo) 
	VALUES (_empresa_id, 'natural');

    SELECT LAST_INSERT_ID() AS cliente_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_empresa_actualizar(
	IN _empresa_id		INT,
	IN _ruc				CHAR(11),
	IN _razon_social	VARCHAR(255),
	IN _correo			VARCHAR(255),
	IN _telefono		VARCHAR(20),
	IN _direccion		TEXT
)
BEGIN
    UPDATE empresas SET
		ruc				= _ruc,
		razon_social	= _razon_social,
		correo			= _correo,
		telefono		= _telefono,
		direccion		= NULLIF(_direccion, ""),
        updated_at		= NOW()
	WHERE empresa_id = _empresa_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_empresa_eliminar(IN _empresa_id INT)
BEGIN
	UPDATE empresas SET inactive_at = NOW()
    WHERE empresa_id = _empresa_id;
END $$