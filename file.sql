-- Membuat database biolinks
CREATE DATABASE biolinks;

-- Menggunakan database biolinks
USE biolinks;

-- Membuat tabel User
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    status ENUM('pending', 'active', 'suspend') NOT NULL DEFAULT 'pending',
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    deleted_at DATETIME DEFAULT NULL
);

-- Membuat tabel Profile
CREATE TABLE profile (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255),
    name VARCHAR(255),
    bio VARCHAR(255),
    sosial_links JSON,
    other_links JSON,
    user_id INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    deleted_at DATETIME DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES User(id) ON DELETE CASCADE
);
