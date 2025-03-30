DROP DATABASE IF EXISTS cyberweapons; 
CREATE DATABASE cyberweapons CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE cyberweapons;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE weapons (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  location VARCHAR(255) NOT NULL,
  quantity INT NOT NULL,
  attachment VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE emails (
  id INT AUTO_INCREMENT PRIMARY KEY,
  recipient VARCHAR(255) NOT NULL,
  subject VARCHAR(255) NOT NULL,
  body TEXT,
  status ENUM('Wysłano', 'Niepowodzenie') NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


insert into users(email,password) values ('admin@blackice.local','CHANGEIT');
