USE electrocopper;

DROP VIEW IF EXISTS vw_cliente_persona;
DROP VIEW IF EXISTS vw_cliente_empresa;

-- ###################################################################
CREATE VIEW vw_cliente_persona AS
	SELECT
		CL.cliente_id,
		CL.persona_id,
		CL.tipo,
		PE.nombres,
		PE.apellidos
	FROM clientes CL
		INNER JOIN personas PE ON PE.persona_id = CL.persona_id
	WHERE CL.inactive_at IS NULL
		AND PE.inactive_at IS NULL;

-- ###################################################################
CREATE VIEW vw_cliente_empresa AS
	SELECT
		CL.cliente_id,
		CL.empresa_id,
		CL.tipo,
		EM.ruc,
        EM.razon_social,
        EM.correo,
        EM.telefono,
        EM.direccion
	FROM clientes CL
		INNER JOIN empresas EM ON EM.empresa_id = CL.empresa_id
	WHERE CL.inactive_at IS NULL
		AND EM.inactive_at IS NULL