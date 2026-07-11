-- Database and table creation for gestion_etudiants
-- Run this script in your MySQL client (phpMyAdmin, MySQL CLI, etc.)

CREATE DATABASE IF NOT EXISTS gestion_etudiants CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gestion_etudiants;

-- Table etudiants
CREATE TABLE IF NOT EXISTS etudiants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    date_naissance DATE NOT NULL,
    filiere VARCHAR(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Optional: insert a few sample records
INSERT INTO etudiants (nom, prenom, email, date_naissance, filiere) VALUES
('Dupont', 'Marie', 'marie.dupont@example.com', '2000-05-14', 'Informatique'),
('Durand', 'Lucas', 'lucas.durant@example.com', '2001-09-02', 'Mathematiques'),
('Moreau', 'Sophie', 'sophie.moreaux@example.com', '2000-11-23', 'Physique')
ON DUPLICATE KEY UPDATE email=VALUES(email);