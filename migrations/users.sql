CREATE DATABASE my_database;

USE my_database;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    photo VARCHAR(255) NOT NULL
);

ALTER TABLE users
ADD COLUMN created_at DATETIME,
ADD COLUMN last_connection DATETIME;

ALTER TABLE users
ADD COLUMN role_admin BOOL;

