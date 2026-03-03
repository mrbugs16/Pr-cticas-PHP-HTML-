USE arqweb;

-- Tabla usuarios
DROP TABLE IF EXISTS tareas;
DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios (
    id_usuario   INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,  -- ✅ una sola PRIMARY KEY
    nombre       VARCHAR(100) NOT NULL,
    email        VARCHAR(100) NOT NULL UNIQUE,
    usuario      VARCHAR(50)  NOT NULL UNIQUE,
    password     VARCHAR(255) NOT NULL,
    suscripcion  BOOLEAN      NOT NULL DEFAULT FALSE
);

-- Tabla tareas
CREATE TABLE tareas (
    id_tarea         INT      NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_usuario       INT      NOT NULL,
    fecha_creacion   DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    descripcion      TEXT     NOT NULL,
    fechafinalizada  DATETIME DEFAULT NULL,
    fecha_vencimiento DATETIME DEFAULT NULL  -- ✅ coma sobrante eliminada
);

ALTER TABLE tareas
    ADD CONSTRAINT fk_tareas_usuario
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
    ON DELETE CASCADE;

-- 5 usuarios de prueba (contraseñas hasheadas con password_hash + PASSWORD_BCRYPT)
INSERT INTO usuarios (nombre, email, usuario, password, suscripcion) VALUES
('Santiago Tapia',   'santiago@mail.com',  'santiago',  '$2y$10$abcdefghijk1234567890uQHJklMNOpqRSTUVWXYZabcdefghij', 1),
('Ana García',       'ana@mail.com',       'ana_garcia', '$2y$10$abcdefghijk1234567890uQHJklMNOpqRSTUVWXYZabcdefghij', 0),
('Carlos López',     'carlos@mail.com',    'clopez',     '$2y$10$abcdefghijk1234567890uQHJklMNOpqRSTUVWXYZabcdefghij', 1),
('María Fernández',  'maria@mail.com',     'mfernandez', '$2y$10$abcdefghijk1234567890uQHJklMNOpqRSTUVWXYZabcdefghij', 0),
('Luis Martínez',    'luis@mail.com',      'lmartinez',  '$2y$10$abcdefghijk1234567890uQHJklMNOpqRSTUVWXYZabcdefghij', 1);
