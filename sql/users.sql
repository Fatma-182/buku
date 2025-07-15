-- Active: 1752284209598@@localhost@3306@buku_tamuCREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','petugas') NOT NULL DEFAULT 'admin'
);
