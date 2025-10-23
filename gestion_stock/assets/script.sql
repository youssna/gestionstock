-- Création de la base de données
CREATE DATABASE IF NOT EXISTS gestion_stock CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE gestion_stock;

-- Table : utilisateurs
CREATE TABLE IF NOT EXISTS utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL
);

-- Table : types_produits
CREATE TABLE IF NOT EXISTS types_produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL
);

-- Table : produits
CREATE TABLE IF NOT EXISTS produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT,
    quantite INT DEFAULT 0,
    reference VARCHAR(100),
    type_id INT,
    FOREIGN KEY (type_id) REFERENCES types_produits(id) ON DELETE SET NULL
);