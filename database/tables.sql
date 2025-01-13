DROP DATABASE IF EXISTS electrocopper;
CREATE DATABASE electrocopper;
USE electrocopper;

-- ###################################################################
CREATE TABLE configuraciones (
	configuracion_id	INT AUTO_INCREMENT	PRIMARY KEY,
	clave				VARCHAR(125)		NOT NULL,
    valor				TEXT				NULL,

    CONSTRAINT un_clave_con		UNIQUE(clave)
) ENGINE = InnoDB;

-- ###################################################################
CREATE TABLE empleados (
    empleado_id		INT AUTO_INCREMENT		PRIMARY KEY,
    nombres			VARCHAR(50)				NOT NULL,
    apellidos		VARCHAR(50)				NOT NULL,
    correo			VARCHAR(255)			NOT NULL,
    clave			VARCHAR(60)				NOT NULL,
    created_at 		DATETIME				DEFAULT NOW(),
    updated_at		DATETIME				NULL,
    inactive_at		DATETIME				NULL,

    CONSTRAINT un_correo_emp	UNIQUE(correo)
) ENGINE = InnoDB;

-- ###################################################################
CREATE TABLE empresas (
	empresa_id  	INT AUTO_INCREMENT  PRIMARY KEY,
    ruc				CHAR(11)		    NOT NULL,
    razon_social	VARCHAR(255)	    NOT NULL,
    correo			VARCHAR(255)	    NOT NULL,
    telefono		VARCHAR(20)		    NOT NULL,
    direccion		TEXT				NULL,
    created_at 		DATETIME			DEFAULT NOW(),
    updated_at		DATETIME			NULL,
    inactive_at		DATETIME			NULL,

    CONSTRAINT un_ruc_emp			UNIQUE(ruc),
    CONSTRAINT un_razon_social_emp	UNIQUE(razon_social),
    CONSTRAINT un_correo_emp		UNIQUE(correo),
    CONSTRAINT un_telefono_emp		UNIQUE(telefono)
) ENGINE = InnoDB;

-- ###################################################################
CREATE TABLE personas (
    persona_id		INT AUTO_INCREMENT	PRIMARY KEY,
    nombres			VARCHAR(50)			NOT NULL,
    apellidos		VARCHAR(50)			NOT NULL,
    created_at 		DATETIME			DEFAULT NOW(),
    updated_at		DATETIME			NULL,
    inactive_at		DATETIME			NULL
) ENGINE = InnoDB;

-- ###################################################################
CREATE TABLE clientes (
    cliente_id		INT AUTO_INCREMENT		PRIMARY KEY,
    persona_id	    INT					    NULL,
    empresa_id	    INT					    NULL,
    tipo		    ENUM('natural', 'juridica')	NOT NULL,
    created_at 		DATETIME				DEFAULT NOW(),
    updated_at		DATETIME				NULL,
    inactive_at		DATETIME				NULL,

    CONSTRAINT un_persona_cli		UNIQUE(persona_id),
    CONSTRAINT un_empresa_cli		UNIQUE(empresa_id),
    CONSTRAINT fk_persona_cli		FOREIGN KEY (persona_id) REFERENCES personas(persona_id),
    CONSTRAINT fk_empresa_cli		FOREIGN KEY (empresa_id) REFERENCES empresas(empresa_id)
) ENGINE = InnoDB;


-- ###################################################################
CREATE TABLE servicios (
	servicio_id		INT AUTO_INCREMENT	PRIMARY KEY,
    nombre			VARCHAR(120)		NOT NULL,
    descripcion		TEXT				NULL,
    precio			DECIMAL(7,2)		NULL,
    imagen			VARCHAR(255)		NULL,
    created_at 		DATETIME			DEFAULT NOW(),
    updated_at		DATETIME			NULL,
    inactive_at		DATETIME			NULL,

    CONSTRAINT un_nombre_ser	UNIQUE(nombre)
) ENGINE = InnoDB;

-- ###################################################################
CREATE TABLE ventas (
	venta_id	INT AUTO_INCREMENT	PRIMARY KEY,
    empleado_id INT					NOT NULL,
    fecha		DATETIME			DEFAULT NOW(),
    created_at 	DATETIME			DEFAULT NOW(),
    updated_at	DATETIME			NULL,
    inactive_at	DATETIME			NULL,
    
    CONSTRAINT fk_empleado_v FOREIGN KEY (empleado_id) REFERENCES empleados(empleado_id)
) ENGINE = InnoDB;

-- ###################################################################
CREATE TABLE detalle_ventas (
	detalle_id		INT	AUTO_INCREMENT	PRIMARY KEY,
    venta_id		INT					NOT NULL,
    servicio_id		INT					NOT NULL,
    created_at 		DATETIME			DEFAULT NOW(),
    updated_at		DATETIME			NULL,
    inactive_at		DATETIME			NULL,
    
    CONSTRAINT fk_venta_d_v		FOREIGN KEY (venta_id)		REFERENCES ventas(venta_id),
    CONSTRAINT fk_servicio_d_v	FOREIGN KEY (servicio_id)	REFERENCES servicios(servicio_id)
) ENGINE = InnoDB;

-- ###################################################################
CREATE TABLE comentarios (
	comentario_id	INT AUTO_INCREMENT	PRIMARY KEY,
	nombre_cliente	VARCHAR(125)		NOT NULL,
	comentario		TEXT				NOT NULL,
    created_at 		DATETIME			DEFAULT NOW(),
    updated_at		DATETIME			NULL,
    inactive_at		DATETIME			NULL
) ENGINE = InnoDB;

-- ###################################################################
CREATE TABLE cotizaciones (
	cotizacion_id	INT AUTO_INCREMENT  PRIMARY KEY,
    codigo			VARCHAR(15)		    NULL,
    cliente_id		INT				    NULL,
    empleado_id		INT				    NULL,
    created_at 		DATETIME			DEFAULT NOW(),
    updated_at		DATETIME			NULL,
    inactive_at		DATETIME			NULL,

    CONSTRAINT fk_cliente_cot		FOREIGN KEY (cliente_id)	REFERENCES clientes(cliente_id),
    CONSTRAINT fk_empleado_cot		FOREIGN KEY (empleado_id)	REFERENCES empleados(empleado_id)
) ENGINE = InnoDB;

-- ###################################################################
CREATE TABLE detalle_cotizaciones (
	detalle_cotizacion_id   INT	AUTO_INCREMENT  PRIMARY KEY,
    cotizacion_id	        INT				    NOT NULL,
    servicio_id		        INT				    NOT NULL,
    created_at 		        DATETIME			DEFAULT NOW(),
    updated_at		        DATETIME			NULL,
    inactive_at		        DATETIME			NULL,

    CONSTRAINT fk_cotizacion_d_cot	FOREIGN KEY (cotizacion_id)	REFERENCES cotizaciones(cotizacion_id),
    CONSTRAINT fk_servicio_d_cot	FOREIGN KEY (servicio_id)	REFERENCES servicios(servicio_id)
) ENGINE = InnoDB;
