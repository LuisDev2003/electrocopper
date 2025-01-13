USE electrocopper;

INSERT INTO empleados (nombres, apellidos, correo, clave)
VALUES 
	('Carlos', 'García', 'carlos.garcia@example.com', '$2y$10$AMkimEU3DxlmfC9u8QlIUeEvEjFPohmA3h01WH3CmvBkyoaWhM346'),
	('María', 'Lopez', 'maria.lopez@example.com', '$2y$10$AMkimEU3DxlmfC9u8QlIUeEvEjFPohmA3h01WH3CmvBkyoaWhM346'),
	('Juan', 'Martínez', 'juan.martinez@example.com', '$2y$10$AMkimEU3DxlmfC9u8QlIUeEvEjFPohmA3h01WH3CmvBkyoaWhM346'),
	('Ana', 'Gómez', 'ana.gomez@example.com', '$2y$10$AMkimEU3DxlmfC9u8QlIUeEvEjFPohmA3h01WH3CmvBkyoaWhM346'),
	('Luis', 'Hernández', 'luis.hernandez@example.com', '$2y$10$AMkimEU3DxlmfC9u8QlIUeEvEjFPohmA3h01WH3CmvBkyoaWhM346');

INSERT INTO servicios (nombre) 
VALUES
	("Instalaciones eléctricas domiciliarias e industriales"),
    ("Mantenimiento industrial preventivo y correctivo"),
    ("Instalación de sistemas de telecomunicaciones"),
    ("Domótica"),
    ("Automatización de procesos industriales"),
    ("Emisión de boletines eléctricos"),
    ("Diseño y ejecución de proyectos electricos"),
    ("Asesoramiento");

INSERT INTO comentarios (nombre_cliente, comentario) 
VALUES
	('Carlos López', 'El servicio fue excelente, llegaron a tiempo y resolvieron el problema rápidamente.'),
	('Ana Martínez', 'Muy profesionales, arreglaron mi sistema eléctrico en menos tiempo del esperado.'),
	('Jorge Ramírez', 'Buen trabajo, aunque podrían mejorar la atención al cliente en el teléfono.'),
	('Luisa Fernández', 'Los recomiendo, precios justos y explican todo el trabajo realizado.'),
	('Ricardo Gómez', 'Servicio rápido y eficiente, estoy muy satisfecho con los resultados.');

INSERT INTO configuraciones (clave, valor) 
VALUES
	('codigo-comentario', '123456'),
    ('clave-defecto', '123456');

INSERT INTO ventas (empleado_id) 
VALUES 
	(1), 
	(2), 
	(3);

INSERT INTO detalle_ventas (venta_id, servicio_id) 
VALUES 
	(1, 1), 
	(1, 2), 
	(1, 3), 
	(2, 4), 
	(2, 5), 
	(2, 6), 
	(3, 7), 
	(3, 8), 
	(3, 9);
