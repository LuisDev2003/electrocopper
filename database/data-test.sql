USE electrocopper;

INSERT INTO servicios (nombre, descripcion, precio, imagen) 
VALUES
    ('Instalación Eléctrica Residencial', 'Servicio completo de instalación eléctrica para viviendas.', 1500.00, 'instalacion_residencial.jpg'),
    ('Reparación de Cortocircuitos', 'Solución a fallos eléctricos causados por cortocircuitos.', 500.00, 'reparacion_cortocircuitos.jpg'),
    ('Mantenimiento Preventivo', 'Revisión y mantenimiento periódico de sistemas eléctricos.', 800.00, 'mantenimiento_preventivo.jpg'),
    ('Instalación de Paneles Solares', 'Asesoría e instalación profesional de sistemas solares.', 12000.00, 'paneles_solares.jpg'),
    ('Certificación Eléctrica', 'Evaluación y certificación de sistemas eléctricos según normas vigentes.', 2000.00, 'certificacion_electrica.jpg');

INSERT INTO comentarios (nombre_cliente, comentario) 
VALUES
('Carlos López', 'El servicio fue excelente, llegaron a tiempo y resolvieron el problema rápidamente.'),
('Ana Martínez', 'Muy profesionales, arreglaron mi sistema eléctrico en menos tiempo del esperado.'),
('Jorge Ramírez', 'Buen trabajo, aunque podrían mejorar la atención al cliente en el teléfono.'),
('Luisa Fernández', 'Los recomiendo, precios justos y explican todo el trabajo realizado.'),
('Ricardo Gómez', 'Servicio rápido y eficiente, estoy muy satisfecho con los resultados.');
