-- Create Our DB
CREATE DATABASE IEEE_Backend_PHP

-- USe DB
use IEEE_Backend_PHP;

-- Create table users

CREATE Table IF NOT EXISTS users (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- DROP table users
DROP Table if EXISTS users;

-- Create table posts
CREATE Table IF NOT EXISTS posts (
    id BIGINT PRIMARY key AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    user_id BIGINT,
    CONSTRAINT fk_usr_id FOREIGN KEY (user_id) REFERENCES users (id) on DELETE CASCADE ON UPDATE CASCADE
);

-- DROP table posts
DROP Table IF EXISTS posts;