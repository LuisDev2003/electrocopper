USE electrocopper;

DROP PROCEDURE IF EXISTS spu_codigo_obtener;
DROP PROCEDURE IF EXISTS spu_codigo_actualizar;
DROP PROCEDURE IF EXISTS spu_comentario_listar;
DROP PROCEDURE IF EXISTS spu_comentario_registrar;
DROP PROCEDURE IF EXISTS spu_comentario_eliminar;

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_codigo_obtener()
BEGIN
	SELECT * FROM configuraciones
    WHERE clave = "codigo-comentario";
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_codigo_actualizar(IN _valor TEXT)
BEGIN
	UPDATE configuraciones SET valor = _valor
	WHERE clave = "codigo-comentario";
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_comentario_listar()
BEGIN
	SELECT
		comentario_id,
		nombre_cliente,
        comentario,
        created_at
    FROM comentarios
    WHERE inactive_at IS NULL
    ORDER BY created_at DESC;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_comentario_registrar(
    IN _nombre_cliente	VARCHAR(125),
    IN _comentario		TEXT
)
BEGIN
    INSERT INTO comentarios (nombre_cliente, comentario)
    VALUES (_nombre_cliente, _comentario);

    SELECT LAST_INSERT_ID() AS comentario_id;
END $$

-- ###################################################################
DELIMITER $$
CREATE PROCEDURE spu_comentario_eliminar(IN _comentario_id INT)
BEGIN
	UPDATE comentarios
		SET inactive_at = NOW()
    WHERE comentario_id = _comentario_id;
END $$
