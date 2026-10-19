CREATE DATABASE IF NOT EXISTS lab8_web
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE lab8_web;

CREATE TABLE IF NOT EXISTS estudiantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cedula VARCHAR(20) NOT NULL UNIQUE,
    nombre VARCHAR(60) NOT NULL,
    apellido VARCHAR(60) NOT NULL,
    codigo VARCHAR(8) NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO estudiantes (cedula, nombre, apellido, codigo)
VALUES ('8-922-1940', 'yaser', 'garcia', '55624008')
ON DUPLICATE KEY UPDATE
    nombre = VALUES(nombre),
    apellido = VALUES(apellido),
    codigo = VALUES(codigo);