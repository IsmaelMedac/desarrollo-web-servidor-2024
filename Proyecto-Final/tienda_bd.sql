-- Borrar base de datos
DROP DATABASE tienda_bd;

-- Crear la base de datos
CREATE DATABASE tienda_bd;
USE tienda_bd;


-- Tabla de Categorías
CREATE TABLE categorias (
    categoria VARCHAR(30) PRIMARY KEY,
    descripcion VARCHAR(255)
);

-- Tabla de Productos
CREATE TABLE productos (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre_producto VARCHAR(50),
    descripcion VARCHAR(255),
    precio NUMERIC(6,2),
    categoria VARCHAR(30),
    FOREIGN KEY (categoria) REFERENCES categorias(categoria),
    stock INT(3) default 0,
    imagen VARCHAR(60)
);

CREATE TABLE usuarios (
	usuario VARCHAR(15) PRIMARY KEY,
    contrasenia VARCHAR(255) NOT NULL
);

INSERT INTO categorias VALUES ('Consolas','Esta es la categoría de consolas');
INSERT INTO categorias VALUES ('Consolas','Esta es la categoría de consolas');
INSERT INTO categorias VALUES ('OTRA','Esta es la categoría de consolas');

INSERT INTO categorias VALUES ('OTRANUEVA','Esta es la categoría de consolas');

INSERT INTO productos (nombre_producto, precio, categoria, stock, imagen, descripcion) 
VALUES ("PS5", 500, "Consolas", 3, "imagenes/imagen.png", "Esta es una PS5");

INSERT INTO productos (nombre_producto, precio, categoria, stock, imagen, descripcion) 
VALUES ("PS5", 500, "Congelados MisHuevos", 3, "../Imagenes/imagen.png", "Esta es una PS5");

DROP TABLE productos;

SELECT stock FROM productos WHERE nombre_producto = 'PS5';

SELECT * FROM productos;