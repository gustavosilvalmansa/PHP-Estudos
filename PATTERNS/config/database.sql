CREATE DATABASE IF NOT EXISTS cadastro;

USE cadastro;

-- Users Table
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('Cliente', 'Administrador') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample Data
INSERT INTO usuarios (nome, email, cpf, senha, tipo) VALUES
('João Silva', 'joao@email.com', '123.456.789-00', MD5('senha123'), 'Cliente'),
('Maria Souza', 'maria@email.com', '987.654.321-00', MD5('admin123'), 'Administrador');
