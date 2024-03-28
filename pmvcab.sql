CREATE DATABASE IF NOT EXISTS pmvcab;
USE pmvcab;

CREATE TABLE IF NOT EXISTS categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS tarea (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    fecha DATE,
    prioridad INT,
    categoria_id INT,
    FOREIGN KEY (categoria_id) REFERENCES categoria(id) ON DELETE SET NULL
);

INSERT INTO categoria (nombre) VALUES
('Trabajo'),
('Hogar');
