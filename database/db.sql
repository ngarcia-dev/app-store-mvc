-- Active: 1724795390380@@127.0.0.1@5432@store
CREATE DATABASE store;

CREATE TABLE categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price NUMERIC(10, 2) NOT NULL,
    stock INT NOT NULL DEFAULT 0,
    category_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE SET NULL
);

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO categories (name, description) VALUES 
('Electrónica', 'Dispositivos electrónicos y accesorios'),
('Ropa', 'Prendas de vestir para hombres, mujeres y niños'),
('Hogar', 'Artículos para el hogar y la cocina'),
('Deportes', 'Equipos y ropa deportiva');

INSERT INTO products (name, description, price, stock, category_id) VALUES 
('Smartphone XYZ', 'Smartphone con pantalla de 6.5 pulgadas y 128 GB de almacenamiento.', 299.99, 50, 1),
('Cámara Digital', 'Cámara digital de 20 MP con lente intercambiable.', 499.99, 30, 1),
('Camisa de Algodón', 'Camisa de algodón para hombre, disponible en varios colores.', 29.99, 100, 2),
('Zapatillas Deportivas', 'Zapatillas deportivas ligeras y cómodas.', 79.99, 70, 2),
('Juego de Sartenes', 'Juego de 3 sartenes antiadherentes de alta calidad.', 59.99, 20, 3),
('Bicicleta de Montaña', 'Bicicleta de montaña de 21 velocidades, ideal para senderos.', 399.99, 15, 4);

INSERT INTO users (name, email, password, address) VALUES 
('Juan Pérez', 'juan.perez@example.com', 'contraseña123', 'Calle Falsa 123, Ciudad'),
('María López', 'maria.lopez@example.com', 'miClaveSegura', 'Av. Siempre Viva 742, Ciudad'),
('Carlos García', 'carlos.garcia@example.com', 'password456', 'Pueblo Fantasma, Ciudad'),
('Lucía Fernández', 'lucia.fernandez@example.com', '1234abcd', 'Calle de la Amargura, Ciudad');
