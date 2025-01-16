## PROCEDIMIENTOS
USE electrocopper;

DROP PROCEDURE IF EXISTS spu_categoria_listar;
DROP PROCEDURE IF EXISTS spu_cateoria_registrar;
DROP PROCEDURE IF EXISTS spu_categoria_actualizar;
DROP PROCEDURE IF EXISTS spu_categoria_eliminar;


-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_categoria_listar()
BEGIN
	SELECT 
		categoria_id,
        nombre,
        created_at
	FROM categorias
	WHERE inactive_at IS NULL
    ORDER BY nombre ASC;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_categoria_buscar(IN _categoria_id INT)
BEGIN
	SELECT
		categoria_id,
        nombre
    FROM categorias
    WHERE categoria_id = _categoria_id
		AND inactive_at IS NULL;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_cateoria_registrar(
IN _nombre VARCHAR(120)
)
BEGIN
	INSERT INTO categorias
		(nombre) 
    VALUE
		(_nombre);
        
    SELECT LAST_INSERT_ID() AS categoria_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_categoria_actualizar(
	IN	_categoria_id	INT,
    IN  _nombre 		VARCHAR(120)
)
BEGIN
	UPDATE categorias
    SET 
		nombre 		= 	_nombre,
        updated_at 	=	 NOW()
	WHERE 
		categoria_id = _categoria_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_categoria_eliminar(
	IN 	_categoria_id 	INT
)
BEGIN
	UPDATE categorias
		SET inactive_at = NOW()
	WHERE categoria_id = _categoria_id;
END $$
