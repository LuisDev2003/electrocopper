USE electrocopper;

INSERT INTO empleados (nombres, apellidos, correo, clave)
VALUES 
	('Carlos', 'García', 'carlos.garcia@example.com', '$2y$10$AMkimEU3DxlmfC9u8QlIUeEvEjFPohmA3h01WH3CmvBkyoaWhM346'),
	('María', 'Lopez', 'maria.lopez@example.com', '$2y$10$AMkimEU3DxlmfC9u8QlIUeEvEjFPohmA3h01WH3CmvBkyoaWhM346'),
	('Juan', 'Martínez', 'juan.martinez@example.com', '$2y$10$AMkimEU3DxlmfC9u8QlIUeEvEjFPohmA3h01WH3CmvBkyoaWhM346'),
	('Ana', 'Gómez', 'ana.gomez@example.com', '$2y$10$AMkimEU3DxlmfC9u8QlIUeEvEjFPohmA3h01WH3CmvBkyoaWhM346'),
	('Luis', 'Hernández', 'luis.hernandez@example.com', '$2y$10$AMkimEU3DxlmfC9u8QlIUeEvEjFPohmA3h01WH3CmvBkyoaWhM346');

INSERT INTO categorias (nombre)
VALUES
	('Control y automatización'),
    ('Domotica'),
    ('Electricidad'),
    ('Telecomunicaciones');

INSERT INTO servicios (nombre, categoria_id)
VALUES
-- Categoría: Electricidad
('Diseño De Tableros Eléctricos De Baja Tensión', 3),
('Suministro y montaje de mecanismos en las marcas SIMON, MAZDA, SCHNEIDER, BJC, LEGRAND', 3),
('Montaje de cuadros generales de electricidad', 3),
('Suministro y montaje de lámparas y dicroicos', 3),
('Suministro y montaje de iluminación, tira led de 24 V AC, 230 V AC', 3),
('Montaje de toma de pica de tierra', 3),
('Cambio de acometida de derivación individual', 3),
('Instalaciones eléctricas en pisos, comunidades, mancomunidades, chalets', 3),
('Suministro e instalación de automáticos, diferenciales rearmables superinmunizados', 3),
('Medición de puesta a tierra', 3),

-- Categoría: Telecomunicaciones
('Montaje De Caja PAU', 4),
('Montaje de Rack de comunicación', 4),
('Montaje de videoporteros individuales y en comunidades', 4),
('Montaje de antenas', 4),
('Instalación de cable estructurado UTP cat. 5e Y 6', 4),

-- Categoría: Control y Automatización
('Diseño, Fabricación, Montaje, Pruebas Y Puesta En Servicio De Sistemas De Control Para Industrias Y Obras', 1),

-- Categoría: Domótica
('Convertimos Tu Vivienda A Una Integración De Tecnología Para El Funcionamiento De Manera Conjunta , Eficiente Y Optimizada.', 2);

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
	(3, 8);

INSERT INTO empresas (ruc, razon_social, correo, telefono, direccion) 
VALUES
	('20512345678', 'Empresa Alpha SAC', 'contacto@alpha.com', '987654321', 'Av. Siempre Viva 123, Lima'),
	('20698765432', 'Beta Corporation', 'info@beta.com', '912345678', 'Jr. Independencia 456, Arequipa'),
	('20711122233', 'Gamma y Asociados', 'admin@gamma.com', '921234567', 'Calle Las Flores 789, Trujillo'),
	('20833344455', 'Delta Logistics', 'logistica@delta.com', '934567890', 'Av. Los Pinos 101, Piura'),
	('20955566677', 'Epsilon Tech', 'soporte@epsilon.com', '945678901', 'Jr. El Sol 202, Cusco');

INSERT INTO personas (nombres, apellidos) 
VALUES
	('Juan', 'Perez'),
	('Maria', 'Lopez'),
	('Carlos', 'Gomez'),
	('Ana', 'Torres'),
	('Luis', 'Martinez');

INSERT INTO clientes (persona_id, empresa_id, tipo) 
VALUES
	(NULL, 1, 'juridica'),
	(NULL, 2, 'juridica'),
	(NULL, 3, 'juridica'),
	(NULL, 4, 'juridica'),
	(NULL, 5, 'juridica'),
	(1, NULL, 'natural'),
	(2, NULL, 'natural'),
	(3, NULL, 'natural'),
	(4, NULL, 'natural'),
	(5, NULL, 'natural');
