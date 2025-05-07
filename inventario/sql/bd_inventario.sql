-- Crear base de datos
CREATE DATABASE IF NOT EXISTS inventario;
USE inventario;

-- Crear tabla productos
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo VARCHAR(50) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    categoria VARCHAR(100),
    cantidad INT DEFAULT 0,
    estado ENUM('Nuevo', 'Usado', 'Dañado') DEFAULT 'Nuevo',
    ubicacion VARCHAR(100),
    fecha_ingreso DATE,
    responsable VARCHAR(100),
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
