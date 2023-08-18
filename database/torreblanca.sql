CREATE DATABASE torreblanca;
CREATE TABLE t_user(
    id int NOT NULL auto_increment PRIMARY KEY,
    nombre VARCHAR (255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE t_usuarios(
    id int NOT NULL auto_increment PRIMARY KEY,
    id_user int,
    nombre VARCHAR (255) NULL,
   	correo VARCHAR (255) NULL,
    username VARCHAR (255) NULL,
    cotraseña TEXT (255) NULL,
    registro DATETIME NULL DEFAULT now(),
    foreign key (id_user) references t_user (id)    
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE t_categorias(
    id int NOT NULL  auto_increment PRIMARY KEY,
    id_usuario int NOT NULL,
    nombre VARCHAR (255) NOT NULL,
    fecha_insert DATETIME NOT NULL DEFAULT now(),
    foreign key (id_usuario) references t_usuarios (id) 
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE t_archivos(
    id INT NOT NULL auto_increment PRIMARY KEY,
    id_categoria INT NULL,
    id_usuario INT NULL,
    nombre VARCHAR(255) NULL,
    tipo VARCHAR(255) NULL,
    ruta TEXT NULL,
    fecha_insert DATETIME NOT NULL DEFAULT now(),
    foreign key (id_categoria) references t_categorias (id),
    foreign key (id_usuario) references t_usuarios (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE t_torres(
    id INT auto_increment PRIMARY KEY,
    nombre VARCHAR (255) NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE t_reportes(
    id INT NOT NULL auto_increment PRIMARY KEY,
    id_usuario INT NULL,
    id_torre INT NULL,
    piso VARCHAR (255),
    habitacion INT NULL,
    reporte TEXT NULL,
    fecha_reporte DATETIME NOT NULL DEFAULT now(),
    foreign key (id_usuario) references t_usuarios (id),
    foreign key (id_torre) references t_torres (id)

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;