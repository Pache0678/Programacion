-- Creación de la base de datos
CREATE DATABASE StreamWeb;
USE StreamWeb;

-- Tabla 'usuarios' para almacenar la información básica del usuario
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    correo_electronico VARCHAR(100) NOT NULL UNIQUE,
    edad INT NOT NULL,
    plan_base ENUM('Básico', 'Estándar', 'Premium') NOT NULL,
    duracion_suscripcion ENUM('Mensual', 'Anual') NOT NULL
);

-- Tabla 'paquetes' para almacenar los paquetes adicionales de los usuarios
CREATE TABLE paquetes (
    id_paquete INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    paquete ENUM('Deporte', 'Cine', 'Infantil') NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE
);

select * from StreamWeb.usuarios;
select * from StreamWeb.paquetes;


-- Insertando usuarios en la tabla 'usuarios'
INSERT INTO StreamWeb.usuarios (nombre, apellidos, correo_electronico, edad, plan_base, duracion_suscripcion) VALUES
('Juan', 'Pérez', 'juan.perez@email.com', 30, 'Básico', 'Mensual'),
('María', 'López', 'maria.lopez@email.com', 25, 'Estándar', 'Anual'),
('Carlos', 'Gómez', 'carlos.gomez@email.com', 35, 'Premium', 'Mensual'),
('Ana', 'Martínez', 'ana.martinez@email.com', 28, 'Estándar', 'Mensual'),
('Luis', 'Fernández', 'luis.fernandez@email.com', 40, 'Básico', 'Anual');

-- Insertando paquetes adicionales para los usuarios
INSERT INTO StreamWeb.paquetes (id_usuario, paquete) VALUES 
(1, 'Deporte'),
(1, 'Cine'),
(2, 'Infantil'),
(3, 'Cine'),
(3, 'Deporte'),
(4, 'Infantil'),
(5, 'Cine'),
(5, 'Deporte'),
(5, 'Infantil');
-- Eliminar todos los registros y reiniciar los IDs
TRUNCATE TABLE StreamWeb.paquetes;
TRUNCATE TABLE StreamWeb.usuarios;
-- Reiniciar el AUTO_INCREMENT manualmente
ALTER TABLE StreamWeb.usuarios AUTO_INCREMENT = 1;
ALTER TABLE StreamWeb.paquetes AUTO_INCREMENT = 1;

DELETE FROM StreamWeb.usuarios WHERE id_usuario = 25;
DELETE FROM StreamWeb.usuarios WHERE id_usuario = 22;
DELETE FROM StreamWeb.usuarios WHERE id_usuario = 23;
DELETE FROM StreamWeb.usuarios WHERE id_usuario = 24;
